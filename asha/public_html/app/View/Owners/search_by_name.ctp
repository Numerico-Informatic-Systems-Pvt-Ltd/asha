<div class="ownersindex">
	<h2><?php echo __('Owners'); ?></h2>
    
    <div class="form" style="width:400px;float:left;">
    <?php echo $this->Form->create("",array("action" => "search_by_name")); ?>
    <legend><b>Search Owners</b></legend>
     <?php echo "Select LA Case<br />".$this->Form->input('lacase_id',array('label'=>false)); ?>
    <?php echo $this->Form->input("q",array("label"=>"Name")); ?>
    <?php echo $this->Form->submit("Submit"); ?>
    </div>
    
	<table cellpadding="0" cellspacing="0">
	<tr>
	        <th>La case</th>
			<th>Name</th>
			<th>Relation</th>
			<th>Parent</th>
			<th>Address</th>
			<th>Police Station</th>
			<th>Verified</th>
			<th>Bargadar</th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($owners as $owner): ?>
	<tr>
	    <td><?php echo h($owner['Lacase']['la_case_number']); ?>&nbsp;</td>
		<td><?php echo h($owner['Owner']['name']); ?>&nbsp;</td>
		<td><?php echo h($owner['Owner']['relation']); ?>&nbsp;</td>
		<td><?php echo h($owner['Owner']['parent']); ?>&nbsp;</td>
		<td><?php echo h($owner['Owner']['address']); ?>&nbsp;</td>
		<td><?php echo h($owner['Owner']['police_station']); ?>&nbsp;</td>
		<td><?php echo h($owner['Owner']['varified']); ?>&nbsp;</td>
		<td><?php echo h($owner['Owner']['bargadar']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $owner['Owner']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
    <?php
		
		if(empty($owner['Owner']['lacase_id'])) $owner['Owner']['lacase_id'] = '';
		if(empty($q)) $q = '';
		
		$this->Paginator->options(array('url'=> array('controller' => 'owners', 
									'action' => 'search_by_name',
									$owner['Owner']['lacase_id'],
									$q)
								));

	?>
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
<br /><br /><br /><br />