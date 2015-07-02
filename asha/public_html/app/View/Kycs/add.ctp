<div class="kycs form">
<?php echo $this->Form->create('Kyc'); ?>
	<fieldset>
		<legend><?php echo __('Add Kyc'); ?></legend>
	<?php
		echo $this->Form->input('owner_id');
		echo $this->Form->input('bank_account_number');
		echo $this->Form->input('bank_name');
		echo $this->Form->input('bank_branch');
		echo $this->Form->input('ifsc_code');
		echo $this->Form->input('pan_number');
		echo $this->Form->input('voter_card_number');
		echo $this->Form->input('other');
		echo $this->Form->input('active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Kycs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Owners'), array('controller' => 'owners', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Owner'), array('controller' => 'owners', 'action' => 'add')); ?> </li>
	</ul>
</div>
