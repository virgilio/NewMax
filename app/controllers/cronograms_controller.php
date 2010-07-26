<?php
class CronogramsController extends AppController {

	var $name = 'Cronograms';

        function index() {
            $this->Cronogram->recursive = 0;
            $this->paginate['Cronogram'] = array(
                'order' => 'User.first_name'.' '.'User.last_name'
            );
            $this->set('cronograms', $this->paginate('Cronogram'));
        }
 
        function index_vendor() {
                $user = $this->Session->read('Auth.User');
                $id = $user['id'];
                $this->paginate['Cronogram'] = array(
                    'conditions' => array(
                        'Cronogram.user_id ' => $id
                    )
                );

		$this->Cronogram->recursive = 0;
		$this->set('cronograms', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid cronogram', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('cronogram', $this->Cronogram->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
                        //$client tera as informações do cliente selecionado
                        $client = $this->Cronogram->Client->findById($this->data['Cronogram']['client_id']);
                        //Jogando em $this->data a informação do id do usuario (vendedor)
                        $this->data['Cronogram']['user_id'] = $client['Client']['user_id'];

                        //Marcando o calendário como ativo (padrao na criacao)
                        $this->data['Cronogram']['active'] = '1';
                        
                        //TODO_NM - Avisar conflitos de datas (pedir confirmação)
                        //TODO_NM - Avisar fins de semana (pedir confirmação)
			$this->Cronogram->create();
			if ($this->Cronogram->save($this->data)) {
                            //Se conseguir marcar as visitas ($this->Cronogram->id é o id do calendario)
                            $scheduled = $this->scheduleVisits($this->data, $this->Cronogram->id);

                            //echo '<pre>'.print_r($scheduled).'</pre>';

                            if($scheduled[0]){
                                $this->Session->setFlash(__('Cronograma salvo e visitas marcadas.', true));
                                $this->redirect(array('action' => 'index'));
                            }
                            else{
                                if ($this->Cronogram->delete($this->Cronogram->id)) {
                                    $this->Session->setFlash(__('Cronograma n&atilde;o instanciado.<br/>'.$sheduled[1], true));
                                }
                                $this->Session->setFlash(__('Erro em cascata no fluxo de cria&ccedil;&atilde;o do Cronograma. CONTATE O ADMINISTRADOR!<br/>'.$sheduled[1], true));
                            }
			} else {
				$this->Session->setFlash(__('Cronograma n&atilde;o salvo! Tente novamente.', true));
			}
		}
		$clients = $this->Cronogram->Client->find('list');
		$users = $this->Cronogram->User->find('list');
		$this->set(compact('clients', 'users'));
	}

