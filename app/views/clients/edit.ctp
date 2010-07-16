<div class="clients form">
<?php echo $this->Form->create('Client');?>
	<fieldset>
 		<legend><?php __('Edit Client'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Client.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Client.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Clients', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Calendars', true), array('controller' => 'calendars', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Calendar', true), array('controller' => 'calendars', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contacts', true), array('controller' => 'contacts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contact', true), array('controller' => 'contacts', 'action' => 'add')); ?> </li>
	</ul>
</div>