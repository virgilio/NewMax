<div class="users index_manager">
    <h2><?php __('Usuários');?></h2>
    <table cellpadding="0" cellspacing="0" class="table_general_layout ">
        <thead>
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
        </thead>
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

                    <?php
                        if($user['User']['active'] == 0)
                            echo $this->Html->link(__('Desativar', true), array('action' => 'disable', $user['User']['id']), null, sprintf(__('Tem certeza que deseja desativar o usuário \'%s\'?', true), $user['User']['username']));
                        else if ($user['User']['active'] == 1)
                            echo $this->Html->link(__('Ativar', true), array('action' => 'enable', $user['User']['id']), null, sprintf(__('Tem certeza que deseja ativar o usuário \'%s\'?', true), $user['User']['username']));
                        else{
                            echo $this->Html->link(__('Permitir', true), array('action' => 'agree', $user['User']['id']), null, sprintf(__('Tem certeza que deseja aceitar o usuário \'%s\'?', true), $user['User']['username']));
                            echo $this->Html->link(__('Recusar', true), array('action' => 'refuse', $user['User']['id']), null, sprintf(__('Tem certeza que deseja recusar o usuário \'%s\'?', true), $user['User']['username']));
                        }
                    ?>

            </td>
        </tr>
        <?php endforeach; ?>
        <tfoot>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        </tfoot>
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
