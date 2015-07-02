<div class="lacases form">
<?php echo $this->Form->create('Lacase'); ?>
	<fieldset>
		<legend><?php echo __('Form For Entering New Land Acquisition Cases'); ?></legend>
	<?php
		echo $this->Form->input('office_id',array('type'=>'hidden','value'=>'0'));
		echo $this->Form->input('user_id',array('type'=>'hidden','value'=>1));
		
			
		echo $this->Form->input('la_case_number');
		echo $this->Form->input('requisitioning_body');
		echo $this->Form->input('project');
		echo $this->Form->input('year_of_lacase',array('label'=>'Year of LA Case',
														));
		echo $this->Form->input('possession_date',array('type'=>'date',
														'dateFormat' => 'DMY',
														'minYear' => date("Y")-100,
														'maxYear' => date("Y")+5
														));
		echo $this->Form->input('period_of_interest_from',array('label'=>'Date of 80 % payment',
														'type'=>'date',
														'dateFormat' => 'DMY',
														'minYear' => date("Y")-100,
														'maxYear' => date("Y")+5));
				echo $this->Form->input('publication_date',array(
									'label'=>'Tentative Date of Material or Date of Gazette Publication</span>',
														'type'=>'date',
														'dateFormat' => 'DMY',
														'minYear' => date("Y")-100,
														'maxYear' => date("Y")+5));
														
		echo $this->Form->input('period_of_interest_to',array('label'=>'Tentative Date of award',
														'type'=>'date',
														'dateFormat' => 'DMY',
														'minYear' => date("Y")-100,
														'maxYear' => date("Y")+5));
		echo $this->Form->input('act',array('value'=>'ACT - II'));
		echo $this->Form->input('mouza');
		echo $this->Form->input('police_station');
		echo $this->Form->input('jl_number');
		echo $this->Form->input('district',array('value'=>'East Medinipur'));
		echo $this->Form->input('charset',array('type'=>'hidden'));
		echo $this->Form->input('active',array('type'=>'hidden','value'=>'1'));
			?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List LA Cases'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Add Land Classfication'), array(
											'controller'=>'classifications',
											'action' => 'add')); ?>
        </li>

	</ul>
</div>