<div class="groups add_admin">
<?php echo $this->Form->create('Grupo');?>
	<fieldset>
 		<legend><?php __('Novo Grupo'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>


<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Ver grupos', true), array('action' => 'index_admin'));?></li>
	</ul>
</div>