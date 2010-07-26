<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
 		<legend><?php __('Cadastro'); ?></legend>
	<?php
		echo $this->Form->input('username', array('label'=>'Usu&aacute;rio'));
		echo $this->Form->input('password', array('label'=>'Senha'));
//		echo $this->Form->input('group_id');
		echo $this->Form->input('email', array('label'=>'E-mail'));
		echo $this->Form->input('first_name', array('label'=>'Nome'));
		echo $this->Form->input('last_name', array('label'=>'Sobrenome'));
		echo $this->Form->input('phone', array('label'=>'Telefone'));
//                echo $this->Form->input('active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>

<?php
/*
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group', true), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients', true), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client', true), array('controller' => 'clients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cronograms', true), array('controller' => 'cronograms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cronogram', true), array('controller' => 'cronograms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Visits', true), array('controller' => 'visits', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Visit', true), array('controller' => 'visits', 'action' => 'add')); ?> </li>
	</ul>
</div>
*/
?>