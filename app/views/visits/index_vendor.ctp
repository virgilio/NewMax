<div class="visits index">
    <h2><?php __('Visits');?></h2>
    <table cellpadding="0" cellspacing="0" class="table_general_layout" >
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('Contato', 'Contact.name');?></th>
                <th><?php echo $this->Paginator->sort('Data', 'date');?></th>
                <th><?php echo $this->Paginator->sort('status');?></th>
                <th class="actions"><?php __('Ações');?></th>
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
        <tr<?php echo $class;?>>
            <td>
                    <?php echo $this->Html->link($visit['Contact']['name'], array('controller' => 'contacts', 'action' => 'view', $visit['Contact']['id'])); ?>
            </td>
            <td><?php echo $visit['Visit']['date']; ?>&nbsp;</td>
            <td><?php echo $visit['Visit']['date'] >= date('Y-m-d') ? "Em dia" : "Em atraso"; ?>&nbsp;</td>
            <td class="actions">
                    <?php echo $this->Html->link(__('Detalhes', true), array('action' => 'view', $visit['Visit']['id'])); ?>
                 | 
                    <?php echo $this->Html->link(__('Dar baixa', true), array('action' => 'edit_vendor', $visit['Visit']['id'])); ?>
            </td>
        </tr>
        <?php endforeach; ?>
        <tfoot>
            <tr>
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

<?php /*
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Visit', true), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Contact', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
    </ul>
</div>
 * */ ?>
 