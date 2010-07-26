<div class="visits index_">
    <h2><?php __('Visitas');?></h2>
    <table cellpadding="0" cellspacing="0" class="table_general_layout ">
        <thead>
            <tr>

                <th><?php echo $this->Paginator->sort('Cronograma','cronogram_id');?></th>
                <th><?php echo $this->Paginator->sort('Cliente','client_id');?></th>
                <th><?php echo $this->Paginator->sort('Vendedor','user_id');?></th>
                <th><?php echo $this->Paginator->sort('Data','date');?></th>
                <th><?php echo $this->Paginator->sort('Feita','done');?></th>
                <?php
                /*<th><?php echo $this->Paginator->sort('id');?></th>
                        <th><?php echo $this->Paginator->sort('report');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>*/
                ?>

                <th class="actions"><?php __('A&ccedil&otilde;es');?></th>
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
                    <?php 
                        if($visit['Cronogram']['id'] != null)
                            echo $this->Html->link($visit['Cronogram']['id'], array('controller' => 'cronograms', 'action' => 'view', $visit['Cronogram']['id']));
                        else
                            echo 'Avulsa';
                    ?>

            </td>
            <td>
                    <?php echo $this->Html->link($visit['Client']['name'], array('controller' => 'clients', 'action' => 'view', $visit['Client']['id'])); ?>
            </td>
            <td>
                    <?php echo $this->Html->link($visit['User']['id'], array('controller' => 'users', 'action' => 'view', $visit['User']['id'])); ?>
            </td>
            <td><?php echo $visit['Visit']['date']; ?>&nbsp;</td>
            <td><?php echo $visit['Visit']['done']; ?>&nbsp;</td>

                <?php
                /*<td><?php echo $visit['Visit']['id']; ?>&nbsp;</td>
                <td><?php echo $visit['Visit']['report']; ?>&nbsp;</td>
		<td><?php echo $visit['Visit']['created']; ?>&nbsp;</td>
		<td><?php echo $visit['Visit']['modified']; ?>&nbsp;</td>*/
                ?>
            <td class="actions">
                    <?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $visit['Visit']['id'])); ?>
                    <?php
                    //Data de hoje
                    $today = mktime (0, 0, 0, date("m")  , date("d"), date("Y"));
                    //Data da visita
                    $visitDay = strtotime($visit['Visit']['date']);

                    //Se ainda nao passou a data da visita e eh um calendario avulso
                    if($visit['Cronogram']['id'] == null && $today < $visitDay) {

                        //mostra edit e delete paa a visita
                        ?>
                        <?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $visit['Visit']['id'])); ?>
                        <?php echo $this->Html->link(__('Excluir', true), array('action' => 'delete', $visit['Visit']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $visit['Visit']['id'])); ?>
                        <?php
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
        <?php echo $this->Paginator->numbers();?>

        <?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
    </div>
</div>

<?php
/*<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Visit', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Cronograms', true), array('controller' => 'cronograms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cronogram', true), array('controller' => 'cronograms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients', true), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client', true), array('controller' => 'clients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>*/
?>