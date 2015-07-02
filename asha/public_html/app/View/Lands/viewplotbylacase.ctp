<?php
 //debug($owners);
 /*foreach($owners as $key=>$value)
 {*/
//echo $this->Form->input('owners',array('option'=>$owners['Land']['rsplot_no'],'label'=>false));
 ?>
 <td><h3>Select Plot</h3></td>
 <td><select name="data[Land][rsplotno]">
<!-- <option value="viewall">View All</option>-->
<?php
foreach($owners as $owner)
{
	?>
    <option value="<?php echo $owner['Land']['id'] ?>"><?php echo $owner['Land']['rsplot_no']?></option>
<?php   
}
?>
</select>
<?php echo $this->Form->submit('Next >>'); ?></td>

