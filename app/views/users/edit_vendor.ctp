<!-- VIEW UTILIZADA POR VENDEDORES-->

<div class="users form">
<<<<<<< Updated upstream
<?php echo $this->Form->create('User');?>
	<fieldset>
 		<legend><?php __('Editar Usuário'); ?></legend>
	<?php
//		echo $this->Form->input('id');
		echo $this->Form->input('username');
//		echo $this->Form->input('password');
//		echo $this->Form->input('group_id');
		echo $this->Form->input('email');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('phone');
//                echo $this->Form->input('active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
=======
    <?php echo $this->Form->create('User');?>
    <fieldset>
        <legend><?php __('Editar Usuário ' . $this->Form->value('User.first_name') . ' ' . $this->Form->value('User.last_name')); ?></legend>
        <?php
        //echo $this->Form->input('username', array('label' => 'Login'));
        echo $this->Form->input('password', array('label' => 'Senha'));
        //echo $this->Form->input('group_id', array('label' => 'Tipo'));
        echo $this->Form->input('email', array('label' => 'E-mail'));
        echo $this->Form->input('first_name', array('label' => 'Nome'));
        echo $this->Form->input('last_name', array('label' => 'Sobrenome'));
        echo $this->Form->input('phone', array('label' => 'Telefone'));
        //echo $this->Form->input('active', array('label' => 'Ativo',  'type' => 'hidden', 'value'=>'false'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Salvar', true));?>
>>>>>>> Stashed changes
</div>
<?php
/*
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('User.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('User.id'))); ?></li>
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