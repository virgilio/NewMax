<div class="visits edit_vendor">
<?php echo $this->Form->create('Visit');?>
	<fieldset>
 		<legend><?php __('Editar Visita'); ?></legend>
	<?php
		//echo $this->Form->input('id');
		//echo $this->Form->input('cronogram_id');
		echo $this->Form->input('client_id', array('type' => 'hidden'));
		//echo $this->Form->input('user_id');
		//echo $this->Form->input('date');
		echo $this->Form->input('report', array('label'=>'Relat&oacute;rio'));
                echo $this->Form->input('done', array('label'=>'Feito'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>