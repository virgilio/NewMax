<div class="cronograms add_">
<?php echo $this->Form->create('Cronogram');?>
	<fieldset>
 		<legend><?php __('Add Cronogram'); ?></legend>
	<?php
		echo $this->Form->input('client_id');
		//echo $this->Form->input('user_id');
		echo $this->Form->input('start');
		echo $this->Form->input('frequency');
		echo $this->Form->input('period');
		//echo $this->Form->input('active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<?php
/*<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Cronograms', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Clients', true), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client', true), array('controller' => 'clients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Visits', true), array('controller' => 'visits', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Visit', true), array('controller' => 'visits', 'action' => 'add')); ?> </li>
	</ul>
</div>*/
?>