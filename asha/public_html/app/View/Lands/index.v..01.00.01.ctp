<div class="landsindex">
	<h2><?php echo __('Lands'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
    		<th>LA-Case Details</th>
            <th>Plot Details</th>
            <th>Acquisition Details</th>
            <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    <tr>
			<!-- <th><?php echo $this->Paginator->sort('id'); ?></th> -->
  			<!-- <th><?php echo $this->Paginator->sort('office_id'); ?></th> -->
			<!-- <th><?php echo $this->Paginator->sort('user_id'); ?></th> -->
			<th><?php echo $this->Paginator->sort('lacase_id'); ?></th>
<!--			<th><?php echo $this->Paginator->sort('sl_no'); ?></th> -->
			<th><?php echo $this->Paginator->sort('rsplot_no'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('portion'); ?></th>
			<th><?php echo $this->Paginator->sort('khatian_no'); ?></th>
			<th><?php echo $this->Paginator->sort('mouja'); ?></th>
			<th><?php echo $this->Paginator->sort('jl_no'); ?></th>
			<th><?php echo $this->Paginator->sort('dag_no'); ?></th>
			<th><?php echo $this->Paginator->sort('police_station'); ?></th>
			<th><?php echo $this->Paginator->sort('acquisitioned_areas_value'); ?></th>
            <th><?php echo $this->Paginator->sort('tree_area'); ?></th>
            <th><?php echo $this->Paginator->sort('structure_area'); ?></th>
            <th><?php echo $this->Paginator->sort('pan_baroz_area'); ?></th>
			<th><?php echo $this->Paginator->sort('land_value'); ?></th>
<!--			<th><?php echo $this->Paginator->sort('charset'); ?></th> -->
<!--			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('active'); ?></th>
  -->          
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($lands as $land): ?>
	<tr>
<!-- 		<td><?php echo h($land['Land']['id']); ?>&nbsp;</td> -->
<!--		<td>
			<?php echo $this->Html->link($land['Office']['name'], array('controller' => 'offices', 'action' => 'view', $land['Office']['id'])); ?>
		</td>
-->        
<!--		<td>
			<?php echo $this->Html->link($land['User']['id'], array('controller' => 'users', 'action' => 'view', $land['User']['id'])); ?>
		</td>
 -->       
		<td>
			<?php echo $this->Html->link($land['Lacase']['la_case_number'], array('controller' => 'lacases', 'action' => 'view', $land['Lacase']['id'])); ?>
		</td>
<!--		<td><?php echo h($land['Land']['sl_no']); ?>&nbsp;</td> -->
		<td><?php echo h($land['Land']['rsplot_no']); ?>&nbsp;</td>
		<td><?php echo h($land['Land']['status']); ?>&nbsp;</td>
		<td><?php echo h($land['Land']['portion']); ?>&nbsp;</td>
		<td><?php echo h($land['Land']['khatian_no']); ?>&nbsp;</td>
		<td><?php echo h($land['Land']['mouja']); ?>&nbsp;</td>
		<td><?php echo h($land['Land']['jl_no']); ?>&nbsp;</td>
		<td><?php echo h($land['Land']['dag_no']); ?>&nbsp;</td>
		<td><?php echo h($land['Land']['police_station']); ?>&nbsp;</td>
		<td><?php echo h($land['Land']['acquisitioned_areas_value']); ?>&nbsp;</td>
        <td><?php echo h($land['Land']['tree_area']); ?>&nbsp;</td>
        <td><?php echo h($land['Land']['structure_area']); ?>&nbsp;</td>
        <td><?php echo h($land['Land']['pan_baroz_area']); ?>&nbsp;</td>
		<td><?php echo h($land['Land']['land_value']); ?>&nbsp;</td>
<!-- 		<td><?php echo h($land['Land']['charset']); ?>&nbsp;</td> -->
<!--		<td><?php echo h($land['Land']['created']); ?>&nbsp;</td>
		<td><?php echo h($land['Land']['modified']); ?>&nbsp;</td>
 -->      
<!--		<td><?php echo h($land['Land']['active']); ?>&nbsp;</td> -->
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $land['Land']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $land['Land']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $land['Land']['id']), null, __('Are you sure you want to delete # %s?', $land['Land']['id'])); ?>
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
<!--<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Land'), array('action' => 'add')); ?></li>
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
-->