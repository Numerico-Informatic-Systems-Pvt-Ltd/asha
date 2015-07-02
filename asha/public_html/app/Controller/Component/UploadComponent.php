<?php
/*
 File: /app/controllers/components/image.php
*/
class UploadComponent extends Component
{
	var $components = array('Session');
	var $max_allowed_size = '1048576';
    /*
    *    Uploads an image and its thumbnail into $folderName/big and $folderName/small respectivley.
    *     the  generated thumnail could either have the same aspect ratio as the uploaded image, or could
    *    be a zoomed and cropped version.

    *     Directions:
    *    In view where you upload the image, make sure your form creation is similar to the following
    *    <?= $form->create('FurnitureSet',array('type' => 'file')); ?>
    *
    *    In view where you upload the image, make sure that you have a file input similar to the following
    *    <?= $form->file('Image/name1'); ?>
    *
    *    In the controller, add the component to your components array
    *    var $components = array("Image");
    *
    *    In your controller action (the parameters are expained below)
    *    $image_path = $this->Image->upload_image_and_thumbnail($this->data,"name1",573,80,"sets",true);
    *    this returns the file name of the result image.  You can  store this file name in the database
    *
    *    Note that your image will be stored in 2 locations:
    *    Image: /webroot/img/$folderName/big/$image_path
    *    Thumbnail:  /webroot/img/$folderName/small/$image_path
    *
    *    Finally in the view where you want to see the images
    *    <?= $html->image('sets/big/'.$furnitureSet['FurnitureSet']['image_path']);
    *     where "sets" is the folder name we saved our pictures in, and $furnitureSet['FurnitureSet']['image_path'] is the file name we stored in the database

    *    Parameters:
    *    $data: CakePHP data array from the form
    *    $datakey: key in the $data array. If you used <?= $form->file('Image/name1'); ?> in your view, then $datakey = name1
    *    $imgscale: the maximum width or height that you want your picture to be resized to
    *    $thumbscale: the maximum width or height that you want your thumbnail to be resized to
    *    $folderName: the name of the parent folder of the images. The images will be stored to /webroot/img/$folderName/big/ and  /webroot/img/$folderName/small/
    *    $square: a boolean flag indicating whether you want square and zoom cropped thumbnails, or thumbnails with the same aspect ratio of the source image
    */
    function upload_image_and_thumbnail($data, $datakey, $imgscale, $thumbscale, $folderName, $square,$slug = null) {
		//debug($data);
		//debug($datakey);
		// if (!$this->get_filesize($data['Image'][$datakey]['name'])) { return false;}
			 if (strlen($data['Image'][$datakey]['name'])>4){
					$data['Image'][$datakey]['name'] = @parse_url($data['Image'][$datakey]['name']);
					$error = 0;
                    $tempuploaddir = "img/temp"; // the /temp/ directory, should delete the image after we upload
                    $biguploaddir = "img/".$folderName."/big"; // the /big/ directory
                    $smalluploaddir = "img/".$folderName."/small"; // the /small/ directory for thumbnails

                    // Make sure the required directories exist, and create them if necessary
                    if(!is_dir($tempuploaddir)) mkdir($tempuploaddir,true);
                    if(!is_dir($biguploaddir)) mkdir($biguploaddir,true);
                    if(!is_dir($smalluploaddir)) mkdir($smalluploaddir,true);

       //             $filetype = $this->getFileExtension($data['Image'][$datakey]['name']);
					$filetype = $this->getFileExtension($data['Image'][$datakey]['name']['path']);
                    $filetype = strtolower($filetype);
					
				

                    if (($filetype != "jpeg")  && ($filetype != "jpg") && ($filetype != "gif") && ($filetype != "png"))
                    {
                        // verify the extension
						return;
                    }
                    else
                    {
                        // Get the image size
                        $imgsize = GetImageSize($data['Image'][$datakey]['tmp_name']);
																
                    }

                    // Generate a unique name for the image (from the timestamp)
                    $id_unic = str_replace(".", "", strtotime ("now"));
                    $filename = $slug.'-'.$id_unic; /*Use $slug for SEO */
		
					settype($filename,"string");
                    $filename.= ".";
                    $filename.=$filetype;
                    $tempfile = $tempuploaddir . "/$filename";
                    $resizedfile = $biguploaddir . "/$filename";
                    $croppedfile = $smalluploaddir . "/$filename";

                    if (is_uploaded_file($data['Image'][$datakey]['tmp_name']))
                    {
                        // Copy the image into the temporary directory
                        if (!copy($data['Image'][$datakey]['tmp_name'],"$tempfile"))
                        {
							print "Error Uploading File!.";
                            exit();
                        }
                        else {
                            /*
                             *    Generate the big version of the image with max of $imgscale in either directions
                             */
						
                            $this->resize_img($tempfile, $imgscale, $resizedfile);                            

								if($square) {
									/*
									 *    Generate the small square version of the image with scale of $thumbscale
									 */
									$this->crop_img($tempfile, $thumbscale, $croppedfile);
								}
								else {
									/*
									 *    Generate the big version of the image with max of $imgscale in either directions
									 */
									$this->resize_img($tempfile, $thumbscale, $croppedfile);
								}

                            // Delete the temporary image
							

                            unlink($tempfile);
                        }
                    }

                     // Image uploaded, return the file name
					 return $filename;
        }
    }

