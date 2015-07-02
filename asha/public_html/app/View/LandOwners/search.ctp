<div class="lacasesindex">
<?php if(!isset($lacase)): ?>
<?php
$opt=array(''=>'select');
foreach($lac as $key=>$value)
{
	$opt[$key]=$value;
}
?>
<table>
	<!--<tr><td>Search By LA Case no.</td></tr>-->
    <?php echo $this->Form->create('Lacase'); ?>
    <tr><!--<td><?php echo $this->Form->input('search',array('label'=>false)); ?></td>-->
    <td><?php echo $this->Form->input('search',array('label'=>'Select LA Case No','options'=>$opt));?></td>
    	<td><?php echo $this->Form->submit('search'); ?></td>
    </tr>
     <?php echo $this->Form->end(); ?>
</table>
<?php else: ?>
	<h2><?php echo __('Land Owners'); ?></h2>
    <table>
    	<tr><th></th><th></th><th></th><th></th><th></th></tr>
        <?php $i=1; 
			foreach($lacase['Land'] as $land): ?>
        	<tr>
            	<td><?php echo $i; ?></td>
            	<td>
                	<?php $owner=$this->requestAction('LandOwners/getbylandid/'.$land['id']); 
					//debug($owner);?>
                    <?php
                    if($owner!=null)
					{
					?>
                	<p><?php echo $owner['Owner']['name']; ?></p>
                    <p><?php echo $owner['Owner']['relation'].' '.$owner['Owner']['parent']; ?></p>
                    <p><?php echo $owner['Owner']['address']; ?></p>
                    <p><?php echo 'Mz. '.$owner['Land']['mouja']; ?></p>
                    <p><?php echo 'JL no. '.$owner['Land']['jl_no']; ?></p>
                    <p><?php echo 'PL. '.$owner['Land']['rsplot_no']; ?></p>
                    <p><?php echo 'Sh. '.$owner['LandOwner']['shared_area'].' Acres'; ?></p>
                    <?php $landvalue=$this->requestAction('LandValues/getbylandid/'.$land['id']); 
					//debug($landvalue);?>
                    <p><?php echo 'L-Rate. '.$landvalue['LandValue']['land']; ?></p>
                    <p><?php echo 'L-Value. '.$landvalue['LandValue']['land']; ?></p>
                    <p><?php echo 'S-Value. '.$landvalue['LandValue']['structure']; ?></p>
                    <p><?php echo 'T-Value. '.$landvalue['LandValue']['tree']; ?></p>
                <?php } ?>    
                </td>
                
                <td>
                
                	<?php $estvalue=$this->requestAction('Estimates/getbylandid/'.$land['id']); 
					//debug($landvalue);?>
                    <p><?php echo $estvalue['Estimate']['value']; ?></p>
                </td>
                <td>
                	<p><?php if($owner['Owner']['varified']==1)
							echo 'V';
						else
							echo 'NV';
					 ?></p>
                </td>
                <td>
                	
                </td>
            </tr>
        <?php $i++;
		endforeach; ?>
    </table>
 <?php endif; ?>
	<!--<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('office_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('la_case_number'); ?></th>
			<th><?php echo $this->Paginator->sort('project'); ?></th>
			<th><?php echo $this->Paginator->sort('year_of_lacase'); ?></th>
			<th><?php echo $this->Paginator->sort('possession_date'); ?></th>
			<th><?php echo $this->Paginator->sort('publication_date'); ?></th>
			<th><?php echo $this->Paginator->sort('period_of_interest_from'); ?></th>
			<th><?php echo $this->Paginator->sort('period_of_interest_to'); ?></th>
			<th><?php echo $this->Paginator->sort('period_of_requisition_from'); ?></th>
			<th><?php echo $this->Paginator->sort('period_of_requisition_to'); ?></th>
			<th><?php echo $this->Paginator->sort('act'); ?></th>
			<th><?php echo $this->Paginator->sort('mouza'); ?></th>
			<th><?php echo $this->Paginator->sort('police_station'); ?></th>
			<th><?php echo $this->Paginator->sort('jl_number'); ?></th>
			<th><?php echo $this->Paginator->sort('district'); ?></th>
			<th><?php echo $this->Paginator->sort('charset'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('active'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($lacases as $lacase): ?>
	<tr>
		<td><?php echo h($lacase['Lacase']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($lacase['Office']['name'], array('controller' => 'offices', 'action' => 'view', $lacase['Office']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($lacase['User']['id'], array('controller' => 'users', 'action' => 'view', $lacase['User']['id'])); ?>
		</td>
		<td><?php echo h($lacase['Lacase']['la_case_number']); ?>&nbsp;</td>
		<td><?php echo h($lacase['Lacase']['project']); ?>&nbsp;</td>
		<td><?php echo h($lacase['Lacase']['year_of_lacase']); ?>&nbsp;</td>
		<td><?php echo h($lacase['Lacase']['possession_date']); ?>&nbsp;</td>
		<td><?php echo h($lacase['Lacase']['publication_date']); ?>&nbsp;</td>
		<td><?php echo h($lacase['Lacase']['period_of_interest_from']); ?>&nbsp;</td>
		<td><?php echo h($lacase['Lacase']['period_of_interest_to']); ?>&nbsp;</td>
		<td><?php echo h($lacase['Lacase']['period_of_requisition_from']); ?>&nbsp;</td>
		<td><?php echo h($lacase['Lacase']['period_of_requisition_to']); ?>&nbsp;</td>
		<td><?php echo h($lacase['Lacase']['act']); ?>&nbsp;</td>
		<td><?php echo h($lacase['Lacase']['mouza']); ?>&nbsp;</td>
		<td><?php echo h($lacase['Lacase']['police_station']); ?>&nbsp;</td>
		<td><?php echo h($lacase['Lacase']['jl_number']); ?>&nbsp;</td>
		<td><?php echo h($lacase['Lacase']['district']); ?>&nbsp;</td>
		<td><?php echo h($lacase['Lacase']['charset']); ?>&nbsp;</td>
		<td><?php echo h($lacase['Lacase']['created']); ?>&nbsp;</td>
		<td><?php echo h($lacase['Lacase']['modified']); ?>&nbsp;</td>
		<td><?php echo h($lacase['Lacase']['active']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $lacase['Lacase']['id'])); ?>
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
	</div>-->
</div>
<!--<div class="actions">
-->	<!--<h3><?php echo __('Actions'); ?></h3>-->
	<ul>
    	<?php if(isset($lacase)): ?>
        	<li><?php echo $this->Html->link(__('Generate PDF'), array('action' => 'application',$lacase['Lacase']['id'])); ?></li>
        <?php endif; ?>
		<!--<li><?php echo $this->Html->link(__('New Lacase'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Offices'), array('controller' => 'offices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Office'), array('controller' => 'offices', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lands'), array('controller' => 'lands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Land'), array('controller' => 'lands', 'action' => 'add')); ?> </li>-->
	</ul>
<!--</div>-->
