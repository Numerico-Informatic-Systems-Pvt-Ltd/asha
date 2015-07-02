<div class="lacases index">
	<h2><?php echo __('LA Cases'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('la_case_number'); ?></th>
			<th width="240"><?php echo $this->Paginator->sort('project'); ?></th>
			<th><b>Important Dates</b>
			
			<th>Description of Land</th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($lacases as $lacase): ?>
	<tr>
		<td><?php echo h($lacase['Lacase']['la_case_number']); ?>&nbsp;<br />
	        <b>Acquisitioned under ACT:</b> <?php echo h($lacase['Lacase']['act']); ?>&nbsp;<br /></td>
		<td><?php echo h($lacase['Lacase']['project']); ?>&nbsp;</td>
		<td><b>Year of L.A. Case:</b> <?php echo h($lacase['Lacase']['year_of_lacase']); ?>&nbsp;<br /><br />
		    <b>Possession Date:</b> <?php echo h($lacase['Lacase']['possession_date']); ?>&nbsp;<br /><br />
		    <b>Tentative Date of Materail or Date of Gezette Publication:</b> <?php echo h($lacase['Lacase']['publication_date']); ?>&nbsp;<br /><br />
			<b>Date of 80% Payment:</b> <?php echo h($lacase['Lacase']['period_of_interest_from']); ?>&nbsp;<br /><br />
			<b>Tentative Date of Award:</b> <?php echo h($lacase['Lacase']['period_of_interest_to']); ?>&nbsp;</td>
		<td>
			<b>Mouza:</b> <?php echo h($lacase['Lacase']['mouza']); ?>&nbsp;<br /><br />
			<b>Police Station:</b> <?php echo h($lacase['Lacase']['police_station']); ?>&nbsp;<br /><br />
			<b>JL Number:</b> <?php echo h($lacase['Lacase']['jl_number']); ?>&nbsp;<br /><br />
			<b>District:</b> <?php echo h($lacase['Lacase']['district']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $lacase['Lacase']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $lacase['Lacase']['id']), null, __('Are you sure you want to delete # %s?', $lacase['Lacase']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Lacase'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Offices'), array('controller' => 'offices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Office'), array('controller' => 'offices', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lands'), array('controller' => 'lands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Land'), array('controller' => 'lands', 'action' => 'add')); ?> </li>
	</ul>
</div>
-->