<div class="owners form">
<?php echo $this->Form->create('Owner'); ?>
	<fieldset>
		<legend><?php echo __('Add Owner'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('name');
		echo $this->Form->input('relation');
		echo $this->Form->input('parent');
		echo $this->Form->input('ancestor');
		echo $this->Form->input('address');
		echo $this->Form->input('police_station');
		echo $this->Form->input('varified');
		echo $this->Form->input('bargadar');
		echo $this->Form->input('charset');
		echo $this->Form->input('active');
		echo $this->Form->input('Land');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Owners'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lands'), array('controller' => 'lands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Land'), array('controller' => 'lands', 'action' => 'add')); ?> </li>
	</ul>
</div>
