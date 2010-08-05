<?php
/**
 * Script de CRON para atualização do Banco de Dados NewMax 
 * Autor: Virgílio N Santos
 * MatchBoxIdeas
 * 
 *
 * (1) Para cada cliente ativo {{
 *   (Tem visitas em aberto) ?
 *     (data de hoje - dia da  ultima visita > periodicidade) ?
 *       Cliente X, VISITA EM ATRASO (marca no relatorio)
 *     : Continua ==> (1)
 *   : (A visita foi realizada em atraso) ?
 *     Cliente X, VISITA REALIZADA EM ATRASO (marca no relatorio)
 *   : Continua
 *   Marca uma nova visita (De acordo com a data da visita anterior (data real ou data da visita??) + periodicidade)
 *   Notifica usuário (vendedor)
 * }}
 *
 * Status das visitas: 0 open
 *                     1 skipped
 *                     2 done
 *
 **/

class ReportShell extends Shell{
  var $uses = array('Visit', 'Contact', 'Client');
  var $reportMail;

  function main(){
    
    $reportMail = "" .
      "Relatório de Visitas NewMax\n" . 
      "Semana: " . date('d-m-Y ', strtotime('today')) .
      "Hora da execução: " . date('H:i:s', strtotime('now')) . "\n";
    
    $day = 60*60*24;

    
    //Variaveis para uso
    
    $last_week = date('Y-m-d H:i:s', strtotime('-1 week')); //Dia e hora da última consulta 
    $contacts = $this->Contact->find("all", array('fields' => array('id', 'frequency', 'client_id'),  'conditions' => 'Contact.active = 1', 'recursive' => 0));
    
    $clients = $this->Client->find("list", array('fields' => array('id', 'name')));
    
    //$this->out(print_r($contacts));

    foreach($contacts as $contact){
      echo $contact['Contact']['id'] . "\n";
      $openVisit = $this->Visit->find('first', array('fields' => array('id', 'date', 'status', 'date'),
						     'order' => array('Visit.date DESC'),
						     'recursive' => 0,
						     'conditions' => 'contact_id=' . $contact['Contact']['id'] . " AND status=0"));
      //echo print_r($openVisit);
      if(empty($openVisit)){ // Sem visitas em aberto
	echo "";
	$lastVisit = $this->Visit->find('first', array('fields' => array('id', 'real_date', 'status', 'date'), 
						       'order' => array('Visit.date DESC'), 
						       'recursive' => 0, 
						       'conditions' => 'contact_id=' . $contact['Contact']['id']));
	
	if(!empty($lastVisit)) { //Existe pelo menos uma última visita
	  echo "Exist visitas \n";
	  $this->Visit->create();	  
	  $data = array(
			'Visit' => array(
					 'contact_id' => $contact['Contact']['id'],
					 'date' => date('Y-m-d', strtotime($lastVisit['Visit']['real_date']) + $contact['Contact']['frequency'] * $day),
					 'status' => 0
					 ));
	}
	else{ // Não existe visita, marca a partir de hoje
	  echo "Nao existe visita\n";
	  $this->Visit->create();	  
	  $data = array(
                        'Visit' => array(
                                         'contact_id' => $contact['Contact']['id'],
                                         'date' => date('Y-m-d', strtotime('today') + $contact['Contact']['frequency'] * $day),
                                         'status' => 0
                                         ));
	}
	print_r($this->Visit->save($data));
      }
      else { 
	//Há uma visita em aberto
	$delta = strtotime('today') - strtotime($openVisit['Visit']['date']);
	$frequency = $contact['Contact']['frequency'] * $day;
	echo $delta . " => " . $openVisit['Visit']['date'] . " <> " . $contact['Contact']['frequency']*$day . "\n";
	if($delta > $frequency / 2 ){ //Visita em atraso
	  $this->Visit->id = $openVisit['Visit']['id'];
	  $this->Visit->saveField('status', 1);
	  
	  //schedule new one
	  $this->Visit->create();
	  $data = array(
                        'Visit' => array(
                                         'contact_id' => $contact['Contact']['id'],
                                         'date' => date('Y-m-d', strtotime($lastVisit['Visit']['date']) + $contact['Contact']['frequency'] * $day),
                                         'status' => 0
                                         ));
	  $this->Visit->save($data);
	}
	else {
	  //continue
	}
	
      }
    }
    
    //Print out total for the selected orders
    $this->out($reportMail);
  }
  
}
?>