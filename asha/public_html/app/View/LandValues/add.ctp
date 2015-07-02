<div class="landValues form">
<?php echo $this->Form->create('LandValue'); ?>
	<fieldset>
		<legend><?php echo __('Add Land Value'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('land_id');
		echo $this->Form->input('land');
		echo $this->Form->input('tree');
		echo $this->Form->input('structure');
		echo $this->Form->input('value');
		echo $this->Form->input('charset');
		echo $this->Form->input('active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Land Values'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lands'), array('controller' => 'lands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Land'), array('controller' => 'lands', 'action' => 'add')); ?> </li>
	</ul>
</div>
