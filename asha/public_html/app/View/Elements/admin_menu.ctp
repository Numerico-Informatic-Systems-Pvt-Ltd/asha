 <div class="nis-wrapper-navigation-inner">
<ul>
   <li><?php echo $this->Html->link('Dashboard',array('plugin'=>'usermgmt','controller'=>'users',							'action' => 'dashboard')); ?></li>

   <li><?php echo $this->Html->link('LA Case',array('plugin'=>false,'controller'=>'lacases',							'action' => 'add')); ?></li>
   <li><?php echo $this->Html->link('Plot',array('plugin'=>false,'controller'=>'Lands',										'action' => 'lac'));?></li>
   <li><?php echo $this->Html->link('Owner',array('plugin'=>false,'controller'=>'Owners',												'action' => 'addplot'));?></li>
  <li><?php echo $this->Html->link('Calculation',array('plugin'=>false,									'controller'=>'Lands','action' => 'solatium'));?></li> 
  <!--<li><?php echo $this->Html->link('Adjustment',array('plugin'=>false,'controller'=>'Lands','action' => 'adjustment'));?></li> -->
  <li><?php echo $this->Html->link('FORM 13',array('plugin'=>false,'controller'=>'Lacases','action' => 'reportsearch'));?></li>	
  <li><?php echo $this->Html->link('Award List',array('plugin'=>false,'controller'=>'Lacases','action' => 'search'));?></li>	
  <li><?php echo $this->Html->link('Logout',array('plugin'=>'usermgmt','controller'=>'users','action' => 'logout'
)); ?></li>	
</ul>
</div>
