<div class="cronograms index_">
    <h2><?php __('Cronograms');?></h2>
    
    <table cellpadding="0" cellspacing="0" class="table_general_layout" >
        <thead
            <tr>
                <th><?php echo $this->Paginator->sort('Cliente','client_id');?></th>
                <th><?php echo $this->Paginator->sort('Nome', 'full_name');?></th>
                <th><?php echo $this->Paginator->sort('Início','start');?></th>
                <th><?php echo $this->Paginator->sort('Periodicidade','frequency');?></th>
                <th><?php echo $this->Paginator->sort('Período','period');?></th>
                <th><?php echo $this->Paginator->sort('Ativo','active');?></th>


                <th class="actions"><?php __('A&ccedil;&otilde;es');?></th>
            </tr>
        </thead>

        <?php
        $i = 0;
        foreach ($cronograms as $cronogram):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
        <tr<?php echo $class;?>>


            <td>
                    <?php echo $this->Html->link($cronogram['Client']['name'], array('controller' =>'clients', 'action' => 'view', $cronogram['Client']['id'])); ?>
            </td>
            <td>
                    <?php echo $this->Html->link($cronogram['User']['first_name'].' '.$cronogram['User']['last_name'], array('controller'=> 'users', 'action' => 'view', $cronogram['User']['id'])); ?>
            </td>
            <td><?php echo $cronogram['Cronogram']['start']; ?>&nbsp;</td>
            <td><?php echo $cronogram['Cronogram']['frequency']; ?>&nbsp;</td>
            <td><?php echo $cronogram['Cronogram']['period']; ?>&nbsp;</td>
            <td><?php echo $cronogram['Cronogram']['active']; ?>&nbsp;</td>
            <td class="actions">
                    <?php echo $this->Html->link(__('Ver', true),array('action' => 'view', $cronogram['Cronogram']['id'])); ?>
                    <?php echo $this->Html->link(__('Editar', true),array('action' => 'edit', $cronogram['Cronogram']['id'])); ?>
                    <?php
                        if($cronogram['Cronogram']['active'] == 1)
                            echo $this->Html->link(__('Desabilitar', true), array('action' => 'disable', $cronogram['Cronogram']['id']), null, sprintf(__('Tem certeza que deseja desativar este cronograma?', true)));
                    ?>

                    
            </td>
        </tr>
        <?php endforeach;?>

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
    
    <?php echo $form->end();?>

    <div class="paging">
        <?php echo $this->Paginator->prev('<< ' . __('previous',true), array(), null, array('class'=>'disabled'));?>
        |
        <?php echo $this->Paginator->numbers();?>
        |
        <?php echo $this->Paginator->next(__('next', true) . ' >>',array(), null, array('class' => 'disabled'));?>
    </div>
</div>