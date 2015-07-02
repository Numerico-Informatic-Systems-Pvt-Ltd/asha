<div class="lacases form">
<?php echo $this->Form->create('Lacase'); ?>
	<fieldset>
		<legend><?php echo __('Edit LA Case'); ?></legend>
	<?php
		echo $this->Form->input('id',array('type'=>'hidden'));
		echo $this->Form->input('office_id',array('type'=>'hidden'));
		echo $this->Form->input('user_id',array('type'=>'hidden',
									'value'=>$this->Session->read('UserAuth.User.id')));
		echo $this->Form->input('la_case_number');
		echo $this->Form->input('requisitioning_body');

		echo $this->Form->input('project');
		echo $this->Form->input('year_of_lacase',array('label'=>'Year of LA Case'));
		echo $this->Form->input('possession_date',array('dateFormat' => 'DMY',
												  'minYear' => date("Y")-100,
												  'maxYear' => date("Y")));
		echo $this->Form->input('publication_date',array('label'=>'Tentative Date of Material or Date of Gazette Publication','dateFormat' => 'DMY',
												  'minYear' => date("Y")-100,
												  'maxYear' => date("Y")));
		echo $this->Form->input('period_of_interest_from',array('label'=>'Date of 80% Payment','dateFormat' => 'DMY',
												  'minYear' => date("Y")-100,
												  'maxYear' => date("Y")));
		echo $this->Form->input('period_of_interest_to',array('label'=>'Tentative Date of Award','dateFormat' => 'DMY',
												  'minYear' => date("Y")-100,
												  'maxYear' => date("Y")));
		echo $this->Form->input('act');
		echo $this->Form->input('mouza');
		echo $this->Form->input('police_station');
		echo $this->Form->input('jl_number');
		echo $this->Form->input('district');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>       
		<li><?php echo $this->Html->link(__('List La Cases'), array('action' => 'index')); ?></li>
    
    	<li><?php echo $this->Html->link(__('Add Land Classfication'), array(
											'controller'=>'classifications',
											'action' => 'add')); ?>
        </li>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Lacase.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Lacase.id'))); ?></li>
		
	</ul>
</div>