<div class="classifications form">
<?php echo $this->Form->create('Classification'); ?>
	<fieldset>
		<legend><?php echo __('Add Classification'); ?></legend>
	<?php
		echo $this->Form->input('lacase_id');
		echo $this->Form->input('name');
		echo $this->Form->input('old_value');
		echo $this->Form->input('new_value');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>

<?php 	
	if(isset($lacase_id)):	
		$classifications = $this->requestAction('/classifications/list_by_lacase_id/'.$lacase_id);
?>

<div class="classifications	">

	<?php
	$lacase_no = $classifications['0']['Lacase']['la_case_number'];
	?>
	<h2><?php echo __('Classifications of LA Case: "'. $lacase_no. '"'); ?></h2>
    
	<table cellpadding="0" cellspacing="0" width="40%">
	<tr>
			<th><?php echo ('name'); ?></th>
            <th><?php echo ('old_value'); ?></th>
            <th><?php echo ('new_value'); ?></th>
 				<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php //debug($classifications);
	foreach ($classifications as $classification): ?>
	<tr>
		<td><?php echo h($classification['Classification']['name']); ?>&nbsp;</td>
        <td><?php echo h($classification['Classification']['old_value']); ?>&nbsp;</td>
        <td><?php echo h($classification['Classification']['new_value']); ?>&nbsp;</td>
		
        <td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $classification['Classification']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $classification['Classification']['id']), null, __('Are you sure you want to delete # %s?', $classification['Classification']['id'])); ?>
		</td>
        
	</tr>
<?php endforeach; ?>
	</table>
</div>
	
<?php	endif;  ?>

</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Classifications'), array('action' => 'index')); ?></li>
	</ul>
</div>
