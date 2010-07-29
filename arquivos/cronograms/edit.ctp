<div class="cronograms edit_">
<?php echo $this->Form->create('Cronogram');?>
	<fieldset>
 		<legend><?php __('Editar Cronograma'); ?></legend>
	<?php
		echo $this->Form->input('id');
                echo "Cliente: ". $cronogram['Client']['name'];
                echo "<br/>";
                echo "In&iacute;cio: ".$cronogram['Cronogram']['start'];
                echo "<br/>";
                echo "Periodicidade: ".$cronogram['Cronogram']['frequency']." dias";
/*		echo $this->Form->input('client_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('start');
		echo $this->Form->input('frequency');*/
		echo $this->Form->input('period', array('label'=>'Per&iacute;odo'));
//		echo $this->Form->input('active', array('label'=>'Ativo'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>
