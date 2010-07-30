<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/
$controllerNames = array(
        'Visits' => 'Visitas',
        'Users' => 'Usuários',
        'Clients' => 'Clientes',
        'Groups'  => 'Tipos',
        'Contacts' => 'Contatos',
        'Pages' => 'New Max',
        'CakeError' => 'Erro',
);

$actionNames = array(
        'calendar' => 'Calendário',
        'view' => 'Visualizar',
        'profile' => 'Perfil',
        'add' => 'Novo',
        'index' => 'Lista',
        'index_admin' => 'Lista',
        'login' => 'Login',
        'home' => 'Início',
        'contato' => 'Formulário de Contato',
        'ajuda' => 'Ajuda',
        'edit' => 'Editar',
);
if($session->read('Auth.User') != null) {
    ?>
<div id="content_header">
    <ul id="breadcrumb">
        <li>
                <?php //echo $this->Html->link(__($html->image("bc/home.gif"), true), array('controller' => 'visits', 'action' => 'calendar'), array('escape' => false));
                echo $this->Html->link(__("Home", true), array('controller' => 'visits', 'action' => 'calendar'), array('escape' => false));
                ?>
        </li>
        <li>
                <?php echo $this->Html->link(__(!empty($controllerNames[$this->name]) ? $controllerNames[$this->name] : $this->name, true), array('controller' => $this->name, 'action' => 'index')); ?>
        </li>
        <li>
                <?php echo $this->Html->link(__(!empty($actionNames[$this->action]) ? $actionNames[$this->action] : $this->action, true), array('controller' => $this->name, 'action' => $this->action)); ?>
        </li>
        <li>
            <br />
        </li>
        <li>
                <?php

                ?>
        </li>
        <li><?php echo date('d/m/Y', strtotime('today')); ?></li>
    </ul>
</div>

    <?php
}
////echo "<pre>" . print_r($this, true) . "</pre>"
?>