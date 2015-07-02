<div class="chainDeeds view">
<h2><?php  echo __('Chain Deed'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($chainDeed['ChainDeed']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($chainDeed['User']['id'], array('controller' => 'users', 'action' => 'view', $chainDeed['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Previous Owner Name'); ?></dt>
		<dd>
			<?php echo h($chainDeed['ChainDeed']['previous_owner_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Previous Relation'); ?></dt>
		<dd>
			<?php echo h($chainDeed['ChainDeed']['previous_relation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Previous Parents'); ?></dt>
		<dd>
			<?php echo h($chainDeed['ChainDeed']['previous_parents']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Present Owner Name'); ?></dt>
		<dd>
			<?php echo h($chainDeed['ChainDeed']['present_owner_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Present Relation'); ?></dt>
		<dd>
			<?php echo h($chainDeed['ChainDeed']['present_relation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Present Parent'); ?></dt>
		<dd>
			<?php echo h($chainDeed['ChainDeed']['present_parent']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Charset'); ?></dt>
		<dd>
			<?php echo h($chainDeed['ChainDeed']['charset']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($chainDeed['ChainDeed']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($chainDeed['ChainDeed']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($chainDeed['ChainDeed']['active']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Chain Deed'), array('action' => 'edit', $chainDeed['ChainDeed']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Chain Deed'), array('action' => 'delete', $chainDeed['ChainDeed']['id']), null, __('Are you sure you want to delete # %s?', $chainDeed['ChainDeed']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Chain Deeds'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chain Deed'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
