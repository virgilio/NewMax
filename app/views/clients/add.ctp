<div class="clients add">
<?php echo $this->Form->create('Client');?>
	<fieldset>
 		<legend><?php __('Cadastro de cliente'); ?></legend>
	<?php
		echo $this->Form->input('name');
                echo $this->Form->input('user_id', $userInfoList);
		//echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar', true));?>
</div>
<?php
/*
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Clients', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contacts', true), array('controller' => 'contacts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contact', true), array('controller' => 'contacts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cronograms', true), array('controller' => 'cronograms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cronogram', true), array('controller' => 'cronograms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Visits', true), array('controller' => 'visits', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Visit', true), array('controller' => 'visits', 'action' => 'add')); ?> </li>
	</ul>
</div>
 */
?>