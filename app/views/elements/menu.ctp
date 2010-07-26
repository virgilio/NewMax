<?php 
//   <img class="grid_2" src="img/logomenor.png" />
?>
<div class="container_12">
    <div id="logoimage">
        <?php
        echo $this->Html->image('logomenor.png', array('class' => 'grid_2'));
        ?>
    </div>
    <?php
    if($session->read('Auth.User') == null) {
        ?>
    <div id="menu">
        <ul class="kwicks kwicksAnon grid_6">
            <li id="kwick7"><?php echo $this->Html->link(__('Home', true), array('controller' => 'pages', 'action' => 'home')); ?></li>
            <li id="kwick8"><?php echo $this->Html->link(__('Contato', true), array('controller' => 'pages', 'action' => 'contato')); ?></li>
            <li id="kwick9"><?php echo $this->Html->link(__('Ajuda', true), array('controller' => 'pages', 'action' => 'ajuda')); ?></li>
        </ul>
    </div>

    <div id="boxlogin" class="grid_1">
        <a id="login" >Login</a>
        <div id="form_login">
                <?php
                $session->flash('auth');
                echo $form->create('User', array('action' => 'login'));
                echo $form->inputs(array(
                'legend' => __('', true),
                'username',
                'password'
                ));
                echo $form->end('Login');
                ?>
        </div>
    </div>
        <?php
        echo "</div>";
    }
    else {
        ?>
    <div id="menu">
            <?php
            $user = $session->read('Auth.User');
            if($user['group_id'] == 1 ) { //admin
                //Calendário, Visitas, Cronogramas, Usuários, Clientes, Perfil, Logout
                ?>

        <ul class="kwicksManager kwicks grid_6">
            <li id="kwick1"><?php echo $this->Html->link(__('Calend&aacute;rio', true), array('controller' => 'visits', 'action' => 'calendar')); ?></li>
            <li id="kwick2"><?php echo $this->Html->link(__('Visitas', true), array('controller' => 'visits', 'action' => 'index')); ?></li>
            <li id="kwick3"><?php echo $this->Html->link(__('Cronogramas', true), array('controller' => 'cronograms', 'action' => 'index')); ?></li>
            <li id="kwick4"><?php echo $this->Html->link(__('Usu&aacute;rios', true), array('controller' => 'users', 'action' => 'index_admin')); ?></li>
            <li id="kwick5"><?php echo $this->Html->link(__('Clientes', true), array('controller' => 'clients', 'action' => 'index')); ?></li>
            <li id="kwick6"><?php echo $this->Html->link(__('Perfil', true), array('controller' => 'users', 'action' => 'profile/' . $user['id'])); ?></li>
        </ul>
                <?php
            }else if($user['group_id'] == 2) {//manager
                ?>

        <ul class="kwicksManager kwicks grid_6">
            <li id="kwick1"><?php echo $this->Html->link(__('Calend&aacute;rio', true), array('controller' => 'visits', 'action' => 'calendar')); ?></li>
            <li id="kwick2"><?php echo $this->Html->link(__('Visitas', true), array('controller' => 'visits', 'action' => 'index')); ?></li>
            <li id="kwick3"><?php echo $this->Html->link(__('Cronogramas', true), array('controller' => 'cronograms', 'action' => 'index')); ?></li>
            <li id="kwick4"><?php echo $this->Html->link(__('Usu&aacute;rios', true), array('controller' => 'users', 'action' => 'index_manager')); ?></li>
            <li id="kwick5"><?php echo $this->Html->link(__('Clientes', true), array('controller' => 'clients', 'action' => 'index')); ?></li>
            <li id="kwick6"><?php echo $this->Html->link(__('Perfil', true), array('controller' => 'users', 'action' => 'profile/' . $user['id'])); ?></li>
        </ul>
                <?php
            }else { //vendedor
                ?>
        <ul class="kwicksVendor kwicks grid_6">
            <li id="kwick1"><?php echo $this->Html->link(__('Calend&aacute;rio', true), array('controller' => 'visits', 'action' => 'calendar_vendor')); ?></li>
            <li id="kwick2"><?php echo $this->Html->link(__('Visitas', true), array('controller' => 'visits', 'action' => 'index_vendor')); ?></li>
            <li id="kwick3"><?php echo $this->Html->link(__('Cronogramas', true), array('controller' => 'cronograms', 'action' => 'index_vendor')); ?></li>
            <li id="kwick5"><?php echo $this->Html->link(__('Clientes', true), array('controller' => 'clients', 'action' => 'index_vendor')); ?></li>
            <li id="kwick6"><?php echo $this->Html->link(__('Perfil', true), array('controller' => 'users', 'action' => 'profile/' . $user['id'])); ?></li>
        </ul>
                <?php
            }
            ?>
    </div>
    <div id="logout" style="display: block">
        <span class="grid_2">
                <?php echo $this->Html->link(__('Sair', true), array('controller' => 'users', 'action' => 'logout'));?>
        </span>
    </div>
</div>
    <?php
}
?>

