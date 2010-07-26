<div class="contacts form">
<?php echo $this->Form->create('Contact');?>
	<fieldset>
 		<legend><?php __('Edit Contact'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('client_id');
		echo $this->Form->input('funcao');
		echo $this->Form->input('name');
		echo $this->Form->input('phone');
		echo $this->Form->input('email');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
