<?php
class VisitsController extends AppController {

	var $name = 'Visits';

	function index() {
		$this->Visit->recursive = 0;
		$this->set('visits', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid visit', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('visit', $this->Visit->read(null, $id));
	}

	function add() {
                //$client tera as informações do cliente selecionado
                $client = $this->Visit->Client->findById($this->data['Visit']['client_id']);

                //Jogando em $this->data a informação do id do usuario (vendedor)
                $this->data['Visit']['user_id'] = $client['Client']['user_id'];

                //Marcando a visita como 'nao feita'
                $this->data['Visit']['done'] = '0';

                //Marcando o id de cronograma como null
                $this->data['Visit']['cronogram_id'] = null;

                //Marcando o relatorio como vazio
                $this->data['Visit']['report'] = "";


		if (!empty($this->data)) {
			$this->Visit->create();
			if ($this->Visit->save($this->data)) {
				$this->Session->setFlash(__('The visit has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The visit could not be saved. Please, try again.', true));
			}
		}
		$cronograms = $this->Visit->Cronogram->find('list');
		$clients = $this->Visit->Client->find('list');
		$users = $this->Visit->User->find('list');
		$this->set(compact('cronograms', 'clients', 'users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid visit', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
                        $client = $this->Visit->Client->findById($this->data['Visit']['client_id']);
                        $this->data['Visit']['user_id'] = $client['Client']['user_id'];

			if ($this->Visit->save($this->data)) {
				$this->Session->setFlash(__('The visit has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The visit could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Visit->read(null, $id);
		}
		$cronograms = $this->Visit->Cronogram->find('list');
		$clients = $this->Visit->Client->find('list');
		$users = $this->Visit->User->find('list');
		$this->set(compact('cronograms', 'clients', 'users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for visit', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Visit->delete($id)) {
			$this->Session->setFlash(__('Visit deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Visit was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>