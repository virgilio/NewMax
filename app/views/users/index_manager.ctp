<div class="users index_manager">
	<h2><?php __('Usuários');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			
			<th><?php echo $this->Paginator->sort('username');?></th>
			<th><?php echo $this->Paginator->sort('group_id');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th><?php echo $this->Paginator->sort('first_name');?></th>
			<th><?php echo $this->Paginator->sort('last_name');?></th>
			<th><?php echo $this->Paginator->sort('phone');?></th>
                        <th><?php echo $this->Paginator->sort('active');?></th>


                        <?php
                        /*echo $this->Paginator->sort('id');
                        echo $this->Paginator->sort('password');
                        echo $this->Paginator->sort('created');
			echo $this->Paginator->sort('modified');*/
                        ?>

			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($users as $user):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>

		<td><?php echo $user['User']['username']; ?>&nbsp;</td>
		
		<td><?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?></td>
		<td><?php echo $user['User']['email']; ?>&nbsp;</td>
		<td><?php echo $user['User']['first_name']; ?>&nbsp;</td>
		<td><?php echo $user['User']['last_name']; ?>&nbsp;</td>
		<td><?php echo $user['User']['phone']; ?>&nbsp;</td>
                <td><?php echo $user['User']['active']; ?>&nbsp;</td>


		<?php
                /*echo $user['User']['id'];
                echo $user['User']['password'];
                echo $user['User']['created'];
		echo $user['User']['modified'];*/
                ?>


		<td class="actions">
			<?php echo $this->Html->link(__('Detalhes', true), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $user['User']['id'])); ?>

			<?php echo $this->Html->link(__('Desativar', true), array('action' => 'delete', $user['User']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id'])); ?>
                        <?php echo $this->Html->link(__('Demitir', true), array('action' => 'delete', $user['User']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id'])); ?>

		</td>
	</tr>
<?php endforeach; ?>
	</table>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('anterior', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('próximo', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<?php
/*
<div class="actions">
	<h3><?php __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Criar usuário', true), array('action' => 'add')); ?></li>
	</ul>
</div>
*/
?>
