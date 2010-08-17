<div class="visits form">
<?php echo $this->Form->create('Visita');?>
	<fieldset>
 		<legend><?php __('Editar Visitar'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('contact_id');
		echo $this->Form->input('date');
                echo $this->Form->input('real_date');
		echo $this->Form->input('status');
		echo $this->Form->input('report');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>

<?php /*
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Visit.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Visit.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Visits', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contact', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div> */ ?>