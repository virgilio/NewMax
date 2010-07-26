<div class="contacts index">
	<h2><?php __('Contatos');?></h2>
	<table cellpadding="0" cellspacing="0" class="table_general_layout ">
            <thead>
	<tr>
			<?php
                        /*<th><?php echo $this->Paginator->sort('id');?></th>*/
                        ?>
			<th><?php echo $this->Paginator->sort('Cliente','client_id');?></th>
			<th><?php echo $this->Paginator->sort('Função','funcao');?></th>
			<th><?php echo $this->Paginator->sort('Nome','name');?></th>
			<th><?php echo $this->Paginator->sort('Telefone','phone');?></th>
			<th><?php echo $this->Paginator->sort('E-mail','email');?></th>
			<?
                        /*<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>*/
                        ?>
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
		<?php 
                /*<td><?php echo $contact['Contact']['id']; ?>&nbsp;</td>*/
                ?>
		<td>
			<?php echo $this->Html->link($contact['Client']['name'], array('controller' => 'clients', 'action' => 'view', $contact['Client']['id'])); ?>
		</td>
		<td><?php echo $contact['Contact']['funcao']; ?>&nbsp;</td>
		<td><?php echo $contact['Contact']['name']; ?>&nbsp;</td>
		<td><?php echo $contact['Contact']['phone']; ?>&nbsp;</td>
		<td><?php echo $contact['Contact']['email']; ?>&nbsp;</td>
		<?php
                /*<td><?php echo $contact['Contact']['created']; ?>&nbsp;</td>
		<td><?php echo $contact['Contact']['modified']; ?>&nbsp;</td>*/
                ?>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $contact['Contact']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $contact['Contact']['id'])); ?>
			<?php echo $this->Html->link(__('Excluir', true), array('action' => 'delete', $contact['Contact']['id']), null, sprintf(__('Tem certeza que deseja excluir o contato # %s?', true), $contact['Contact']['name'])); ?>
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
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
