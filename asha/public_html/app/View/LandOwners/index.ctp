<div class="landOwners index">
	<h2><?php echo __('Land Owners'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('owner_id'); ?></th>
			<th><?php echo $this->Paginator->sort('land_id'); ?></th>
			<th><?php echo $this->Paginator->sort('shared_area'); ?></th>
			<th><?php echo $this->Paginator->sort('portion'); ?></th>
			<th><?php echo $this->Paginator->sort('police_station'); ?></th>
			<th><?php echo $this->Paginator->sort('charset'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('active'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($landOwners as $landOwner): ?>
	<tr>
		<td><?php echo h($landOwner['LandOwner']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($landOwner['User']['id'], array('controller' => 'users', 'action' => 'view', $landOwner['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($landOwner['Owner']['name'], array('controller' => 'owners', 'action' => 'view', $landOwner['Owner']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($landOwner['Land']['id'], array('controller' => 'lands', 'action' => 'view', $landOwner['Land']['id'])); ?>
		</td>
		<td><?php echo h($landOwner['LandOwner']['shared_area']); ?>&nbsp;</td>
		<td><?php echo h($landOwner['LandOwner']['portion']); ?>&nbsp;</td>
		<td><?php echo h($landOwner['LandOwner']['police_station']); ?>&nbsp;</td>
		<td><?php echo h($landOwner['LandOwner']['charset']); ?>&nbsp;</td>
		<td><?php echo h($landOwner['LandOwner']['created']); ?>&nbsp;</td>
		<td><?php echo h($landOwner['LandOwner']['modified']); ?>&nbsp;</td>
		<td><?php echo h($landOwner['LandOwner']['active']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $landOwner['LandOwner']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $landOwner['LandOwner']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $landOwner['LandOwner']['id']), null, __('Are you sure you want to delete # %s?', $landOwner['LandOwner']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Land Owner'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Owners'), array('controller' => 'owners', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Owner'), array('controller' => 'owners', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lands'), array('controller' => 'lands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Land'), array('controller' => 'lands', 'action' => 'add')); ?> </li>
	</ul>
</div>
