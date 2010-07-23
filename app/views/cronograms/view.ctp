<div class="cronograms view">
<h2><?php  __('Cronogram');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cronogram['Cronogram']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Client'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($cronogram['Client']['name'], array('controller' => 'clients', 'action' => 'view', $cronogram['Client']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($cronogram['User']['id'], array('controller' => 'users', 'action' => 'view', $cronogram['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Start'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cronogram['Cronogram']['start']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Frequency'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cronogram['Cronogram']['frequency']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Period'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cronogram['Cronogram']['period']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Active'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cronogram['Cronogram']['active']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cronogram['Cronogram']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cronogram['Cronogram']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cronogram', true), array('action' => 'edit', $cronogram['Cronogram']['id'])); ?> </li>
		<!--<li>
                    <?php /*echo $this->Html->link(__('Delete Cronogram', true), array('action' => 'delete', $cronogram['Cronogram']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $cronogram['Cronogram']['id'])); */?>
                </li>-->
		<li><?php echo $this->Html->link(__('List Cronograms', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cronogram', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients', true), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client', true), array('controller' => 'clients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Visits', true), array('controller' => 'visits', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Visit', true), array('controller' => 'visits', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Visits');?></h3>
	<?php if (!empty($cronogram['Visit'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Cronogram Id'); ?></th>
		<th><?php __('Client Id'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Date'); ?></th>
		<th><?php __('Done'); ?></th>
		<th><?php __('Report'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($cronogram['Visit'] as $visit):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $visit['id'];?></td>
			<td><?php echo $visit['cronogram_id'];?></td>
			<td><?php echo $visit['client_id'];?></td>
			<td><?php echo $visit['user_id'];?></td>
			<td><?php echo $visit['date'];?></td>
			<td><?php echo $visit['done'];?></td>
			<td><?php echo $visit['report'];?></td>
			<td><?php echo $visit['created'];?></td>
			<td><?php echo $visit['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'visits', 'action' => 'view', $visit['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'visits', 'action' => 'edit', $visit['id'])); ?>
				<?php/* echo $this->Html->link(__('Delete', true), array('controller' => 'visits', 'action' => 'delete', $visit['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $visit['id']));*/ ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Visit', true), array('controller' => 'visits', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
