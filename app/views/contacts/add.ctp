<div class="contacts form">
<?php echo $this->Form->create('Contact');?>
	<fieldset>
 		<legend><?php __('Novo Contato'); ?></legend>
	<?php
		echo $this->Form->input('client_id', array('label'=>'Cliente'));
		echo $this->Form->input('funcao', array('label'=>'Fun&ccedil;&atilde;o'));
		echo $this->Form->input('name', array('label'=>'Nome'));
		echo $this->Form->input('phone', array('label'=>'Telefone'));
		echo $this->Form->input('email', array('label'=>'E-mail'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>