    /*
    *    Deletes the image and its associated thumbnail
    *    Example in controller action:    $this->Image->delete_image("1210632285.jpg","sets");
    *
    *    Parameters:
    *    $filename: The file name of the image
    *    $folderName: the name of the parent folder of the images. The images will be stored to /webroot/img/$folderName/big/ and  /webroot/img/$folderName/small/
    */
    function delete_image($filename,$folderName) {

		if ( is_file("img/".$folderName."/big/".$filename) ) {
        unlink("img/".$folderName."/big/".$filename);
        unlink("img/".$folderName."/small/".$filename);
		}
    }

    function crop_img($imgname, $scale, $filename) {
        $filetype = $this->getFileExtension($imgname);
        $filetype = strtolower($filetype);

        switch($filetype){
            case "jpeg":
            case "jpg":
              $img_src = imagecreatefromjpeg ($imgname);
             break;
             case "gif":
              $img_src = imagecreatefromgif ($imgname);
             break;
             case "png":
              $img_src = imagecreatefrompng ($imgname);
             break;
        }

        $width = imagesx($img_src);
        $height = imagesy($img_src);
        $ratiox = $width / $height * $scale;
        $ratioy = $height / $width * $scale;

        //-- Calculate resampling
        $newheight = ($width <= $height) ? $ratioy : $scale;
        $newwidth = ($width <= $height) ? $scale : $ratiox;

        //-- Calculate cropping (division by zero)
        $cropx = ($newwidth - $scale != 0) ? ($newwidth - $scale) / 2 : 0;
        $cropy = ($newheight - $scale != 0) ? ($newheight - $scale) / 2 : 0;

        //-- Setup Resample & Crop buffers
        $resampled = imagecreatetruecolor($newwidth, $newheight);
        $cropped = imagecreatetruecolor($scale, $scale);

        //-- Resample
        imagecopyresampled($resampled, $img_src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        //-- Crop
        imagecopy($cropped, $resampled, 0, 0, $cropx, $cropy, $newwidth, $newheight);

        // Save the cropped image
        switch($filetype)
        {

            case "jpeg":
            case "jpg":
             imagejpeg($cropped,$filename,80);
             break;
             case "gif":
             imagegif($cropped,$filename,80);
             break;
             case "png":
             imagepng($cropped,$filename,80);
             break;
        }
    }

    function resize_img($imgname, $size, $filename)    {
        $filetype = $this->getFileExtension($imgname);
        $filetype = strtolower($filetype);

        switch($filetype) {
            case "jpeg":
            case "jpg":
            $img_src = imagecreatefromjpeg ($imgname);
            break;
            case "gif":
            $img_src = imagecreatefromgif ($imgname);
            break;
            case "png":
            $img_src = imagecreatefrompng ($imgname);
            break;
        }

        $true_width = imagesx($img_src);
        $true_height = imagesy($img_src);

		if($size < $true_width) {
	
			if ($true_width>=$true_height)
			{
				$width=$size;
				$height = ($width/$true_width)*$true_height;
			}
			else
			{
				$width=$size;
				$height = ($width/$true_width)*$true_height;
			}
		} else {
				$width=$true_width;
				$height = $true_height;
		}
        $img_des = ImageCreateTrueColor($width,$height);
		$white = imagecolorallocate($img_des, 255, 255, 255);
		imagefilledrectangle($img_des, 0, 0, $width, $height, $white);
        imagecopyresampled ($img_des, $img_src, 0, 0, 0, 0, $width, $height, $true_width, $true_height);

        // Save the resized image
        switch($filetype)
        {
            case "jpeg":
            case "jpg":
			 header('Content-type: image/jpeg');
             imagejpeg($img_des,$filename,80);
             break;
             case "gif":
			 header('Content-type: image/gif');
             imagegif($img_des,$filename,80);
             break;
             case "png":
			 header('Content-type: image/png');
             imagepng($img_des,$filename,9);
             break;
        }

		// Free up memory
		imagedestroy($img_des);
    }

    function getFileExtension($str) {

        $i = strrpos($str,".");
        if (!$i) { return ""; }
        $l = strlen($str) - $i;
        $ext = substr($str,$i+1,$l);
        return $ext;
    }

 function save_image_from_url($img_url, $imgscale, $thumbscale, $folderName,$square,$alt=null) {
# ====================================================================================
#						v.1.0.11 Save image locally 								#
	if (!$this->get_filesize($img_url)) {return false;}

	if (!empty($img_url) )
	{
		$img_url=trim($img_url);
		# Preparing folders
		$tempuploaddir = "img/temp"; // the /temp/ directory, should delete the image after we upload
        $biguploaddir = "img/".$folderName."/big"; // the /big/ directory
        $smalluploaddir = "img/".$folderName."/small"; // the /small/ directory for thumbnails

	   // Make sure the required directories exist, and create them if necessary
        if(!is_dir($tempuploaddir)) mkdir($tempuploaddir,true);
        if(!is_dir($biguploaddir)) mkdir($biguploaddir,true);
        if(!is_dir($smalluploaddir)) mkdir($smalluploaddir,true);

		# Remove all query strings
		## $short_url = @parse_url($img_url);

		# Setting image url to $short_url[path] for removing all query strings
		# A check - if parse_url returns true, then execute this code
		## if ($short_url) $img_url = $short_url['path'];

		 // Generate a unique name for the image (from the timestamp)

        $id_unic = str_replace(".", "", strtotime ("now"));
        $random_filename = ($alt <> '')? $alt.'-'.$id_unic : 'img-'.$id_unic;
        settype($random_filename,"string");

		# image path

		$img_url = $this->get_final_url($img_url, $timeout = 5);
		$path_parts = pathinfo($img_url);

		# get file extension
		$file_extension = strtolower($path_parts['extension']);
	
		$to_be_parsed_img_url = $img_url;

		$parsed = parse_url($to_be_parsed_img_url);

		if (empty($file_extension) ) {

			if($parsed['host'] == 'clickserve.cc-dt.com') 
				$file_extension = 'gif';
			else
				$file_extension = 'jpg';
		}

		$filename = $random_filename . "." .  $file_extension;
		$tempfile = $tempuploaddir . "/$filename";
	    $resizedfile = $biguploaddir . "/$filename";
	    $croppedfile = $smalluploaddir . "/$filename";

		// Open a curl_session
		$ch = curl_init ($img_url); 
		curl_setopt($ch, CURLOPT_HEADER, 0); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_BINARYTRANSFER,1); 
		$rawdata=curl_exec($ch); 
		curl_close ($ch);

		// Write to temp file
		$fp = fopen($tempfile,'w'); 
		fwrite($fp, $rawdata); 
		fclose($fp);

    	if (($file_extension != "jpeg")  && ($file_extension != "jpg") && ($file_extension != "gif") && ($file_extension != "png"))
                    {
                        // verify the extension
                        return false;
                    }
                    else
                    {
                        // Get the image size
                        $imgsize = GetImageSize($tempfile);
                    }

		/*
        *    Generate the big version of the image with max of $imgscale in either directions
        */
				        	$this->resize_img($tempfile, $imgscale, $resizedfile);                            

	            		if($square) {
    	                /*
                        *    Generate the small square version of the image with scale of $thumbscale
                        */
                            $this->crop_img($tempfile, $thumbscale, $croppedfile);
                           }
                        else {
                         /*
                          *    Generate the big version of the image with max of $imgscale in either directions
                         */
                            $this->resize_img($tempfile, $thumbscale, $croppedfile);
                           }
		// Unlink temp file
		unlink($tempfile);
		return $filename;
		} // if (!empty($img_url) 
	} //save_image_from_url()

