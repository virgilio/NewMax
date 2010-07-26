<?php
class ContactsController extends AppController {

	var $name = 'Contacts';

	function index() {
		$this->Contact->recursive = 0;
		$this->set('contacts', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Contato inexistente', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('contact', $this->Contact->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Contact->create();
			if ($this->Contact->save($this->data)) {
				$this->Session->setFlash(__('Contato salvo.', true));
			} else {
				$this->Session->setFlash(__('O contato n&atilde;o p&ocirc;de ser salvo. Tente novamente.', true));
                                $this->redirect(array('action' => 'index'));
			}
		}
		$clients = $this->Contact->Client->find('list');
		$this->set(compact('clients'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Contato inexistente', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Contact->save($this->data)) {
				$this->Session->setFlash(__('Contato salvo.', true));
			} else {
				$this->Session->setFlash(__('O contato n&atilde;o p&ocirc;de ser salvo. Tente novamente.', true));
			}
                        $this->redirect(array('action' => 'index'));
		}
		if (empty($this->data)) {
			$this->data = $this->Contact->read(null, $id);
		}
		$clients = $this->Contact->Client->find('list');
		$this->set(compact('clients'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for contact', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Contact->delete($id)) {
			$this->Session->setFlash(__('Contact deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Contact was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>