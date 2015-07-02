<div class="plotEstimates view">
<h2><?php  echo __('Plot Estimate'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($plotEstimate['PlotEstimate']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($plotEstimate['User']['id'], array('controller' => 'users', 'action' => 'view', $plotEstimate['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Land'); ?></dt>
		<dd>
			<?php echo $this->Html->link($plotEstimate['Land']['id'], array('controller' => 'lands', 'action' => 'view', $plotEstimate['Land']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Calculation Type'); ?></dt>
		<dd>
			<?php echo h($plotEstimate['PlotEstimate']['calculation_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Shared Area'); ?></dt>
		<dd>
			<?php echo h($plotEstimate['PlotEstimate']['shared_area']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Old Rate'); ?></dt>
		<dd>
			<?php echo h($plotEstimate['PlotEstimate']['old_rate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Old Value'); ?></dt>
		<dd>
			<?php echo h($plotEstimate['PlotEstimate']['old_value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Eighty Paid'); ?></dt>
		<dd>
			<?php echo h($plotEstimate['PlotEstimate']['eighty_paid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tree Value'); ?></dt>
		<dd>
			<?php echo h($plotEstimate['PlotEstimate']['tree_value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Old Eighty'); ?></dt>
		<dd>
			<?php echo h($plotEstimate['PlotEstimate']['old_eighty']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Oldtree Eighty'); ?></dt>
		<dd>
			<?php echo h($plotEstimate['PlotEstimate']['oldtree_eighty']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Interest1'); ?></dt>
		<dd>
			<?php echo h($plotEstimate['PlotEstimate']['interest1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Interest2'); ?></dt>
		<dd>
			<?php echo h($plotEstimate['PlotEstimate']['interest2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Newrate'); ?></dt>
		<dd>
			<?php echo h($plotEstimate['PlotEstimate']['newrate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Newvalue'); ?></dt>
		<dd>
			<?php echo h($plotEstimate['PlotEstimate']['newvalue']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Newvalue Trees'); ?></dt>
		<dd>
			<?php echo h($plotEstimate['PlotEstimate']['newvalue_trees']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Newvalue Tree Eighty'); ?></dt>
		<dd>
			<?php echo h($plotEstimate['PlotEstimate']['newvalue_tree_eighty']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Interest3'); ?></dt>
		<dd>
			<?php echo h($plotEstimate['PlotEstimate']['interest3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($plotEstimate['PlotEstimate']['value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Solatium'); ?></dt>
		<dd>
			<?php echo h($plotEstimate['PlotEstimate']['solatium']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Charset'); ?></dt>
		<dd>
			<?php echo h($plotEstimate['PlotEstimate']['charset']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($plotEstimate['PlotEstimate']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($plotEstimate['PlotEstimate']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($plotEstimate['PlotEstimate']['active']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Plot Estimate'), array('action' => 'edit', $plotEstimate['PlotEstimate']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Plot Estimate'), array('action' => 'delete', $plotEstimate['PlotEstimate']['id']), null, __('Are you sure you want to delete # %s?', $plotEstimate['PlotEstimate']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Plot Estimates'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Plot Estimate'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lands'), array('controller' => 'lands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Land'), array('controller' => 'lands', 'action' => 'add')); ?> </li>
	</ul>
</div>
