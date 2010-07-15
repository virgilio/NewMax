<div class="calendars form">
<?php echo $this->Form->create('Calendar');?>
	<fieldset>
 		<legend><?php __('Add Calendar'); ?></legend>
	<?php
		echo $this->Form->input('client_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('inicio');
		echo $this->Form->input('peridiocidade');
		echo $this->Form->input('periodo');
		echo $this->Form->input('ativo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Calendars', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Clients', true), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client', true), array('controller' => 'clients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>