<div class="visits form">
<?php echo $this->Form->create('Visit');?>
	<fieldset>
 		<legend><?php __('Nova Visita'); ?></legend>
	<?php
		//echo $this->Form->input('cronogram_id');
		echo $this->Form->input('client_id', array('label'=>'Cliente'));
		//echo $this->Form->input('user_id');
		echo $this->Form->input('date', array('label'=>'Data'));
		//echo $this->Form->input('done');
		//echo $this->Form->input('report');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>