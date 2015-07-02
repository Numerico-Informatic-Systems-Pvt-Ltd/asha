<div class="acquisitionedAreas view">
<h2><?php  echo __('Acquisitioned Area'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($acquisitionedArea['AcquisitionedArea']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($acquisitionedArea['User']['id'], array('controller' => 'users', 'action' => 'view', $acquisitionedArea['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Land'); ?></dt>
		<dd>
			<?php echo $this->Html->link($acquisitionedArea['Land']['id'], array('controller' => 'lands', 'action' => 'view', $acquisitionedArea['Land']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ana'); ?></dt>
		<dd>
			<?php echo h($acquisitionedArea['AcquisitionedArea']['ana']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Kra'); ?></dt>
		<dd>
			<?php echo h($acquisitionedArea['AcquisitionedArea']['kra']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ganda'); ?></dt>
		<dd>
			<?php echo h($acquisitionedArea['AcquisitionedArea']['ganda']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Krati'); ?></dt>
		<dd>
			<?php echo h($acquisitionedArea['AcquisitionedArea']['krati']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Til'); ?></dt>
		<dd>
			<?php echo h($acquisitionedArea['AcquisitionedArea']['til']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total'); ?></dt>
		<dd>
			<?php echo h($acquisitionedArea['AcquisitionedArea']['total']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Charset'); ?></dt>
		<dd>
			<?php echo h($acquisitionedArea['AcquisitionedArea']['charset']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($acquisitionedArea['AcquisitionedArea']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($acquisitionedArea['AcquisitionedArea']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($acquisitionedArea['AcquisitionedArea']['active']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Acquisitioned Area'), array('action' => 'edit', $acquisitionedArea['AcquisitionedArea']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Acquisitioned Area'), array('action' => 'delete', $acquisitionedArea['AcquisitionedArea']['id']), null, __('Are you sure you want to delete # %s?', $acquisitionedArea['AcquisitionedArea']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Acquisitioned Areas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Acquisitioned Area'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lands'), array('controller' => 'lands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Land'), array('controller' => 'lands', 'action' => 'add')); ?> </li>
	</ul>
</div>
