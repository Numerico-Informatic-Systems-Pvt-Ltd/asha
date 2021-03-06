<div class="lands form">
<?php echo $this->Form->create('Land'); ?>
	<fieldset>
		<legend><?php echo __('Edit Land'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('office_id',array('type'=>'hidden','value'=>1));
		echo $this->Form->input('user_id',array('type'=>'hidden','value'=>$this->Session->read('UserAuth.User.id')));
		echo $this->Form->input('lacase_id');
		echo $this->Form->input('sl_no');
		echo $this->Form->input('rsplot_no');
		echo $this->Form->input('status');
		echo $this->Form->input('portion');
		echo $this->Form->input('khatian_no');
		echo $this->Form->input('mouja');
		echo $this->Form->input('jl_no');
		echo $this->Form->input('dag_no');
		echo $this->Form->input('police_station');
		echo $this->Form->input('acquisitioned_areas_value');
		echo $this->Form->input('land_value');
		echo $this->Form->input('charset');
		echo $this->Form->input('active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Land.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Land.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Lands'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Offices'), array('controller' => 'offices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Office'), array('controller' => 'offices', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lacases'), array('controller' => 'lacases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lacase'), array('controller' => 'lacases', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Acquisitioned Areas'), array('controller' => 'acquisitioned_areas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Acquisitioned Areas'), array('controller' => 'acquisitioned_areas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Land Values'), array('controller' => 'land_values', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Land Value'), array('controller' => 'land_values', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Estimates'), array('controller' => 'estimates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estimate'), array('controller' => 'estimates', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Land Owners'), array('controller' => 'land_owners', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Land Owner'), array('controller' => 'land_owners', 'action' => 'add')); ?> </li>
	</ul>
</div>
