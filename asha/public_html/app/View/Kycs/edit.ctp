<div class="kycs form">
<?php echo $this->Form->create('Kyc'); ?>
	<fieldset>
		<legend><?php echo __('Edit Kyc'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('owner_id');
		echo $this->Form->input('bank_account_number');
		echo $this->Form->input('bank_name');
		echo $this->Form->input('bank_branch');
		echo $this->Form->input('ifsc_code');
		echo $this->Form->input('pan_number');
		echo $this->Form->input('voter_card_number');
		echo $this->Form->input('other');
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>