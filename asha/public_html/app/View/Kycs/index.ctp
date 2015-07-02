<div class="kycs index">
	<h2><?php echo __('Kycs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('owner_id'); ?></th>
			<th><?php echo $this->Paginator->sort('bank_account_number'); ?></th>
			<th><?php echo $this->Paginator->sort('bank_name'); ?></th>
			<th><?php echo $this->Paginator->sort('bank_branch'); ?></th>
			<th><?php echo $this->Paginator->sort('ifsc_code'); ?></th>
			<th><?php echo $this->Paginator->sort('pan_number'); ?></th>
			<th><?php echo $this->Paginator->sort('voter_card_number'); ?></th>
			<th><?php echo $this->Paginator->sort('other'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($kycs as $kyc): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($kyc['Owner']['name'], array('controller' => 'owners', 'action' => 'view', $kyc['Owner']['id'])); ?>
		</td>
		<td><?php echo h($kyc['Kyc']['bank_account_number']); ?>&nbsp;</td>
		<td><?php echo h($kyc['Kyc']['bank_name']); ?>&nbsp;</td>
		<td><?php echo h($kyc['Kyc']['bank_branch']); ?>&nbsp;</td>
		<td><?php echo h($kyc['Kyc']['ifsc_code']); ?>&nbsp;</td>
		<td><?php echo h($kyc['Kyc']['pan_number']); ?>&nbsp;</td>
		<td><?php echo h($kyc['Kyc']['voter_card_number']); ?>&nbsp;</td>
		<td><?php echo h($kyc['Kyc']['other']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $kyc['Kyc']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $kyc['Kyc']['id']), null, __('Are you sure you want to delete # %s?', $kyc['Kyc']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>