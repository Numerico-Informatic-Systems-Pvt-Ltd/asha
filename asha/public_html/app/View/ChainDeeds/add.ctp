<div class="chainDeeds form">
<?php echo $this->Form->create('ChainDeed'); ?>
	<fieldset>
		<legend><?php echo __('Add Chain Deed'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('previous_owner_name');
		echo $this->Form->input('previous_relation');
		echo $this->Form->input('previous_parents');
		echo $this->Form->input('present_owner_name');
		echo $this->Form->input('present_relation');
		echo $this->Form->input('present_parent');
		echo $this->Form->input('charset');
		echo $this->Form->input('active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Chain Deeds'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
