<div class="lacasesindex">
<?php if(!isset($owners)): ?>
<?php
$opt=array(''=>'select');
foreach($lac as $key=>$value)
{
	$opt[$key]=$value;
}
?>
<table>
    <?php echo $this->Form->create('Lacase'); ?>
    <tr>
        <td><?php echo $this->Form->input('search',array('label'=>'Select LA Case No',
                        'options'=>$opt));?>
        </td>
    	<td><?php echo $this->Form->submit('search'); ?></td>
    </tr>
     <?php echo $this->Form->end(); ?>
</table>
<?php else: ?>
	<ul>
        <li>Download Calculationsheet in PDF Format for ## 
            <?php echo $this->Html->link(__('Land'), 
                                    array('action' => 'calculationsheet',$lacase,"Total%20Land")); ?>       
           	&nbsp; || &nbsp; 
		   <?php echo $this->Html->link(__('Tree'), 
                                    array('action' => 'calculationsheet',$lacase,"Total%20Tree")); ?>
         	&nbsp; || &nbsp;
            <?php echo $this->Html->link(__('Structure'), 
                                    array('action' => 'calculationsheet',$lacase,"Total%20Structure")); ?>
     		&nbsp; || &nbsp;     
            <?php echo $this->Html->link(__('Panbaroz'), 
                                    array('action' => 'calculationsheet',$lacase,"Total%20Panbaroz")); ?>
       		&nbsp; || &nbsp;
            <?php echo $this->Html->link(__('Bargader'), 
                                    array('action' => 'calculationsheet',$lacase,"Total%20Barga")); ?>
        </li>
        <li>Download Award Statement in PDF Format : ## 
            <?php echo $this->Html->link(__('Land Owners'),
                                     array('action' => 'application',$lacase)); ?>
			 &nbsp; || &nbsp;
      
            <?php echo $this->Html->link(__('Bargadar'),
                                     array('action' => 'application',$lacase,"Y")); ?>
  
        </li>
        <li>Download Cash/Cheque Form in PDF Format for : ##  
            <?php echo $this->Html->link(__('Land Owners'),
                                     array('action' => 'cc',$lacase)); ?>
            &nbsp; || &nbsp;
            <?php echo $this->Html->link(__('Bargadar'),
                                     array('action' => 'cc',$lacase,"Y")); ?>
                       
        </li>
            
   </ul>       
	<h2><?php //echo __('Lacases'); ?></h2>
     <?php endif; ?>
		</table>	
</div>