<div class="offices form">
<?php echo $this->Form->create('Office'); ?>
	<fieldset>
		<legend><?php echo __('Add Office'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('address');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Offices'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Lacases'), array('controller' => 'lacases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lacase'), array('controller' => 'lacases', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lands'), array('controller' => 'lands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Land'), array('controller' => 'lands', 'action' => 'add')); ?> </li>
	</ul>
</div>
