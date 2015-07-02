<div class="acquisitionedAreas index">
	<h2><?php echo __('Acquisitioned Areas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('land_id'); ?></th>
			<th><?php echo $this->Paginator->sort('ana'); ?></th>
			<th><?php echo $this->Paginator->sort('kra'); ?></th>
			<th><?php echo $this->Paginator->sort('ganda'); ?></th>
			<th><?php echo $this->Paginator->sort('krati'); ?></th>
			<th><?php echo $this->Paginator->sort('til'); ?></th>
			<th><?php echo $this->Paginator->sort('total'); ?></th>
			<th><?php echo $this->Paginator->sort('charset'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('active'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($acquisitionedAreas as $acquisitionedArea): ?>
	<tr>
		<td><?php echo h($acquisitionedArea['AcquisitionedArea']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($acquisitionedArea['User']['id'], array('controller' => 'users', 'action' => 'view', $acquisitionedArea['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($acquisitionedArea['Land']['id'], array('controller' => 'lands', 'action' => 'view', $acquisitionedArea['Land']['id'])); ?>
		</td>
		<td><?php echo h($acquisitionedArea['AcquisitionedArea']['ana']); ?>&nbsp;</td>
		<td><?php echo h($acquisitionedArea['AcquisitionedArea']['kra']); ?>&nbsp;</td>
		<td><?php echo h($acquisitionedArea['AcquisitionedArea']['ganda']); ?>&nbsp;</td>
		<td><?php echo h($acquisitionedArea['AcquisitionedArea']['krati']); ?>&nbsp;</td>
		<td><?php echo h($acquisitionedArea['AcquisitionedArea']['til']); ?>&nbsp;</td>
		<td><?php echo h($acquisitionedArea['AcquisitionedArea']['total']); ?>&nbsp;</td>
		<td><?php echo h($acquisitionedArea['AcquisitionedArea']['charset']); ?>&nbsp;</td>
		<td><?php echo h($acquisitionedArea['AcquisitionedArea']['created']); ?>&nbsp;</td>
		<td><?php echo h($acquisitionedArea['AcquisitionedArea']['modified']); ?>&nbsp;</td>
		<td><?php echo h($acquisitionedArea['AcquisitionedArea']['active']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $acquisitionedArea['AcquisitionedArea']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $acquisitionedArea['AcquisitionedArea']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $acquisitionedArea['AcquisitionedArea']['id']), null, __('Are you sure you want to delete # %s?', $acquisitionedArea['AcquisitionedArea']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Acquisitioned Area'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lands'), array('controller' => 'lands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Land'), array('controller' => 'lands', 'action' => 'add')); ?> </li>
	</ul>
</div>
