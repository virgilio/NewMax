<div class="visits form">
<?php echo $this->Form->create('Visit');?>
	<fieldset>
 		<legend><?php __('Add Visit'); ?></legend>
	<?php
		echo $this->Form->input('contact_id', array('label' => 'Contato/Cliente'));
		echo $this->Form->input('date');
		echo $this->Form->input('status');
		echo $this->Form->input('report');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<?php /*
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Visits', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contact', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div> */ ?>