	function get_filesize($filename) {
		$max_allowed_size  = $this -> max_allowed_size;
		if(file_exists($filename)) {	
			$size = filesize($filename);
				if($size > $max_allowed_size) {
					$readable_size = ByteSize($size);
					$readable_max_size = ByteSize($max_allowed_size);

					$this->Session->setFlash("Filesize exceeded! File: $filename has $readable_size, while maximum $readable_max_size is allowed.");
						return false;
							} else {
							return true; 
							 }
				} else {	//elseif(file_exists($filename))

							$ch = curl_init($filename);
							curl_setopt($ch, CURLOPT_NOBODY, true);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_HEADER, true);
							curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); //not necessary unless the file redirects
							$data = curl_exec($ch);
							curl_close($ch);
							if ($data === false) {
								  $this->Session->setFlash("Error in calculating remote file size: $filename - try again, please.");
									  return false;
								}
							$contentLength = 'unknown';
							$status = 'unknown';
							if (preg_match('/^HTTP\/1\.[01] (\d\d\d)/', $data, $matches)) {
							  		$status = (int)$matches[1];
								}
							if (preg_match('/Content-Length: (\d+)/', $data, $matches)) {
								  $contentLength = (int)$matches[1];
								}

								 # echo 'HTTP Status: ' . $status . "\n";
								 # echo 'Content-Length: ' . $contentLength;
								if($contentLength > $max_allowed_size) {
									$this->Session->setFlash("File: $filename, size: $contentLength - maximum $max_allowed_size bytes allowed.");
										return false;
										} else {
										return true; 
								 }
							} //endif(file_exists($filename));
	} // get_filesize();

