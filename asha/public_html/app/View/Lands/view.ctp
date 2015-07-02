<div class="lands view">
<h2><?php echo __('Land'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($land['Land']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Office'); ?></dt>
		<dd>
			<?php echo $this->Html->link($land['Office']['name'], array('controller' => 'offices', 'action' => 'view', $land['Office']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($land['User']['id'], array('controller' => 'users', 'action' => 'view', $land['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lacase'); ?></dt>
		<dd>
			<?php echo $this->Html->link($land['Lacase']['id'], array('controller' => 'lacases', 'action' => 'view', $land['Lacase']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sl No'); ?></dt>
		<dd>
			<?php echo h($land['Land']['sl_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rsplot No'); ?></dt>
		<dd>
			<?php echo h($land['Land']['rsplot_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($land['Land']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Portion'); ?></dt>
		<dd>
			<?php echo h($land['Land']['portion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Khatian No'); ?></dt>
		<dd>
			<?php echo h($land['Land']['khatian_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mouja'); ?></dt>
		<dd>
			<?php echo h($land['Land']['mouja']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Jl No'); ?></dt>
		<dd>
			<?php echo h($land['Land']['jl_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dag No'); ?></dt>
		<dd>
			<?php echo h($land['Land']['dag_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Police Station'); ?></dt>
		<dd>
			<?php echo h($land['Land']['police_station']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Acquisitioned Areas Value'); ?></dt>
		<dd>
			<?php echo h($land['Land']['acquisitioned_areas_value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Land Value'); ?></dt>
		<dd>
			<?php echo h($land['Land']['land_value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Charset'); ?></dt>
		<dd>
			<?php echo h($land['Land']['charset']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($land['Land']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($land['Land']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($land['Land']['active']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Land'), array('action' => 'edit', $land['Land']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Land'), array('action' => 'delete', $land['Land']['id']), null, __('Are you sure you want to delete # %s?', $land['Land']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Lands'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Land'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Offices'), array('controller' => 'offices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Office'), array('controller' => 'offices', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lacases'), array('controller' => 'lacases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lacase'), array('controller' => 'lacases', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Acquisitioned Areas'), array('controller' => 'acquisitioned_areas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Acquisitioned Areas'), array('controller' => 'acquisitioned_areas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Land Values'), array('controller' => 'land_values', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Land Value'), array('controller' => 'land_values', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Estimates'), array('controller' => 'estimates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estimate'), array('controller' => 'estimates', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Land Owners'), array('controller' => 'land_owners', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Land Owner'), array('controller' => 'land_owners', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Acquisitioned Areas'); ?></h3>
	<?php if (!empty($land['AcquisitionedArea'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Land Id'); ?></th>
		<th><?php echo __('Ana'); ?></th>
		<th><?php echo __('Kra'); ?></th>
		<th><?php echo __('Ganda'); ?></th>
		<th><?php echo __('Krati'); ?></th>
		<th><?php echo __('Til'); ?></th>
		<th><?php echo __('Total'); ?></th>
		<th><?php echo __('Charset'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($land['AcquisitionedArea'] as $acquisitionedArea): ?>
		<tr>
			<td><?php echo $acquisitionedArea['id']; ?></td>
			<td><?php echo $acquisitionedArea['user_id']; ?></td>
			<td><?php echo $acquisitionedArea['land_id']; ?></td>
			<td><?php echo $acquisitionedArea['ana']; ?></td>
			<td><?php echo $acquisitionedArea['kra']; ?></td>
			<td><?php echo $acquisitionedArea['ganda']; ?></td>
			<td><?php echo $acquisitionedArea['krati']; ?></td>
			<td><?php echo $acquisitionedArea['til']; ?></td>
			<td><?php echo $acquisitionedArea['total']; ?></td>
			<td><?php echo $acquisitionedArea['charset']; ?></td>
			<td><?php echo $acquisitionedArea['created']; ?></td>
			<td><?php echo $acquisitionedArea['modified']; ?></td>
			<td><?php echo $acquisitionedArea['active']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'acquisitioned_areas', 'action' => 'view', $acquisitionedArea['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'acquisitioned_areas', 'action' => 'edit', $acquisitionedArea['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'acquisitioned_areas', 'action' => 'delete', $acquisitionedArea['id']), null, __('Are you sure you want to delete # %s?', $acquisitionedArea['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Acquisitioned Area'), array('controller' => 'acquisitioned_areas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Estimates'); ?></h3>
	<?php if (!empty($land['Estimate'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Land Id'); ?></th>
		<th><?php echo __('Owner Id'); ?></th>
		<th><?php echo __('Shared Area'); ?></th>
		<th><?php echo __('Value'); ?></th>
		<th><?php echo __('Charset'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($land['Estimate'] as $estimate): ?>
		<tr>
			<td><?php echo $estimate['id']; ?></td>
			<td><?php echo $estimate['user_id']; ?></td>
			<td><?php echo $estimate['land_id']; ?></td>
			<td><?php echo $estimate['owner_id']; ?></td>
			<td><?php echo $estimate['shared_area']; ?></td>
			<td><?php echo $estimate['value']; ?></td>
			<td><?php echo $estimate['charset']; ?></td>
			<td><?php echo $estimate['created']; ?></td>
			<td><?php echo $estimate['modified']; ?></td>
			<td><?php echo $estimate['active']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'estimates', 'action' => 'view', $estimate['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'estimates', 'action' => 'edit', $estimate['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'estimates', 'action' => 'delete', $estimate['id']), null, __('Are you sure you want to delete # %s?', $estimate['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Estimate'), array('controller' => 'estimates', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Land Owners'); ?></h3>
	<?php if (!empty($land['LandOwner'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Owner Id'); ?></th>
		<th><?php echo __('Land Id'); ?></th>
		<th><?php echo __('Shared Area'); ?></th>
		<th><?php echo __('Portion'); ?></th>
		<th><?php echo __('Police Station'); ?></th>
		<th><?php echo __('Charset'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($land['LandOwner'] as $landOwner): ?>
		<tr>
			<td><?php echo $landOwner['id']; ?></td>
			<td><?php echo $landOwner['user_id']; ?></td>
			<td><?php echo $landOwner['owner_id']; ?></td>
			<td><?php echo $landOwner['land_id']; ?></td>
			<td><?php echo $landOwner['shared_area']; ?></td>
			<td><?php echo $landOwner['portion']; ?></td>
			<td><?php echo $landOwner['police_station']; ?></td>
			<td><?php echo $landOwner['charset']; ?></td>
			<td><?php echo $landOwner['created']; ?></td>
			<td><?php echo $landOwner['modified']; ?></td>
			<td><?php echo $landOwner['active']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'land_owners', 'action' => 'view', $landOwner['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'land_owners', 'action' => 'edit', $landOwner['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'land_owners', 'action' => 'delete', $landOwner['id']), null, __('Are you sure you want to delete # %s?', $landOwner['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Land Owner'), array('controller' => 'land_owners', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Land Values'); ?></h3>
	<?php if (!empty($land['LandValue'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Land Id'); ?></th>
		<th><?php echo __('Land'); ?></th>
		<th><?php echo __('Tree'); ?></th>
		<th><?php echo __('Structure'); ?></th>
		<th><?php echo __('Value'); ?></th>
		<th><?php echo __('Charset'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($land['LandValue'] as $landValue): ?>
		<tr>
			<td><?php echo $landValue['id']; ?></td>
			<td><?php echo $landValue['user_id']; ?></td>
			<td><?php echo $landValue['land_id']; ?></td>
			<td><?php echo $landValue['land']; ?></td>
			<td><?php echo $landValue['tree']; ?></td>
			<td><?php echo $landValue['structure']; ?></td>
			<td><?php echo $landValue['value']; ?></td>
			<td><?php echo $landValue['charset']; ?></td>
			<td><?php echo $landValue['created']; ?></td>
			<td><?php echo $landValue['modified']; ?></td>
			<td><?php echo $landValue['active']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'land_values', 'action' => 'view', $landValue['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'land_values', 'action' => 'edit', $landValue['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'land_values', 'action' => 'delete', $landValue['id']), null, __('Are you sure you want to delete # %s?', $landValue['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Land Value'), array('controller' => 'land_values', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
