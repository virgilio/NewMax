<div class="contacts index">
    <h2><?php __('Contatos');?></h2>
    <table cellpadding="0" cellspacing="0" class="table_general_layout ">
        <thead>
            <tr>
                <?php
                /*
                 * <th><?php echo $this->Paginator->sort('id');?></th>
                 * <th><?php echo $this->Paginator->sort('user_id');?></th>
                 * <th><?php echo $this->Paginator->sort('created');?></th>
                 * <th><?php echo $this->Paginator->sort('modified');?></th>
                 */
                ?>

                <th><?php echo $this->Paginator->sort('Nome','name');?></th>
                <th><?php echo $this->Paginator->sort('Função','funcao');?></th>
                <th><?php echo $this->Paginator->sort('Cliente','client_id');?></th>
                <th><?php echo $this->Paginator->sort('Telefone','phone');?></th>
                <th><?php echo $this->Paginator->sort('E-mail','email');?></th>
                <th><?php echo $this->Paginator->sort('Frequência','frequency');?></th>
                <th class="actions"><?php __('Ações');?></th>
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
            <?php
            /*
             * <td><?php echo $contact['Contact']['id']; ?>&nbsp;</td>
             * <td><?php echo $this->Html->link($contact['User']['id'], array('controller' => 'users', 'action' => 'view', $contact['User']['id'])); ?></td>
             * <td><?php echo $contact['Contact']['created']; ?>&nbsp;</td>
             * <td><?php echo $contact['Contact']['modified']; ?>&nbsp;</td>
            */
            ?>
            <td><?php echo $contact['Contact']['name']; ?>&nbsp;</td>
            <td><?php echo $contact['Contact']['funcao']; ?>&nbsp;</td>
            <td>
                    <?php echo $this->Html->link($contact['Client']['name'], array('controller' => 'clients', 'action' => 'view', $contact['Client']['id'])); ?>
            </td>
            <td><?php echo $contact['Contact']['phone']; ?>&nbsp;</td>
            <td><?php echo $contact['Contact']['email']; ?>&nbsp;</td>
            
            <td><?php echo $contact['Contact']['frequency']; ?>&nbsp;</td>
            
            
            
            
            <td class="actions">
                    <?php echo $this->Html->link(__('Detalhes', true), array('action' => 'view', $contact['Contact']['id'])); ?>
                   <?php
                    /* <?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $contact['Contact']['id'])); ?>
                    <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $contact['Contact']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $contact['Contact']['id'])); ?>*/
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