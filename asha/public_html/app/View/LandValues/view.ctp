<div class="landValues view">
<h2><?php  echo __('Land Value'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($landValue['LandValue']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($landValue['User']['id'], array('controller' => 'users', 'action' => 'view', $landValue['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Land'); ?></dt>
		<dd>
			<?php echo $this->Html->link($landValue['Land']['id'], array('controller' => 'lands', 'action' => 'view', $landValue['Land']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Land'); ?></dt>
		<dd>
			<?php echo h($landValue['LandValue']['land']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tree'); ?></dt>
		<dd>
			<?php echo h($landValue['LandValue']['tree']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Structure'); ?></dt>
		<dd>
			<?php echo h($landValue['LandValue']['structure']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($landValue['LandValue']['value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Charset'); ?></dt>
		<dd>
			<?php echo h($landValue['LandValue']['charset']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($landValue['LandValue']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($landValue['LandValue']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($landValue['LandValue']['active']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Land Value'), array('action' => 'edit', $landValue['LandValue']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Land Value'), array('action' => 'delete', $landValue['LandValue']['id']), null, __('Are you sure you want to delete # %s?', $landValue['LandValue']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Land Values'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Land Value'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lands'), array('controller' => 'lands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Land'), array('controller' => 'lands', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Lands'); ?></h3>
	<?php if (!empty($landValue['Land'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Office Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Lacase Id'); ?></th>
		<th><?php echo __('Sl No'); ?></th>
		<th><?php echo __('Rsplot No'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Portion'); ?></th>
		<th><?php echo __('Khatian No'); ?></th>
		<th><?php echo __('Mouja'); ?></th>
		<th><?php echo __('Jl No'); ?></th>
		<th><?php echo __('Dag No'); ?></th>
		<th><?php echo __('Police Station'); ?></th>
		<th><?php echo __('Acquisitioned Areas Id'); ?></th>
		<th><?php echo __('Land Value Id'); ?></th>
		<th><?php echo __('Charset'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($landValue['Land'] as $land): ?>
		<tr>
			<td><?php echo $land['id']; ?></td>
			<td><?php echo $land['office_id']; ?></td>
			<td><?php echo $land['user_id']; ?></td>
			<td><?php echo $land['lacase_id']; ?></td>
			<td><?php echo $land['sl_no']; ?></td>
			<td><?php echo $land['rsplot_no']; ?></td>
			<td><?php echo $land['status']; ?></td>
			<td><?php echo $land['portion']; ?></td>
			<td><?php echo $land['khatian_no']; ?></td>
			<td><?php echo $land['mouja']; ?></td>
			<td><?php echo $land['jl_no']; ?></td>
			<td><?php echo $land['dag_no']; ?></td>
			<td><?php echo $land['police_station']; ?></td>
			<td><?php echo $land['acquisitioned_areas_id']; ?></td>
			<td><?php echo $land['land_value_id']; ?></td>
			<td><?php echo $land['charset']; ?></td>
			<td><?php echo $land['created']; ?></td>
			<td><?php echo $land['modified']; ?></td>
			<td><?php echo $land['active']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'lands', 'action' => 'view', $land['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'lands', 'action' => 'edit', $land['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'lands', 'action' => 'delete', $land['id']), null, __('Are you sure you want to delete # %s?', $land['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Land'), array('controller' => 'lands', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
