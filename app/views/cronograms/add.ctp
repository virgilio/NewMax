<div class="cronograms add_">
<?php echo $this->Form->create('Cronogram');?>
	<fieldset>
 		<legend><?php __('Novo Cronograma'); ?></legend>
	<?php
		echo $this->Form->input('client_id', array('label'=>'Cliente'));
		//echo $this->Form->input('user_id');
		echo $this->Form->input('start', array('label'=>'In&iacute;cio'));
		echo $this->Form->input('frequency', array('label'=>'Periodicidade'));
		echo $this->Form->input('period', array('label'=>'Fim'));
		//echo $this->Form->input('active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>
