<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
var $helpers = array('Form', 'Html', 'Session', 'Js', 'Usermgmt.UserAuth',
											'NisCalc','AjaxMultiUpload.Upload');
		public $components = array('Upload','Session','RequestHandler', 'Usermgmt.UserAuth');

		function beforeFilter(){
			$this->userAuth();
			parent::beforeFilter();
		}
			
	
		private function userAuth(){
			$this->UserAuth->beforeFilter($this);
		}
	
		function imgFindUploadSaveFromHTML($html,$folderName)
	{
			/* Reference: http://stackoverflow.com/questions/138313/how-to-extract-img-src-title-and-alt-from-html-using-php */
			/* added on 8/28/11 to get images from any HTML content */
			$html = stripslashes($html);
			$doc=new DOMDocument();
			$doc->loadHTML($html);
			$xml=simplexml_import_dom($doc); // just to make xpath more simple
			$images=$xml->xpath('//img');

			/* foreach ($images as $img) {
				echo $img['src'] . ' ' . $img['alt'] . ' ' . $img['title'];
			}
			*/

			foreach ($images as $img):
				// echo $img['src'] . ' ' . $img['alt'] . ' ' . $img['title'];
				
				if(fopen($img['src'],"r")==true): 
				// run this check to see, if the image is on external server. For internal server, do nothing! 
					if(strlen($img['src'])>4):
						$alt = substr(slug($img['alt']),0,75);
						$filename = $this->Upload->save_image_from_url($img['src'],640,125,$folderName,false,$alt);	
						if(!empty($filename)):	
							$new_image_path = '/img/'.$folderName.'/big/'.$this->Upload->save_image_from_url($img['src'],
								640,125,$folderName,false,$alt);
								if($new_image_path)
								$html = str_replace($img['src'],$new_image_path,$html);
						endif;	
					endif;
				endif;
			endforeach;

			return $html;
	}
	
		
} // AppControllers Ends Here 

		function slug($string) {
			$length = '40';	
			$string = strtolower(Inflector::slug($string,'-'));
				if (strlen($string) > $length) {
		        	$string = substr($string, 0, $length);
			    }
	
			return $string;
		} // slug()