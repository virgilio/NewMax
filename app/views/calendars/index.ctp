<div class="calendars index">
	<h2><?php __('Calendars');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('client_id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('inicio');?></th>
			<th><?php echo $this->Paginator->sort('peridiocidade');?></th>
			<th><?php echo $this->Paginator->sort('periodo');?></th>
			<th><?php echo $this->Paginator->sort('ativo');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($calendars as $calendar):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $calendar['Calendar']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($calendar['Client']['name'], array('controller' => 'clients', 'action' => 'view', $calendar['Client']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($calendar['User']['id'], array('controller' => 'users', 'action' => 'view', $calendar['User']['id'])); ?>
		</td>
		<td><?php echo $calendar['Calendar']['inicio']; ?>&nbsp;</td>
		<td><?php echo $calendar['Calendar']['peridiocidade']; ?>&nbsp;</td>
		<td><?php echo $calendar['Calendar']['periodo']; ?>&nbsp;</td>
		<td><?php echo $calendar['Calendar']['ativo']; ?>&nbsp;</td>
		<td><?php echo $calendar['Calendar']['created']; ?>&nbsp;</td>
		<td><?php echo $calendar['Calendar']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $calendar['Calendar']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $calendar['Calendar']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $calendar['Calendar']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $calendar['Calendar']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Calendar', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Clients', true), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client', true), array('controller' => 'clients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>