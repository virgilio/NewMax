<?php
/**
 * Script de CRON para atualização do Banco de Dados NewMax 
 * Autor: Virgílio N Santos
 * MatchBoxIdeas
 * 
 *
 * (1) Para cada cliente ativo {{
 *   (Tem visitas em aberto) ?
 *     (Dia da visita - dia da  ultima visita > periodicidade) ?
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
      $visits = $this->Visit->query('SELECT id, date, status, report FROM visits WHERE contact_id = ' . $contact['Contact']['id'] . ' AND status = 0');
      print_r($visits);      
      if(sizeof($visits) == 0 ){ // Sem visitas em aberto
	$lastVisit = $this->Visit->find('first', array('fields' => array('id', 'real_date', 'status'), 
						       'order' => array('Visit.date DESC'), 
						       'recursive' => 0, 
						       'conditions' => 'contact_id=' . $contact['Contact']['id']));
	
	echo "Last Visit: " . print_r($lastVisit);
	if(sizeof($lastVisit) > 0) {
	  echo 
	    $contact['Contact']['frequency'] . ": " . 
	    $lastVisit['Visit']['real_date'] . " => ". 
	    date('d-m-Y', $contact['Contact']['frequency'] * $day + strtotime($lastVisit['Visit']['real_date'])) . 
	    "\n";
	}
      }
      else { //Visitas em aberto
      }
    }



    $i = 0;

    //Print out each order's information
    //    foreach($visits as $visit) {
      /*$this->out('Data da visita:' .    $visit['Visit']['created'] . "\n");
      $this->out('Cliente: ' .    $visit['Client']['name'] . "\n");
      $this->out('----------------------------------------' .    "\n");
      */
    $i++;
      //}

    //Print out total for the selected orders
    $this->out($reportMail);
    $this->out("Total de visitas: " . $i . "\n"); 

  }

}
?>