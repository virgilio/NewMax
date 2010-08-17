<div class="contacts form">
<?php echo $this->Form->create('Contact');?>
	<fieldset>
 		<legend><?php __('Cadastro de Contato'); ?></legend>
	<?php
		echo $this->Form->input('client_id', array('label' => 'Cliente'));
		echo $this->Form->input('user_id', array('label' => 'Vendedor'));
		echo $this->Form->input('frequency', array('label' => 'Frequencia'));
		echo $this->Form->input('funcao', array('label' => 'Função'));
		echo $this->Form->input('name', array('label' => 'Nome'));
		echo $this->Form->input('phone', array('label' => 'Telefone'));
		echo $this->Form->input('email', array('label' => 'E-mail'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>
<?php /*
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Contacts', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Clients', true), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client', true), array('controller' => 'clients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Visits', true), array('controller' => 'visits', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Visit', true), array('controller' => 'visits', 'action' => 'add')); ?> </li>
	</ul>
</div> */
?>