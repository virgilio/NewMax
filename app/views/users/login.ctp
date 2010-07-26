<?php
$session->flash('auth');
echo $form->create('User', array('action' => 'login'));
echo $form->inputs(array(
'legend' => __('Login', true),
'username' => array('label' => 'Login'),
'password' => array('label' => 'Senha')
));
echo $form->end('Login');
?>