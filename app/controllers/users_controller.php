<?php
class UsersController extends AppController {

    var $name = 'Users';

    function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allowedActions = array('*');
        //$this->Auth->allowedActions = array('login', 'logout', 'initDB');
        $this->Auth->allowedActions = array('login', 'logout', 'initDB', 'build_acl');
    }

    function profile (id=null) {
        $this->view($id);
    }

    function index_manager() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    function index_admin() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    function disable ($id){
        $this->changeStatus($id, '1');
    }

    function enable ($id){
        $this->changeStatus($id, '0');
    }

    function accept ($id){
        $this->changeStatus($id, '0');
    }

    function refuse ($id){
        if($id){
            $user = $this->User->findById($id);
            if($user != null){
                if($this->User->delete($id))
                    $this->Session->setFlash(__('Usu&aacute;rio recusado.', true));
                else
                    $this->Session->setFlash(__('Erro ao recusar usu&aacute;rio.', true));
            }
            else
                $this->Session->setFlash(__('Usu&aacute;rio n&atilde;o encontrado no Banco de dados.', true));
        }
        else
            $this->Session->setFlash(__('Erro ao recusar usu&aacute;rio.', true));

        $userAuth = $this->Session->read('Auth.User');
        if($userAuth['group_id'] == 1 )
            $this->redirect(array('action' => 'index_admin'));
        else
            $this->redirect(array('action' => 'index_manager'));
    }
    
    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid user', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    function add() {
        if (!empty($this->data)) {
            $this->User->create();
            if ($this->User->save($this->data)) {
                $this->Session->setFlash(__('The user has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
            }
        }
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid user', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->User->save($this->data)) {
                $this->Session->setFlash(__('The user has been saved: <pre>', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->User->read(null, $id);
        }
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));
    }

    function edit_vendor($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid user', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->User->save($this->data)) {
                $this->Session->setFlash(__('The user has been saved: <pre>', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->User->read(null, $id);
        }
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for user', true));
            $this->redirect(array('action'=>'index'));
        }
        if ($this->User->delete($id)) {
            $this->Session->setFlash(__('User deleted', true));
            $this->redirect(array('action'=>'index'));
        }
        $this->Session->setFlash(__('User was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }

    function login() {
        //Auth Magic
        if ($this->Session->read('Auth.User')) {
            $this->Session->setFlash('You are logged in!');
            $this->redirect('/', null, false);
        }
    }

    function logout() {
        //Leave empty for now.
        $this->Session->setFlash('Good-Bye');
        $this->redirect($this->Auth->logout());
    }


    function changePassword(){
        
    }

    function setup() {
        echo "me here";
    }

    function changeStatus($id = null, $usrStatus){
        if($id){
            $user = $this->User->findById($id);
            if($user != null){
                //Demitido
                $user['User']['active'] = $usrStatus;
                if($this->User->save($user)){
                    $this->Session->setFlash(__('Status de usu&aacute;rio alterado.', true));
                }
                else
                    $this->Session->setFlash(__('Erro ao mudar status de usu&aacute;rio.', true));
            }
            else
                $this->Session->setFlash(__('Usu&aacute;rio n&atilde;o encontrado no Banco de dados.', true));
        }
        else
            $this->Session->setFlash(__('Status de usu&aacute;rio n&atilde;o alterado.', true));

        $userAuth = $this->Session->read('Auth.User');
        if($userAuth['group_id'] == 1 )
            $this->redirect(array('action' => 'index_admin'));
        else
            $this->redirect(array('action' => 'index_manager'));
    }



}
?>