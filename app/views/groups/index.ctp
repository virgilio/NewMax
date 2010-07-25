<div class="groups index_admin">
	<h2><?php __('Grupos');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Ações');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($groups as $group):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $group['Group']['id']; ?>&nbsp;</td>
		<td><?php echo $group['Group']['name']; ?>&nbsp;</td>
		<td><?php echo $group['Group']['description']; ?>&nbsp;</td>
		<td><?php echo $group['Group']['created']; ?>&nbsp;</td>
		<td><?php echo $group['Group']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver', true), array('action' => 'view_admin', $group['Group']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit_admin', $group['Group']['id'])); ?>
			<?php echo $this->Html->link(__('Excluir', true), array('action' => 'delete_admin', $group['Group']['id']), null, sprintf(__('Tem certeza que quer excluir o grupo \'%s\'?', true), $group['Group']['name'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Página %page% de %pages%, mostrando %current% dados de %count% totais, começando em %start%, terminado em %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('anterior', true), array(), null, array('class'=>'disabled'));?>
                |
                <?php echo $this->Paginator->numbers();?>
                |
		<?php echo $this->Paginator->next(__('próxima', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>

<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Novo Grupo', true), array('action' => 'add_admin')); ?></li>
	</ul>
</div>