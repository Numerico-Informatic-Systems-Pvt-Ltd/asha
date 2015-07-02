<div class="plotEstimates form">
<?php echo $this->Form->create('PlotEstimate'); ?>
	<fieldset>
		<legend><?php echo __('Add Plot Estimate'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('land_id');
		echo $this->Form->input('calculation_type');
		echo $this->Form->input('shared_area');
		echo $this->Form->input('old_rate');
		echo $this->Form->input('old_value');
		echo $this->Form->input('eighty_paid');
		echo $this->Form->input('tree_value');
		echo $this->Form->input('old_eighty');
		echo $this->Form->input('oldtree_eighty');
		echo $this->Form->input('interest1');
		echo $this->Form->input('interest2');
		echo $this->Form->input('newrate');
		echo $this->Form->input('newvalue');
		echo $this->Form->input('newvalue_trees');
		echo $this->Form->input('newvalue_tree_eighty');
		echo $this->Form->input('interest3');
		echo $this->Form->input('value');
		echo $this->Form->input('solatium');
		echo $this->Form->input('charset');
		echo $this->Form->input('active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Plot Estimates'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lands'), array('controller' => 'lands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Land'), array('controller' => 'lands', 'action' => 'add')); ?> </li>
	</ul>
</div>
