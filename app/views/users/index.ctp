<div class="users index">
    <h2><?php __('Usu&aacute;rios');?></h2>
    <table cellpadding="0" cellspacing="0" class="table_general_layout ">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('Usuário','username');?></th>
                <th><?php echo $this->Paginator->sort('Nome','first_name');?></th>
                <th><?php echo $this->Paginator->sort('Sobrenome','last_name');?></th>
                <th><?php echo $this->Paginator->sort('Função','group_id');?></th>
                <th><?php echo $this->Paginator->sort('E-mail','email');?></th>
                <th><?php echo $this->Paginator->sort('Telefone','phone');?></th>
                <th class="actions"><?php __('Ações');?></th>
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
            <td>
                    <?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
            </td>
            <td><?php echo $user['User']['email']; ?>&nbsp;</td>
            <td><?php echo $user['User']['first_name']; ?>&nbsp;</td>
            <td><?php echo $user['User']['last_name']; ?>&nbsp;</td>
            <td><?php echo $user['User']['phone']; ?>&nbsp;</td>
            <td class="actions">
                    <?php echo $this->Html->link(__('View', true), array('action' => 'view', $user['User']['id'])); ?>
                    <?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $user['User']['id'])); ?>
                    <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $user['User']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id'])); ?>
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
            </tr>
        </tfoot>
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
        <li><?php echo $this->Html->link(__('New User', true), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Group', true), array('controller' => 'groups', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Clients', true), array('controller' => 'clients', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Client', true), array('controller' => 'clients', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Cronograms', true), array('controller' => 'cronograms', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Cronogram', true), array('controller' => 'cronograms', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Visits', true), array('controller' => 'visits', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Visit', true), array('controller' => 'visits', 'action' => 'add')); ?> </li>
    </ul>
</div>