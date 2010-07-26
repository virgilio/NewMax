<div class="clients index_">
    <h4><?php __('Clientes');?></h4>
    <table cellpadding="0" cellspacing="0" class="table_general_layout ">
        <thead>
            <tr>
                <?php /*<th><?php echo $this->Paginator->sort('id');?></th> */ ?>
                <th><?php echo $this->Paginator->sort('Cliente', 'name');?></th>
                <th><?php echo $this->Paginator->sort('Usuário', 'User.first_name');?></th>
                <?php
                /*<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>*/
                ?>
                <th class="actions"><?php __('Ações');?></th>

            </tr>
        </thead>
        <?php
        $i = 0;
        foreach ($clients as $client):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
        <tr<?php echo $class;?>>

            <?php /*<td><?php echo $client['Client']['id']; ?>&nbsp;</td>*/?>

            <td><?php
                    echo $this->Html->link($client['Client']['name'] , array('controller' => 'clients', 'action' => 'view', $client['Client']['id'])); ?>&nbsp;
            </td>


            <td>
                    <?php echo $this->Html->link($client['User']['full_name'], array('controller' => 'users', 'action' => 'view', $client['User']['id'])); ?>
            </td>
                <?php
                /*<td><?php echo $client['Client']['created']; ?>&nbsp;</td>
		<td><?php echo $client['Client']['modified']; ?>&nbsp;</td>*/
                ?>
            <td class="actions">
                    <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $client['Client']['id'])); ?>
                    <?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $client['Client']['id'])); ?>
                    <?php echo $this->Html->link(__('Excluir', true), array('action' => 'delete', $client['Client']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $client['Client']['id']));?>
            </td>
        </tr>
        <?php endforeach; ?>
        <tfoot>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        </tfoot>
    </table>
    <?php
    /*<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>*/
    ?>

    <div class="paging">
        <?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
        |
        <?php echo $this->Paginator->numbers();?>
        |
        <?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
    </div>
</div>