<div class="acquisitionedAreas form">
<?php echo $this->Form->create('AcquisitionedArea'); ?>
	<fieldset>
		<legend><?php echo __('Edit Acquisitioned Area'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('land_id');
		echo $this->Form->input('ana');
		echo $this->Form->input('kra');
		echo $this->Form->input('ganda');
		echo $this->Form->input('krati');
		echo $this->Form->input('til');
		echo $this->Form->input('total');
		echo $this->Form->input('charset');
		echo $this->Form->input('active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('AcquisitionedArea.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('AcquisitionedArea.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Acquisitioned Areas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lands'), array('controller' => 'lands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Land'), array('controller' => 'lands', 'action' => 'add')); ?> </li>
	</ul>
</div>
