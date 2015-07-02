<?php
 //debug($owners);
 /*foreach($owners as $key=>$value)
 {*/
//echo $this->Form->input('owners',array('option'=>$owners['Land']['rsplot_no'],'label'=>false));
 ?>
<span>Select plot</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<span>
 <select name="data[Owner][rsplotno]">
 <option value="viewall">View All</option>
<?php
foreach($owners as $owner)
{
	?>
    <option value="<?php echo $owner['Land']['id'] ?>"><?php echo $owner['Land']['rsplot_no']?></option>
<?php   
}
?>
</span>
</select>
<div>
<?php echo $this->Form->end(__('Continue')); ?>
</div>

