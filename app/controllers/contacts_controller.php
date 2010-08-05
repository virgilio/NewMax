<?php
class ContactsController extends AppController {

    var $name = 'Contacts';
    var $uses = array('Contact', 'Visit', 'Client', 'User');

    function index() {
        $this->Contact->recursive = 0;	
	//$this->paginate['joins'] = array('Client');
        $this->set('contacts', $this->paginate());
    }

    function index_vendor($vendor = null) {
        if($vendor == null) {
            $user = $this->Session->read('Auth.User');
            $id = $user['id'];
            //$this->Session->setFlash(__('Vendedor não cadastrado', true));
        }

        $this->Contact->recursive = 0;
        $this->paginate['Contact'] = array(
                'conditions' => array(
                        'Contact.user_id' => $vendor != null ? $vendor : $id
                )
        );

        $this->set('contacts', $this->paginate());




    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid contact', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('contact', $this->Contact->read(null, $id));
    }

    function add() {
      if (!empty($this->data)) {
	$day = 60*60*24;
	$this->Contact->create();
	if ($this->Contact->save($this->data)) {
	  $this->Visit->create();
	  $data = array(
			'Visit' => array(
					 'contact_id' => $this->Contact->id,
					 'date' => date('Y-m-d', strtotime('today') + $this->data['Contact']['frequency'] * $day),
					 'status' => 0
					 ));
	
	  $this->Visit->save($data);
	  
	  $this->Session->setFlash(__('The contact has been saved', true));
	  $this->redirect(array('action' => 'index'));
	} else {
	  $this->Session->setFlash(__('The contact could not be saved. Please, try again.', true));
	}
      }
      $clients = $this->Contact->Client->find('list');
      $users = $this->Contact->User->find('list');
      $this->set(compact('clients', 'users'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid contact', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Contact->save($this->data)) {
                $this->Session->setFlash(__('The contact has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The contact could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Contact->read(null, $id);
        }
        $clients = $this->Contact->Client->find('list');
        $users = $this->Contact->User->find('list');
        $this->set(compact('clients', 'users'));
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