function get_final_url( $url, $timeout = 5 )
{
	$url = str_replace( "&amp;", "&amp;", urldecode(trim($url)) );
 
	$cookie = tempnam ("/tmp", "CURLCOOKIE");
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1" );
	curl_setopt( $ch, CURLOPT_URL, $url );
	curl_setopt( $ch, CURLOPT_COOKIEJAR, $cookie );
	curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
	curl_setopt( $ch, CURLOPT_ENCODING, "" );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	curl_setopt( $ch, CURLOPT_AUTOREFERER, true );
	curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, $timeout );
	curl_setopt( $ch, CURLOPT_TIMEOUT, $timeout );
	curl_setopt( $ch, CURLOPT_MAXREDIRS, 10 );
	$content = curl_exec( $ch );
	$response = curl_getinfo( $ch );
	curl_close ( $ch );
 
	if ($response['http_code'] == 301 || $response['http_code'] == 302)
	{
		ini_set("user_agent", "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1");
		$headers = get_headers($response['url']);
 
		$location = "";
		foreach( $headers as $value )
		{
			if ( substr( strtolower($value), 0, 9 ) == "location:" )
				return $this->get_final_url( trim( substr( $value, 9, strlen($value) ) ) );
		}
	}
 
 
	if (	preg_match("/window\.location\.replace\('(.*)'\)/i", $content, $value) ||
			preg_match("/window\.location\=\"(.*)\"/i", $content, $value)
	)
	{
		return $this->get_final_url ( $value[1] );
	}
	else
	{
		return $response['url'];
	}
}	//get_final_url()

}
?>