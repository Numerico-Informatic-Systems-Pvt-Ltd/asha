<div class="offices view">
<h2><?php  echo __('Office'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($office['Office']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($office['Office']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($office['Office']['address']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Office'), array('action' => 'edit', $office['Office']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Office'), array('action' => 'delete', $office['Office']['id']), null, __('Are you sure you want to delete # %s?', $office['Office']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Offices'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Office'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lacases'), array('controller' => 'lacases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lacase'), array('controller' => 'lacases', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lands'), array('controller' => 'lands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Land'), array('controller' => 'lands', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Lacases'); ?></h3>
	<?php if (!empty($office['Lacase'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Office Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('La Case Number'); ?></th>
		<th><?php echo __('Project'); ?></th>
		<th><?php echo __('Year Of Lacase'); ?></th>
		<th><?php echo __('Possession Date'); ?></th>
		<th><?php echo __('Publication Date'); ?></th>
		<th><?php echo __('Period Of Interest From'); ?></th>
		<th><?php echo __('Period Of Interest To'); ?></th>
		<th><?php echo __('Period Of Requisition From'); ?></th>
		<th><?php echo __('Period Of Requisition To'); ?></th>
		<th><?php echo __('Act'); ?></th>
		<th><?php echo __('Mouza'); ?></th>
		<th><?php echo __('Police Station'); ?></th>
		<th><?php echo __('Jl Number'); ?></th>
		<th><?php echo __('District'); ?></th>
		<th><?php echo __('Charset'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($office['Lacase'] as $lacase): ?>
		<tr>
			<td><?php echo $lacase['id']; ?></td>
			<td><?php echo $lacase['office_id']; ?></td>
			<td><?php echo $lacase['user_id']; ?></td>
			<td><?php echo $lacase['la_case_number']; ?></td>
			<td><?php echo $lacase['project']; ?></td>
			<td><?php echo $lacase['year_of_lacase']; ?></td>
			<td><?php echo $lacase['possession_date']; ?></td>
			<td><?php echo $lacase['publication_date']; ?></td>
			<td><?php echo $lacase['period_of_interest_from']; ?></td>
			<td><?php echo $lacase['period_of_interest_to']; ?></td>
			<td><?php echo $lacase['period_of_requisition_from']; ?></td>
			<td><?php echo $lacase['period_of_requisition_to']; ?></td>
			<td><?php echo $lacase['act']; ?></td>
			<td><?php echo $lacase['mouza']; ?></td>
			<td><?php echo $lacase['police_station']; ?></td>
			<td><?php echo $lacase['jl_number']; ?></td>
			<td><?php echo $lacase['district']; ?></td>
			<td><?php echo $lacase['charset']; ?></td>
			<td><?php echo $lacase['created']; ?></td>
			<td><?php echo $lacase['modified']; ?></td>
			<td><?php echo $lacase['active']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'lacases', 'action' => 'view', $lacase['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'lacases', 'action' => 'edit', $lacase['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'lacases', 'action' => 'delete', $lacase['id']), null, __('Are you sure you want to delete # %s?', $lacase['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Lacase'), array('controller' => 'lacases', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Lands'); ?></h3>
	<?php if (!empty($office['Land'])): ?>
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
		foreach ($office['Land'] as $land): ?>
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
