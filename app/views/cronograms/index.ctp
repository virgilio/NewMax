<div class="cronograms index">
	<h2><?php __('Cronograms');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('client_id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('start');?></th>
			<th><?php echo $this->Paginator->sort('frequency');?></th>
			<th><?php echo $this->Paginator->sort('period');?></th>
			<th><?php echo $this->Paginator->sort('active');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($cronograms as $cronogram):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $cronogram['Cronogram']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cronogram['Client']['name'], array('controller' => 'clients', 'action' => 'view', $cronogram['Client']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($cronogram['User']['id'], array('controller' => 'users', 'action' => 'view', $cronogram['User']['id'])); ?>
		</td>
		<td><?php echo $cronogram['Cronogram']['start']; ?>&nbsp;</td>
		<td><?php echo $cronogram['Cronogram']['frequency']; ?>&nbsp;</td>
		<td><?php echo $cronogram['Cronogram']['period']; ?>&nbsp;</td>
		<td><?php echo $cronogram['Cronogram']['active']; ?>&nbsp;</td>
		<td><?php echo $cronogram['Cronogram']['created']; ?>&nbsp;</td>
		<td><?php echo $cronogram['Cronogram']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $cronogram['Cronogram']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $cronogram['Cronogram']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $cronogram['Cronogram']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $cronogram['Cronogram']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Cronogram', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Clients', true), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client', true), array('controller' => 'clients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Visits', true), array('controller' => 'visits', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Visit', true), array('controller' => 'visits', 'action' => 'add')); ?> </li>
	</ul>
</div>