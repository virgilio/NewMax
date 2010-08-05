<div class="visits form">
<?php echo $this->Form->create('Visit');?>
	<fieldset>
 		<legend><?php __('Enviar Relatório'); ?></legend>
	<?php
		//echo $this->Form->input('id');
		//echo $this->Form->input('contact_id');
		//echo $this->Form->input('date');
                echo "<h3>Visita com " . $this->data['Contact']['name'] . " para " . date("d/m/Y", strtotime($this->data['Visit']['date'])) . "</h3>";
                echo $this->Form->input('real_date', array('label' => 'Realizada em: '));
		echo $this->Form->input('status', array('options' => array('0' => 'em aberto', '2' => 'realizada')));
		echo $this->Form->input('report', array('label' => 'Relatório '));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>

<?php
/*
 <div class="actions">

	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Visit.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Visit.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Visits', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contact', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
 *
 **/ ?>