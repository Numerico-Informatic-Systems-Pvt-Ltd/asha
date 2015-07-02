<?php
#	ADMIN PANEL 
#	Used to DISPLAY admin links. Instructions for admin etc
#	Developed by Numerico Informatic Systems Pvt. Ltd.
#	Date 10/26/2013

echo $this->Html->css('admin_panel');
?>

<h1>Welcome to ASHA - Admin Panel</h1>
<div id="admin-panel-menu">

<ol>
 
   <li><?php echo $this->Html->link('LA Case',array('plugin'=>false,'controller'=>'lacases',							'action' => 'add')); ?></li>
   <li><?php echo $this->Html->link('Plot',array('plugin'=>false,'controller'=>'Lands',										'action' => 'lac'));?></li>
   <li><?php echo $this->Html->link('Owner',array('plugin'=>false,'controller'=>'Owners',												'action' => 'addplot'));?></li>
  <li><?php echo $this->Html->link('Calculation',array('plugin'=>false,									'controller'=>'Lands','action' => 'solatium'));?></li> 
   <li><?php echo $this->Html->link('Adjustment',array('plugin'=>false,'controller'=>'Lands','action' => 'adjustment'));?></li> 

  <li><?php echo $this->Html->link('Award List',array('plugin'=>false,										'controller'=>'Lacases','action' => 'search'));?></li>	
</ol>
</div>