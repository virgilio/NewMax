<?php 
//   <img class="grid_2" src="img/logomenor.png" />
?>
<div class="container_12">

   <?php echo $this->Html->image('logomenor.png', array('class' => 'grid_2')) ?>
   <ul class="kwicks grid_6">  
   <li id="kwick1"><?php echo $this->Html->link(__('Visitas', true), array('controller' => 'visits', 'action' => 'index')); ?></li>  
   <li id="kwick2"><?php echo $this->Html->link(__('Visitas', true), array('controller' => 'clients', 'action' => 'index')); ?></li>  
   <li id="kwick3"><?php echo $this->Html->link(__('Visitas', true), array('controller' => 'cronograms', 'action' => 'index')); ?></li>  
   <li id="kwick4"><?php echo $this->Html->link(__('Visitas', true), array('controller' => 'users', 'action' => 'index')); ?></li>  
   </ul>
   <span class="grid_2">Olá, usuário.</span>
   <div id="boxlogin" class="grid_1">
   <a id="login" >Login</a>
   <div id="form_login">ll</div>
   </div>
   </div>
   