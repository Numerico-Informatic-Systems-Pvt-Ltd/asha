<div class="kycs view">
<h2><?php  echo __('Kyc'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($kyc['Kyc']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Owner'); ?></dt>
		<dd>
			<?php echo $this->Html->link($kyc['Owner']['name'], array('controller' => 'owners', 'action' => 'view', $kyc['Owner']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bank Account Number'); ?></dt>
		<dd>
			<?php echo h($kyc['Kyc']['bank_account_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bank Name'); ?></dt>
		<dd>
			<?php echo h($kyc['Kyc']['bank_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bank Branch'); ?></dt>
		<dd>
			<?php echo h($kyc['Kyc']['bank_branch']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ifsc Code'); ?></dt>
		<dd>
			<?php echo h($kyc['Kyc']['ifsc_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pan Number'); ?></dt>
		<dd>
			<?php echo h($kyc['Kyc']['pan_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Voter Card Number'); ?></dt>
		<dd>
			<?php echo h($kyc['Kyc']['voter_card_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Other'); ?></dt>
		<dd>
			<?php echo h($kyc['Kyc']['other']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($kyc['Kyc']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($kyc['Kyc']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($kyc['Kyc']['active']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Kyc'), array('action' => 'edit', $kyc['Kyc']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Kyc'), array('action' => 'delete', $kyc['Kyc']['id']), null, __('Are you sure you want to delete # %s?', $kyc['Kyc']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Kycs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kyc'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Owners'), array('controller' => 'owners', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Owner'), array('controller' => 'owners', 'action' => 'add')); ?> </li>
	</ul>
</div>
