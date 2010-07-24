<?php
class ClientsController extends AppController {

	var $name = 'Clients';

	function index() {
		$this->Client->recursive = 0;
		$this->set('clients', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid client', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('client', $this->Client->read(null, $id));
	}

	function add() {
                //Carregando Modelo Group
                $this->loadModel('Group');

                //Pegando lista de usuarios
                $userList = $this->Client->User->find('all');
                //Pegando Grupo com nome 'Vendedor'
                $groupList = $this->Group->findByName('Vendedor');
                //Pegando id do Grupo
                $vendorId =  $groupList['Group']['id'];

                //Criando array de opções para o select de vendedores para o cliente
                $options = array();

                //Colocando em cada posição [id] => [nome+sobrenome+usuario]
                foreach ($userList as $user){
                    if($user['User']['group_id'] == $vendorId)
                        $options[$user['User']['id']] = $user['User']['first_name']." ".$user['User']['last_name']." (".$user['User']['username'].")";
                }

                //Criando array que sera utilizado pelo helper Form
                $usersInfoList = array('options' => $options);

                //Setando variavel da view
                $this->set('userInfoList', $usersInfoList);

		if (!empty($this->data)) {
			$this->Client->create();
			if ($this->Client->save($this->data)) {
				$this->Session->setFlash(__('The client has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The client could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Client->User->find('list');
		$this->set(compact('users'));
	}

	function edit($id = null) {
                //Carregando Modelo Group
                $this->loadModel('Group');

                //Pegando lista de usuarios
                $userList = $this->Client->User->find('all');
                //Pegando Grupo com nome 'Vendedor'
                $groupList = $this->Group->findByName('Vendedor');
                //Pegando id do Grupo
                $vendorId =  $groupList['Group']['id'];

                //Criando array de opções para o select de vendedores para o cliente
                $options = array();

                //Colocando em cada posição [id] => [nome+sobrenome+usuario]
                foreach ($userList as $user){
                    if($user['User']['group_id'] == $vendorId)
                        $options[$user['User']['id']] = $user['User']['first_name']." ".$user['User']['last_name']." (".$user['User']['username'].")";
                }

                //Criando array que sera utilizado pelo helper Form
                $usersInfoList = array('options' => $options);

                //Setando variavel da view
                $this->set('userInfoList', $usersInfoList);


		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid client', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Client->save($this->data)) {
				$this->Session->setFlash(__('The client has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The client could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Client->read(null, $id);
		}
		$users = $this->Client->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for client', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Client->delete($id)) {
			$this->Session->setFlash(__('Client deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Client was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>