<div class="landValues index">
	<h2><?php echo __('Land Values'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('land_id'); ?></th>
			<th><?php echo $this->Paginator->sort('land'); ?></th>
			<th><?php echo $this->Paginator->sort('tree'); ?></th>
			<th><?php echo $this->Paginator->sort('structure'); ?></th>
			<th><?php echo $this->Paginator->sort('value'); ?></th>
			<th><?php echo $this->Paginator->sort('charset'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('active'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($landValues as $landValue): ?>
	<tr>
		<td><?php echo h($landValue['LandValue']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($landValue['User']['id'], array('controller' => 'users', 'action' => 'view', $landValue['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($landValue['Land']['id'], array('controller' => 'lands', 'action' => 'view', $landValue['Land']['id'])); ?>
		</td>
		<td><?php echo h($landValue['LandValue']['land']); ?>&nbsp;</td>
		<td><?php echo h($landValue['LandValue']['tree']); ?>&nbsp;</td>
		<td><?php echo h($landValue['LandValue']['structure']); ?>&nbsp;</td>
		<td><?php echo h($landValue['LandValue']['value']); ?>&nbsp;</td>
		<td><?php echo h($landValue['LandValue']['charset']); ?>&nbsp;</td>
		<td><?php echo h($landValue['LandValue']['created']); ?>&nbsp;</td>
		<td><?php echo h($landValue['LandValue']['modified']); ?>&nbsp;</td>
		<td><?php echo h($landValue['LandValue']['active']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $landValue['LandValue']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $landValue['LandValue']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $landValue['LandValue']['id']), null, __('Are you sure you want to delete # %s?', $landValue['LandValue']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Land Value'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lands'), array('controller' => 'lands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Land'), array('controller' => 'lands', 'action' => 'add')); ?> </li>
	</ul>
</div>
