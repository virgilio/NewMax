<div class="clients index_">
    <h2><?php __('Clients');?></h2>
    <table cellpadding="0" cellspacing="0" class="table_general_layout ">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id');?></th>
                <th><?php echo $this->Paginator->sort('name');?></th>
                <th><?php echo $this->Paginator->sort('user_id');?></th>
                <?php
                /*<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>*/
                ?>
                <th class="actions"><?php __('Actions');?></th>
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

            <td><?php echo $client['Client']['id']; ?>&nbsp;</td>

            <td><?php
                echo $this->Html->link($client['Client']['name'] , array('controller' => 'clients', 'action' => 'view', $client['Client']['id'])); ?>&nbsp;
            </td>
            

            <td>
                    <?php echo $this->Html->link($client['User']['id'], array('controller' => 'users', 'action' => 'view', $client['User']['id'])); ?>
            </td>
                <?php
                /*<td><?php echo $client['Client']['created']; ?>&nbsp;</td>
		<td><?php echo $client['Client']['modified']; ?>&nbsp;</td>*/
                ?>
            <td class="actions">
                    <?php echo $this->Html->link(__('View', true), array('action' => 'view', $client['Client']['id'])); ?>
                    <?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $client['Client']['id'])); ?>
                    <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $client['Client']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $client['Client']['id'])); ?>
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
<?php
/*<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Client', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contacts', true), array('controller' => 'contacts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contact', true), array('controller' => 'contacts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cronograms', true), array('controller' => 'cronograms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cronogram', true), array('controller' => 'cronograms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Visits', true), array('controller' => 'visits', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Visit', true), array('controller' => 'visits', 'action' => 'add')); ?> </li>
	</ul>
</div>*/
?>