<div class="landsindex">
	<h2><?php echo __('Lands: Find by LA Case'); ?></h2>
    <?php

		if(isset($lacase_id)) {
		$this->Paginator->options(array('url'=> array('controller' => 'lands', 
									'action' => 'search_by_lacase',
									 $lacase_id)
								));
		}
	?>
    <p>
		<?php
			echo '<div style="width:350px";>';
			echo '<table>';
			echo '<tr><td><b>Select LA Case</b></td><td>&nbsp;</td></tr>';
			echo '<tr>';
			echo $this->Form->create('Land',array('action'=>'search_by_lacase'));
			
			echo '<td width="70%">';
				echo $this->Form->input('lacase_id',array('label'=>false));
			echo '</td><td width="25%">';
				echo $this->Form->end('Search');
			echo '</td>';	
			echo '</tr></table>';
			echo '</div>';
        
        ?>
    </p>
    <?php
	if(isset($lands['0']['Lacase']['la_case_number'])):
	?>
    <p>LA-Case Number: <?php echo $lands['0']['Lacase']['la_case_number']; ?></p>
    <?php endif; ?>
	<table cellpadding="0" cellspacing="0">
	<tr>
            <th>Plot</th>
            <th>Class</th>
            <th>Mouja</th>
            <th>Khatian</th>
            <th>Ac. Area</th>
            <th>T.VAL</th>
            <th>S.VAL</th>
            <th>P.VAL</th>
            <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    
	<?php foreach ($lands as $land): ?>
    <tr>
    	
        <td><?php echo h($land['Land']['rsplot_no']); ?></td>
       	<td><?php echo h($land['Classification']['name']); ?></td>
        <td><?php echo h($land['Land']['khatian_no']); ?></td>
        <td><?php echo h($land['Land']['mouja']); ?></td>
        <td><?php echo h($land['Land']['acquisitioned_areas_value']); ?></td>
        <td><?php echo h($land['Land']['tree_area']); ?></td>
        <td><?php echo h($land['Land']['structure_area']); ?></td>
        <td><?php echo h($land['Land']['pan_baroz_area']); ?></td>
          <td class="actions">
			<!--<?php echo $this->Html->link(__('View'), array('action' => 'view', $land['Land']['id'])); ?>-->
			<?php echo $this->Html->link(__('Edit'), array('action' => 'editplot', $land['Land']['id'])); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $land['Land']['id']), null, __('Are you sure you want to delete # %s This will also delete related Calculations?', $land['Land']['id'])); ?>
		
        	<?php echo $this->Html->link(__('Delete Plot Calculations'), array('plugin' => false, 'controller'=>'estimates' ,'action' => 'deletebyland', $land['Land']['id']), null, __('Are you sure you want to delete estimate for Plot No.# %s?', $land['Land']['rsplot_no'])); ?>
		
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
<br /><br /><br /><br />