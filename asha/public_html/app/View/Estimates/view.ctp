<div class="estimates view">
<h2><?php  echo __('Estimate'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($estimate['Estimate']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($estimate['User']['id'], array('controller' => 'users', 'action' => 'view', $estimate['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Land'); ?></dt>
		<dd>
			<?php echo $this->Html->link($estimate['Land']['id'], array('controller' => 'lands', 'action' => 'view', $estimate['Land']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Shared Area'); ?></dt>
		<dd>
			<?php echo h($estimate['Estimate']['shared_area']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($estimate['Estimate']['value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Charset'); ?></dt>
		<dd>
			<?php echo h($estimate['Estimate']['charset']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($estimate['Estimate']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($estimate['Estimate']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($estimate['Estimate']['active']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Estimate'), array('action' => 'edit', $estimate['Estimate']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Estimate'), array('action' => 'delete', $estimate['Estimate']['id']), null, __('Are you sure you want to delete # %s?', $estimate['Estimate']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Estimates'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estimate'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lands'), array('controller' => 'lands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Land'), array('controller' => 'lands', 'action' => 'add')); ?> </li>
	</ul>
</div>
