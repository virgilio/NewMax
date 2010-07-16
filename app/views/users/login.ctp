<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/
$session->flash('auth');
echo $form->create('User', array('action' => 'login'));

echo $form->inputs(array(
    'legend' => __('Login', true),
    'username',
    'password'
));

echo $form->end('Login');

?>
