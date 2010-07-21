<?php
class CronogramsController extends AppController {

	var $name = 'Cronograms';

	function index() {
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
			$this->Cronogram->create();
			if ($this->Cronogram->save($this->data)) {
				$this->Session->setFlash(__('The cronogram has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cronogram could not be saved. Please, try again.', true));
			}
		}
		$clients = $this->Cronogram->Client->find('list');
		$users = $this->Cronogram->User->find('list');
		$this->set(compact('clients', 'users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid cronogram', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Cronogram->save($this->data)) {
				$this->Session->setFlash(__('The cronogram has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cronogram could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Cronogram->read(null, $id);
		}
		$clients = $this->Cronogram->Client->find('list');
		$users = $this->Cronogram->User->find('list');
		$this->set(compact('clients', 'users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for cronogram', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Cronogram->delete($id)) {
			$this->Session->setFlash(__('Cronogram deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Cronogram was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>