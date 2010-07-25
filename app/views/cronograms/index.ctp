<div class="cronograms index_">
   <h2><?php __('Cronograms');?></h2>
   <table cellpadding="0" cellspacing="0">
       <tr>
           <th><?php echo $this->Paginator->sort('client_id');?></th>
           <th><?php echo $this->Paginator->sort('username','User.username');?></th>
           <th><?php echo $this->Paginator->sort('start');?></th>
           <th><?php echo $this->Paginator->sort('frequency');?></th>
           <th><?php echo $this->Paginator->sort('period');?></th>
           <th><?php echo $this->Paginator->sort('active');?></th>


           <th class="actions"><?php __('Actions');?></th>
       </tr>
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
                   <?php echo $this->Html->link($cronogram['User']['username'], array('controller'=> 'users', 'action' => 'view', $cronogram['User']['id'])); ?>
           </td>
           <td><?php echo $cronogram['Cronogram']['start']; ?>&nbsp;</td>
           <td><?php echo $cronogram['Cronogram']['frequency']; ?>&nbsp;</td>
           <td><?php echo $cronogram['Cronogram']['period']; ?>&nbsp;</td>
           <td><?php echo $cronogram['Cronogram']['active']; ?>&nbsp;</td>
           <td class="actions">
                   <?php echo $this->Html->link(__('View', true),array('action' => 'view', $cronogram['Cronogram']['id'])); ?>
                   <?php echo $this->Html->link(__('Edit', true),array('action' => 'edit', $cronogram['Cronogram']['id'])); ?>
           </td>
       </tr>
       <?php endforeach; ?>
   </table>

   <div class="paging">
       <?php echo $this->Paginator->prev('<< ' . __('previous',true), array(), null, array('class'=>'disabled'));?>
       |
       <?php echo $this->Paginator->numbers();?>
       |
       <?php echo $this->Paginator->next(__('next', true) . ' >>',array(), null, array('class' => 'disabled'));?>
   </div>
</div>