<div class="lacases view">
<h2><?php  echo __('Lacase'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($lacase['Lacase']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Office'); ?></dt>
		<dd>
			<?php echo $this->Html->link($lacase['Office']['name'], array('controller' => 'offices', 'action' => 'view', $lacase['Office']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($lacase['User']['id'], array('controller' => 'users', 'action' => 'view', $lacase['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('La Case Number'); ?></dt>
		<dd>
			<?php echo h($lacase['Lacase']['la_case_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project'); ?></dt>
		<dd>
			<?php echo h($lacase['Lacase']['project']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Year Of Lacase'); ?></dt>
		<dd>
			<?php echo h($lacase['Lacase']['year_of_lacase']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Possession Date'); ?></dt>
		<dd>
			<?php echo h($lacase['Lacase']['possession_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Publication Date'); ?></dt>
		<dd>
			<?php echo h($lacase['Lacase']['publication_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Period Of Interest From'); ?></dt>
		<dd>
			<?php echo h($lacase['Lacase']['period_of_interest_from']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Period Of Interest To'); ?></dt>
		<dd>
			<?php echo h($lacase['Lacase']['period_of_interest_to']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Period Of Requisition From'); ?></dt>
		<dd>
			<?php echo h($lacase['Lacase']['period_of_requisition_from']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Period Of Requisition To'); ?></dt>
		<dd>
			<?php echo h($lacase['Lacase']['period_of_requisition_to']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Act'); ?></dt>
		<dd>
			<?php echo h($lacase['Lacase']['act']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mouza'); ?></dt>
		<dd>
			<?php echo h($lacase['Lacase']['mouza']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Police Station'); ?></dt>
		<dd>
			<?php echo h($lacase['Lacase']['police_station']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Jl Number'); ?></dt>
		<dd>
			<?php echo h($lacase['Lacase']['jl_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('District'); ?></dt>
		<dd>
			<?php echo h($lacase['Lacase']['district']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Charset'); ?></dt>
		<dd>
			<?php echo h($lacase['Lacase']['charset']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($lacase['Lacase']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($lacase['Lacase']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($lacase['Lacase']['active']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Lacase'), array('action' => 'edit', $lacase['Lacase']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Lacase'), array('action' => 'delete', $lacase['Lacase']['id']), null, __('Are you sure you want to delete # %s?', $lacase['Lacase']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Lacases'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lacase'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Offices'), array('controller' => 'offices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Office'), array('controller' => 'offices', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lands'), array('controller' => 'lands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Land'), array('controller' => 'lands', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Lands'); ?></h3>
	<?php if (!empty($lacase['Land'])): ?>
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
		foreach ($lacase['Land'] as $land): ?>
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
