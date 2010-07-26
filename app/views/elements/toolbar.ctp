<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

/*
 * => Usuários: users/index
 *  	add, desativar, demitir
 * => Perfil: users/view?id=user_id
 * 		editar
 * => Clientes:
 * 		add, desativar
 * => NO-MENU :: Contatos:
 * 	add contato, excluir contatos
 * => Cronogramas
 * 		add, desativar
 * => Visitas
 * 		add, delete
 *
*/

if($session->read('Auth.User') != null) {
    $userInfo = $session->read('Auth.User');
    //echo "<pre>" . print_r($userInfo) . "</pre>";
    ?>

    <?php
    if($userInfo['group_id'] <= 2 && $this->name == 'Visits') { // admin
        ?>
<div id="toolbar">
    <ul class="container_12">
        <li><?php echo $this->Html->link(__('Nova Visita', true), array('controller' => 'visits', 'action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('Excluir Visitas', true), array('controller' => 'visits', 'action' => 'delete')); ?></li>
    </ul>
</div>

        <?php
    }
    else if($userInfo['group_id'] <= 1 && $this->name == 'Cronograms') { // admin
        ?>
<div id="toolbar">
    <ul class="container_12">
        <li><?php echo $this->Html->link(__('Novo', true), array('controller' => 'cronograms', 'action' => 'add')); ?></li>
                <?php
                /*<li><?php echo $this->Html->link(__('Desativar', true), array('controller' => 'cronograms', 'action' => 'disable'),null, 'Tem certeza que deseja desativar todos os cronogramas selecionados?'); ?></li>*/
                ?>
    </ul>
</div>
        <?php
    }
    else if($userInfo['group_id'] <= 1 && $this->name == 'Users' && $this->action != 'view') { // admin
        //if admin
        ?>
<div id="toolbar">
    <ul class="container_12">
        <li><?php echo $this->Html->link(__('Novo', true), array('controller' => 'users', 'action' => 'add')); ?></li>
    </ul>
</div>
        <?php
    }
    else if($userInfo['group_id'] <= 1 && $this->name == 'Clients') { // admin
        ?>
<div id="toolbar">
    <ul class="container_12">
        <li><?php echo $this->Html->link(__('Novo', true), array('controller' => 'clients', 'action' => 'add')); ?></li>
        <?php /*<li><?php echo $this->Html->link(__('Desativar', true), array('controller' => 'clients', 'action' => 'edit/' . $client['Client']['id'])); ?></li> */?>
                <?php
                if($this->action == 'view') {
                    ?>
        <li><?php echo $this->Html->link(__('Contatos', true), array('controller' => 'contacts', 'action' => 'index/' . $client['Client']['id'])); ?></li>

                    <?php
                }
                ?>
    </ul>
</div>
        <?php
    }
    else if($this->name == 'Users' && $this->action == 'view') { // admin
        ?>
<div id="toolbar">
    <ul class="container_12">
        <li><?php echo $this->Html->link(__('Editar', true), array('controller' => 'users', 'action' => 'edit/' . $user['User']['id'])); ?></li>
        <li><?php echo $this->Html->link(__('Desativar', true), array('controller' => 'users', 'action' => 'disable/' . $user['User']['id'])); ?></li>
    </ul>
</div>
        <?php
    }

    else if($this->name == 'Contacts') { // admin
        ?>
<div id="toolbar">
    <ul class="container_12">
        <li><?php echo $this->Html->link(__('Novo Contato', true), array('controller' => 'contacts', 'action' => 'add')); ?></li>
    </ul>
</div>
        <?php
    }
}
?>

