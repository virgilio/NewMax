<div class="visits edit_vendor">
<?php echo $this->Form->create('Visit');?>
	<fieldset>
 		<legend><?php __('Edit Visit'); ?></legend>
	<?php
		//echo $this->Form->input('id');
		//echo $this->Form->input('cronogram_id');
		//echo $this->Form->input('client_id');
		//echo $this->Form->input('user_id');
		//echo $this->Form->input('date');
		//echo $this->Form->input('done');
		echo $this->Form->input('report');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<?php
/*<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Visit.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Visit.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Visits', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Cronograms', true), array('controller' => 'cronograms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cronogram', true), array('controller' => 'cronograms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients', true), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client', true), array('controller' => 'clients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>*/
?>