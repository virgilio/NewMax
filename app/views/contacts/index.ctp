<div class="contacts index">
    <h2><?php __('Contatos');?></h2>
    <table cellpadding="0" cellspacing="0" class="table_general_layout ">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('Cliente','client_id');?></th>
                <th><?php echo $this->Paginator->sort('Vendedor','user_id');?></th>
                <th><?php echo $this->Paginator->sort('Frequência','frequency');?></th>
                <th><?php echo $this->Paginator->sort('Função','funcao');?></th>
                <th><?php echo $this->Paginator->sort('Nome','name');?></th>
                <th><?php echo $this->Paginator->sort('Telefone','phone');?></th>
                <th><?php echo $this->Paginator->sort('E-mail','email');?></th>
                <th class="actions"><?php __('A&ccedil;&otilde;es');?></th>
            </tr>
        </thead>
        <?php
        $i = 0;
        foreach ($contacts as $contact):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
        <tr<?php echo $class;?>>
            <td>
                    <?php echo $this->Html->link($contact['Client']['name'], array('controller' => 'clients', 'action' => 'view', $contact['Client']['id'])); ?>
            </td>
            <td>
                    <?php echo $this->Html->link($contact['User']['first_name'].' '.$contact['User']['last_name'], array('controller' => 'users', 'action' => 'view', $contact['User']['id'])); ?>
            </td>
            <td><?php echo $contact['Contact']['frequency']; ?> dias</td>
            <td><?php echo $contact['Contact']['funcao']; ?>&nbsp;</td>
            <td><?php echo $contact['Contact']['name']; ?>&nbsp;</td>
            <td><?php echo $contact['Contact']['phone']; ?>&nbsp;</td>
            <td><?php echo $contact['Contact']['email']; ?>&nbsp;</td>
            <td class="actions">
                    <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $contact['Contact']['id'])); ?>
                    <?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $contact['Contact']['id'])); ?>
                    <?php echo $this->Html->link(__('Deletar', true), array('action' => 'delete', $contact['Contact']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $contact['Contact']['id'])); ?>
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
    <p>
        <?php
        echo $this->Paginator->counter(array(
        'format' => __('P&aacute;gina %page% de %pages%, exibindo %current% registros de %count%', true)
        ));
        ?>	</p>

    <div class="paging">
        <?php echo $this->Paginator->prev('<< ' . __('anterior', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
        |
        <?php echo $this->Paginator->next(__('próximo', true) . ' >>', array(), null, array('class' => 'disabled'));?>
    </div>
</div>
<?php /*<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Contact', true), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Clients', true), array('controller' => 'clients', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Client', true), array('controller' => 'clients', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Visits', true), array('controller' => 'visits', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Visit', true), array('controller' => 'visits', 'action' => 'add')); ?> </li>
    </ul>
</div> */?>