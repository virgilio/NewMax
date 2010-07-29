<div class="visits edit_">
<?php echo $this->Form->create('Visit');?>
	<fieldset>
 		<legend><?php __('Editar Visita'); ?></legend>
	<?php
		//echo $this->Form->input('id');
		//echo $this->Form->input('cronogram_id');
		echo $this->Form->input('client_id', array('label'=>'Cliente'));
		//echo $this->Form->input('user_id');
		echo $this->Form->input('date', array('label'=>'Data','dateFormat' => 'DMY',
                            'monthNames' => array(
                                '01' => 'Janeiro',
                                '02' => 'Fevereiro',
                                '03' => 'Março',
                                '04' => 'Abril',
                                '05' => 'Maio',
                                '06' => 'Junho',
                                '07' => 'Julho',
                                '08' => 'Agosto',
                                '09' => 'Setembro',
                                '10' => 'Outubro',
                                '11' => 'Novembro',
                                '12' => 'Dezembro'
                            )));
		//echo $this->Form->input('done');
		//echo $this->Form->input('report');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>
