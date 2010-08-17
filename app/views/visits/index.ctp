<div class="visits index">
    <h2><?php __('Visitas');?></h2>
    <table cellpadding="0" cellspacing="0" class="table_general_layout" >
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('Vendedor','user_name');?></th>
                <th><?php echo $this->Paginator->sort('Contato','contact_id');?></th>
                <th><?php echo $this->Paginator->sort('Data','date');?></th>
                <th><?php echo $this->Paginator->sort('Data realizada','real_date');?></th>
                <th><?php echo $this->Paginator->sort('status');?></th>
                <th class="actions"><?php __('Ação');?></th>
            </tr>
        </thead>
        <?php
        $i = 0;
        foreach ($visits as $visit):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
        <tr<?php echo $class;?>
            <td><?php echo $user['User']['first_name']; ?>&nbsp;</td>
            <td>
                    <?php echo $this->Html->link($visit['Contact']['name'], array('controller' => 'users', 'action' => 'view', $visit['Contact']['id'])); ?>
            </td>
            <td><?php echo $visit['Visit']['date']; ?>&nbsp;</td>
            <td><?php echo $visit['Visit']['real_date']; ?>&nbsp;</td>
            <td><?php echo $visit['Visit']['status']; ?>&nbsp;</td>
            <td class="actions">
                    <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $visit['Visit']['id'])); ?>
                    <?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $visit['Visit']['id'])); ?>
                    <?php echo $this->Html->link(__('Deletar', true), array('action' => 'delete', $visit['Visit']['id']), null, sprintf(__('Você tem certeza que deseja deletar # %s?', true), $visit['Visit']['id'])); ?>
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

<?php /*
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Visit', true), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Contact', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
    </ul>
</div>

 */ ?>