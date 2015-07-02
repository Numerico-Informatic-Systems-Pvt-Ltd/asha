<div class="chainDeeds index">
	<h2><?php echo __('Chain Deeds'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('previous_owner_name'); ?></th>
			<th><?php echo $this->Paginator->sort('previous_relation'); ?></th>
			<th><?php echo $this->Paginator->sort('previous_parents'); ?></th>
			<th><?php echo $this->Paginator->sort('present_owner_name'); ?></th>
			<th><?php echo $this->Paginator->sort('present_relation'); ?></th>
			<th><?php echo $this->Paginator->sort('present_parent'); ?></th>
			<th><?php echo $this->Paginator->sort('charset'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('active'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($chainDeeds as $chainDeed): ?>
	<tr>
		<td><?php echo h($chainDeed['ChainDeed']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($chainDeed['User']['id'], array('controller' => 'users', 'action' => 'view', $chainDeed['User']['id'])); ?>
		</td>
		<td><?php echo h($chainDeed['ChainDeed']['previous_owner_name']); ?>&nbsp;</td>
		<td><?php echo h($chainDeed['ChainDeed']['previous_relation']); ?>&nbsp;</td>
		<td><?php echo h($chainDeed['ChainDeed']['previous_parents']); ?>&nbsp;</td>
		<td><?php echo h($chainDeed['ChainDeed']['present_owner_name']); ?>&nbsp;</td>
		<td><?php echo h($chainDeed['ChainDeed']['present_relation']); ?>&nbsp;</td>
		<td><?php echo h($chainDeed['ChainDeed']['present_parent']); ?>&nbsp;</td>
		<td><?php echo h($chainDeed['ChainDeed']['charset']); ?>&nbsp;</td>
		<td><?php echo h($chainDeed['ChainDeed']['created']); ?>&nbsp;</td>
		<td><?php echo h($chainDeed['ChainDeed']['modified']); ?>&nbsp;</td>
		<td><?php echo h($chainDeed['ChainDeed']['active']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $chainDeed['ChainDeed']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $chainDeed['ChainDeed']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $chainDeed['ChainDeed']['id']), null, __('Are you sure you want to delete # %s?', $chainDeed['ChainDeed']['id'])); ?>
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Chain Deed'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
