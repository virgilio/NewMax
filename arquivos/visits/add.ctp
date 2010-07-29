<div class="visits form">
<?php echo $this->Form->create('Visit');?>
	<fieldset>
 		<legend><?php __('Nova Visita'); ?></legend>
	<?php
		echo $this->Form->input('contact_id', array('label'=>'Contato'));
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
		echo $this->Form->input('status', array('type' => 'hidden', 'value'=> '0'));
		//echo $this->Form->input('report');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>