	function edit($id = null) {
                $actualCronogram = $this->Cronogram->findById($id);
                $start = $actualCronogram['Cronogram']['start'];
                $startTime = strtotime($start);
                $startDate = getdate(strtotime($start));
                $frequency = $actualCronogram['Cronogram']['frequency'];

                if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid cronogram', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
                    
                    $newPeriod = $this->data['Cronogram']['period'];
                    //time do novo fim
                    $newEnd = mktime(0,0,0,$startDate['mon'], $startDate['mday']+$newPeriod, $startDate['year']);
                    //diferença de dias entre o novo fim e o inicio
                    $interval = $newEnd - $startTime;
                    //time da frequencia
                    $frequencyTime = mktime(0,0,0,0,$frequency,0) - mktime(0,0,0,0,0,0);

                    //Se a nova data de fim é menor do que hoje
                    if($newEnd < time()){
                        $this->Session->setFlash(__('O fim do cronograma deve ser posterior à data atual', true));
                    }
                    //Se o tempo do inicio ao fim do cronograma não permite visitas
                    if( $interval < $frequencyTime){
                        $this->Session->setFlash(__('A data final deve permitir ao menos uma visita!', true));
                    }
                    else{
                        if ($this->Cronogram->save($this->data)) {
                            $reScheduleVisits = $this->reScheduleVisits($actualCronogram, $this->data);
                            if($reScheduleVisits[0]){
                                $this->Session->setFlash(__('Cronograma modificado', true));
				$this->redirect(array('action' => 'index'));
                            }
                            else{
                                $this->data['Cronogram']['period'] = $actualCronogram['Cronogram']['period'];
                                if($this->Cronogram->save($this->data)){
                                    $this->Session->setFlash(__($reScheduleVisits[1], true));
                                }
                                else{
                                    $this->Session->setFlash(__('O cronograma foi alterado mas ocorreu um erro. '.$reScheduleVisits[1], true));
                                }
                            }
			} else {
				$this->Session->setFlash(__('O cronograma não pode ser remarcado.', true));
			}
                    }
		}
		if (empty($this->data)) {
			$this->data = $this->Cronogram->read(null, $id);
		}
		$clients = $this->Cronogram->Client->find('list');
		$users = $this->Cronogram->User->find('list');
                $this->set('cronogram', $this->Cronogram->read(null, $id));
		$this->set(compact('clients', 'users'));
	}

        function reScheduleVisits($actualCronogram = null, $data = null){
            if($data != null && $actualCronogram != null){
                //Carregando o modelo Visit
                $this->loadModel('Visit');

                //Pegando time do inicio do cronograma ja existente e do dia atual
                $start = $actualCronogram['Cronogram']['start'];
                $startTime = strtotime($start);
                $today = date('Y-m-d');
                $todayTime = strtotime($today);

                //'Time' ja coberto até hoje, do cronograma
                $coveredTime = $todayTime - $startTime;

                //Se ja foi coberto algo
                if($coveredTime > 0){
                    //Seta periodo para a nova chamada do scheduleVisits
                    $newPeriod = $data['Cronogram']['period'] - ($coveredTime/(60*60*24));
                    //'Time' inicial para a nova chamada do scheduleVisits
                    $startReschedule = $todayTime;
                }
                //Senao
                else{
                    //Seta periodo para a nova chamada do scheduleVisits
                    $newPeriod = $data['Cronogram']['period'];
                    //'Time' inicial para a nova chamada do scheduleVisits
                    $startReschedule = $startTime;
                }

                //Próxima visita que ja estava no bd
                $firstOldVisit = $this->Cronogram->Visit->find('first', array(
                   'conditions' => array(
                       'date >=' => date('Y-m-d',$startReschedule),
                       'cronogram_id' => $actualCronogram['Cronogram']['id']
                   )
                ));

                //Se não existia visita seta o inicio para start ou today
                if($firstOldVisit == null){
                    if($startTime > $todayTime){
                        $rescheduleStart =  $start;
                    }
                    else{
                        $rescheduleStart = $today;
                    }
                }

                //Senao, deleta as entradas futuras do BD e seta a data inicial como
                //a da proxima visita q tinha sido achada
                else{
                    $this->Cronogram->Visit->deleteAll(array(
                        'cronogram_id'=>$actualCronogram['Cronogram']['id'],
                        'date >=' =>  $firstOldVisit['Visit']['date'],
                        'done' => '0'
                    ));
                    $rescheduleStart = $firstOldVisit['Visit']['date'];
                }

                //pegando 'date' do 'time' para o inicio
                $rescheduleStartDate = getDate(strtotime($rescheduleStart));

                //Criando e setando estrutura que sera utilizada na chamada do scheduleVisits
                $newData = array();

                $newData['Cronogram']['period'] = $newPeriod;
                $newData['Cronogram']['frequency'] = $actualCronogram['Cronogram']['frequency'];
                $newData['Cronogram']['start']['month'] = $rescheduleStartDate['mon'];
                $newData['Cronogram']['start']['day'] = $rescheduleStartDate['mday'];
                $newData['Cronogram']['start']['year'] = $rescheduleStartDate['year'];
                $newData['Cronogram']['client_id'] = $actualCronogram['Cronogram']['client_id'];
                $newData['Cronogram']['user_id'] = $actualCronogram['Cronogram']['user_id'];

                return $this->scheduleVisits($newData, $actualCronogram['Cronogram']['id']);
            }
            return array(false, "");
        }

        /*
         * Método utilizado para agendar as visitas do calendario criado
         */
        function scheduleVisits($data = null, $calendarId = null){
            if($data != null && $calendarId != null){
                //Carregando o modelo Visit
                $this->loadModel('Visit');

                //Puxando dados do formulário preenchido necessarios para o loop
                $periodoRestante = $data['Cronogram']['period'];
                $periodicidade = $data['Cronogram']['frequency'];
                $inicio = $data['Cronogram']['start'];

                //montando hora utilizada para somas nas datas
                $inicioDate = mktime(0,0,0,$inicio['month'],$inicio['day'],$inicio['year']);

                //Definindo data da primeira visita
                $dataVisit['Visit']['date']['day'] = date('d', $inicioDate);
                $dataVisit['Visit']['date']['month'] = date('m', $inicioDate);
                $dataVisit['Visit']['date']['year'] = date('y', $inicioDate);

                //Marcando visitas
                while($data['Cronogram']['period'] - $periodoRestante < $data['Cronogram']['period']){
                    //Cria visita
                    $this->Cronogram->Visit->create();

                    //Definindo dados da visita
                    $dataVisit['Visit']['client_id'] = $data['Cronogram']['client_id'];
                    $dataVisit['Visit']['user_id'] = $data['Cronogram']['user_id'];
                    $dataVisit['Visit']['cronogram_id'] = $calendarId;
                    $dataVisit['Visit']['done'] = '0';
                    $dataVisit['Visit']['report'] = "";

                    //variável temporria com copia das informacoes da visita
                    $dateVisitCorrect = $dataVisit;

                    //estrutura que contem somente as informacoes da data
                    $dateVisitVector = $dataVisit['Visit']['date'];

                    //Se for domingo
                    if( date("w", mktime(0,0,0,$dateVisitVector['month'],$dateVisitVector['day'],$dateVisitVector['year'])) == 0)
                        $mondayDate = mktime(0,0,0, $dateVisitVector['month'], $dateVisitVector['day']+1, $dateVisitVector['year']);

                    //Se for sabado
                    else if(date("w", mktime(0,0,0,$dateVisitVector['month'],$dateVisitVector['day'],$dateVisitVector['year'])) == 6)
                        $mondayDate = mktime(0,0,0, $dateVisitVector['month'], $dateVisitVector['day']+2, $dateVisitVector['year']);

                    //Mantendo data
                    else
                        $mondayDate = mktime(0,0,0, $dateVisitVector['month'], $dateVisitVector['day'], $dateVisitVector['year']);

                    //Aplicando mudanças na variavel com informações da visita
                    $dateVisitCorrect['Visit']['date']['day'] = date('d', $mondayDate);
                    $dateVisitCorrect['Visit']['date']['month'] = date('m', $mondayDate);
                    $dateVisitCorrect['Visit']['date']['year'] = date('y', $mondayDate);

                    //Se não foi possível marcar a visita
                    if (!$this->Cronogram->Visit->save($dateVisitCorrect)){
                        //Deleta visitas ja marcadas (a partir do inicio definido)!
                        if($this->Cronogram->Visit->deleteAll(array('Visit.calendar_id' => $calendarId, 'Visit.date >=' => $inicio))){
                            //Tudo ok na 'desmarcacao'
                            return array(false,'Nenhuma visita foi (re)marcada');
                        }
                        //Erro na 'desmarcação'
                        return array(false, 'Erro em cascata ao (re)marcar visitas! CONTATAR O ADMINISTRADOR');
                    }

                    //Somando periodicidade na data (definindo proxima data)
                    $next = $dataVisit['Visit']['date'];
                    $nextDate = mktime(0,0,0, $next['month'], $next['day']+$periodicidade, $next['year']);

                    $dataVisit['Visit']['date']['day'] = date('d', $nextDate);
                    $dataVisit['Visit']['date']['month'] = date('m', $nextDate);
                    $dataVisit['Visit']['date']['year'] = date('y', $nextDate);

                    $periodoRestante =  $periodoRestante - $periodicidade;
                }
                return array(true, 'Visitas (re)marcadas.');
            }
            return array(false,'Nenhuma visita foi (re)marcada');
        }


	function delete($id = null) {
            $this->Session->setFlash(__('Cronogramas n&atilde;o podem ser excluidos! Se necess&aacute;rio, desative-o!', true));
//		if (!$id) {
//			$this->Session->setFlash(__('Invalid id for cronogram', true));
//			$this->redirect(array('action'=>'index'));
//		}
//		if ($this->Cronogram->delete($id)) {
//			$this->Session->setFlash(__('Cronogram deleted', true));
//			$this->redirect(array('action'=>'index'));
//		}
//		$this->Session->setFlash(__('Cronogram was not deleted', true));
//		$this->redirect(array('action' => 'index'));
	}
}
?>