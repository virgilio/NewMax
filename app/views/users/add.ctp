<!-- VIEW UTILIZADA POR ADMINS E GERENTES-->


<div class="users add">
<?php echo $this->Form->create('User');?>
	<fieldset>
 		<legend><?php __('Criar usuário'); ?></legend>
	<?php
		echo $this->Form->input('username', array('label' => 'Login'));
		echo $this->Form->input('password', array('label' => 'Senha'));
		echo $this->Form->input('group_id', array('label' => 'Tipo'));
		echo $this->Form->input('email', array('label' => 'E-mail'));
		echo $this->Form->input('first_name', array('label' => 'Nome'));
		echo $this->Form->input('last_name', array('label' => 'Sobrenome'));
		echo $this->Form->input('phone', array('label' => 'Telefone'));
                echo $this->Form->input('active', array('label' => 'Ativo',  'type' => 'hidden', 'value'=>'false'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>

<?php
/*
<div class="actions">
	<h3><?php __('Ações'); ?></h3>

	<ul>
            <?php
                $user = $session->read('Auth.User');
                if($user['group_id'] == '1'){
            ?>
                    <li><?php echo $this->Html->link(__('Listar Usuários', true), array('action' => 'index_admin'));?></li>

            <?php
                }else{
            ?>
                    <li><?php echo $this->Html->link(__('Listar Usuários', true), array('action' => 'index_manager'));?></li>
            <?php
                }
            ?>
	</ul>
</div>
 */
?>
 */