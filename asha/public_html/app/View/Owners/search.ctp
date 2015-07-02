<?php if(!isset($owners)): ?>
	<table>
	<!--<tr><td>Search By LA Case no.</td></tr>-->
    <?php echo $this->Form->create('Lacase'); ?>
    <tr><!--<td><?php echo $this->Form->input('search',array('label'=>false)); ?></td>-->
    <td><?php echo $this->Form->input('search',array('label'=>'Select LA Case No','options'=>$lac));?></td>
    	<td><?php echo $this->Form->submit('search'); ?></td>
    </tr>
     <?php echo $this->Form->end(); ?> 
</table>
<?php else: ?>
<div class="ownersindex">
<script type="text/javascript">
function openpopup(owner_id,lacase_id)
{
	//alert(owner_id);
	var popup2 = new Popup();
	popup2.autoHide = false;
	popup2.content = '<div style="margin:10px 0 0px 15px;"><?php echo $this->Form->create('Kyc',array('action'=>'add','onsubmit'=>"return checkac();"));echo '<fieldset><legend>';echo __('Add KYC Details');echo '</legend>';echo $this->Form->input('owner_id',array('type'=>'hidden','readonly'=>true));echo $this->Form->input('bank_account_number',array('label'=>'A/c number'));echo $this->Form->input('confirm_bank_account_number',array('label'=>'Confirm A/c number','required'=>'required'));echo $this->Form->input('lacase_id',array('type'=>'hidden','readonly'=>true));echo $this->Form->input('bank_name');echo $this->Form->input('bank_branch');echo $this->Form->input('ifsc_code');echo $this->Form->input('pan_number');echo $this->Form->input('voter_card_number');echo $this->Form->input('other');echo $this->Form->input('active',array('type'=>'hidden','value'=>'1'));echo $this->Form->submit('Submit');echo '</fieldset>';echo $this->Form->end(); ?></div><a href="#" onclick="'+popup2.ref+'.hide();return false;">&nbsp;&nbsp;&nbsp;Close</a>';
	popup2.width=600;
	popup2.height=570;
	popup2.style = {'border':'1px solid #ccc','backgroundColor':'#fff','position':'fixed','margin':'0px'};
	popup2.show();
	document.getElementById('KycOwnerId').value=owner_id;
	document.getElementById('KycLacaseId').value=lacase_id;
	return false;
}
function checkac()
{
	var ac1=document.getElementById('KycBankAccountNumber').value;
	var ac2=document.getElementById('KycConfirmBankAccountNumber').value;
	if(ac1==ac2)
		return true;
	else
		return false;
}
</script>

	<h2><?php echo __('Owners'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo 'Full Name'; ?></th>
            <th><?php echo 'Relation'; ?></th>
			<th><?php echo 'Guardian\'s Name'; ?></th>
            <th><?php echo 'Plot no.'; ?></th>
			<th><?php echo 'Address'; ?></th>
			<th><?php echo $this->Paginator->sort('police_station'); ?></th>
			<th><?php echo 'Verified'; ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	//debug($owners);
	foreach ($owners as $owner): ?>
	<tr>
		<td><?php echo h($owner['Owner']['name']); ?>&nbsp;</td>
		<td><?php echo h($owner['Owner']['relation']); ?>&nbsp;</td>
        <td><?php echo h($owner['Owner']['parent']); ?>&nbsp;</td>
        <td><?php 

				if($owner['Land'] != null)
				{
					$lands=array();
					foreach($owner['Land'] as $land)
					{
						$lands[]=$land['rsplot_no'];
					}
					echo implode(",",$lands);
				}
				else
				{
					echo 'Nil';
				}

		//echo h($owner['Land']['rsplot_no']); ?>&nbsp;</td>
		<td><?php echo $owner['Owner']['address']; ?> </td>
		<td><?php echo $owner['Owner']['police_station']; ?>&nbsp;</td>
		<td><?php if($owner['Owner']['varified'])
						echo $this->Html->image('test-pass-icon.png'); 
					else
						echo $this->Html->image('test-fail-icon.png');?>&nbsp;</td>
       
		<td class="actions">
              <?php if(!$owner['Owner']['varified']): ?>
        		<?php echo $this->Html->link(__('Verify'), array('controller'=>'kycs','action' => 'add', $owner['Owner']['id'], $owner['Owner']['lacase_id']),array('onclick'=>"return openpopup(".$owner['Owner']['id'].",".$owner['Owner']['lacase_id'].");")); ?>
                        
              <?php else: ?>
              
			  <?php echo $this->Html->link(__('Edit'), array('controller'=>'kycs','action' => 'edit', $owner['Kyc']['0']['id'])); ?>  
				&nbsp; | &nbsp;              
              <?php echo $this->Form->postLink(__('Delete'), array('controller'=>'kycs','action' => 'delete', $owner['Kyc']['0']['id']), null, __('Are you sure you want to delete # %s?', $owner['Kyc']['0']['id'])); ?>
  
                    
              <?php endif; ?>
			<!--<?php echo $this->Html->link(__('View'), array('action' => 'view', $owner['Owner']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $owner['Owner']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), 
							array('action' => 'delete', $owner['Owner']['id']), 
							null,
							 __('Are you sure you want to delete # %s?', 
							 $owner['Owner']['id'])); ?>-->
		</td>
	</tr>
<?php endforeach; ?>
	</table>
    
	<p>
    <?php

		if(isset($lacase_id)) {
			
			$this->Paginator->options(array('url'=> array('controller' => 'Owners', 
									'action' => 'search',
									 $lacase_id)
							));
		}
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
<?php endif; ?>
<!--<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Owner'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lands'), array('controller' => 'lands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Land'), array('controller' => 'lands', 'action' => 'add')); ?> </li>
	</ul>
</div>-->
