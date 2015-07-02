<div class="landOwners view">
<h2><?php  echo __('Land Owner'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($landOwner['LandOwner']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($landOwner['User']['id'], array('controller' => 'users', 'action' => 'view', $landOwner['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Owner'); ?></dt>
		<dd>
			<?php echo $this->Html->link($landOwner['Owner']['name'], array('controller' => 'owners', 'action' => 'view', $landOwner['Owner']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Land'); ?></dt>
		<dd>
			<?php echo $this->Html->link($landOwner['Land']['id'], array('controller' => 'lands', 'action' => 'view', $landOwner['Land']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Shared Area'); ?></dt>
		<dd>
			<?php echo h($landOwner['LandOwner']['shared_area']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Portion'); ?></dt>
		<dd>
			<?php echo h($landOwner['LandOwner']['portion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Police Station'); ?></dt>
		<dd>
			<?php echo h($landOwner['LandOwner']['police_station']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Charset'); ?></dt>
		<dd>
			<?php echo h($landOwner['LandOwner']['charset']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($landOwner['LandOwner']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($landOwner['LandOwner']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($landOwner['LandOwner']['active']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Land Owner'), array('action' => 'edit', $landOwner['LandOwner']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Land Owner'), array('action' => 'delete', $landOwner['LandOwner']['id']), null, __('Are you sure you want to delete # %s?', $landOwner['LandOwner']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Land Owners'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Land Owner'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Owners'), array('controller' => 'owners', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Owner'), array('controller' => 'owners', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lands'), array('controller' => 'lands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Land'), array('controller' => 'lands', 'action' => 'add')); ?> </li>
	</ul>
</div>
