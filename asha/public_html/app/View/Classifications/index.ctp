<div class="classifications index">
	<h2><?php echo __('Classifications');  ?></h2>
    
    <?php echo $this->Form->create('Classification',array('action'=>'index'));?>
    <legend>Search by LA Case</legend>
    <fieldset>
	<?php echo $this->Form->input('lacase_id'); ?>
	<?php echo $this->Form->end(__('Search')); ?>
    </fieldset>

    
   	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
            <th><?php echo $this->Paginator->sort('lacase_id'); ?></th>
            <th><?php echo $this->Paginator->sort('old_value'); ?></th>
            <th><?php echo $this->Paginator->sort('new_value'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php //debug($classifications);
	foreach ($classifications as $classification): ?>
	<tr>
		<td><?php echo h($classification['Classification']['name']); ?>&nbsp;</td>
        <td><?php echo h($classification['Lacase']['la_case_number']); ?>&nbsp;</td>
        <td><?php echo h($classification['Classification']['old_value']); ?>&nbsp;</td>
        <td><?php echo h($classification['Classification']['new_value']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $classification['Classification']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $classification['Classification']['id']), null, __('Are you sure you want to delete # %s?', $classification['Classification']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Classification'), array('action' => 'add')); ?></li>
	</ul>
</div>
