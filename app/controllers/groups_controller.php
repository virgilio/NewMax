<?php
class GroupsController extends AppController {

    var $name = 'Groups';

    function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allowedActions = array('index', 'view');
    }


//    function index() {
//        $this->Group->recursive = 0;
//        $this->set('groups', $this->paginate());
//    }

    function index_admin() {
        $this->Group->recursive = 0;
        $this->set('groups', $this->paginate());
    }

    function view_admin($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Grupo inválido', true));
            $this->redirect(array('action' => 'index_admin'));
        }
        $this->set('group', $this->Group->read(null, $id));
    }

    function add_admin() {
        if (!empty($this->data)) {
            $this->Group->create();
            if ($this->Group->save($this->data)) {
                $this->Session->setFlash(__('Grupo Salvo', true));
                $this->redirect(array('action' => 'index_admin'));
            } else {
                $this->Session->setFlash(__('O grupo não pôde ser salvo, tente novamente.', true));
            }
        }
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid group', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Group->save($this->data)) {
                $this->Session->setFlash(__('The group has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The group could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Group->read(null, $id);
        }
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for group', true));
            $this->redirect(array('action'=>'index'));
        }
        if ($this->Group->delete($id)) {
            $this->Session->setFlash(__('Group deleted', true));
            $this->redirect(array('action'=>'index'));
        }
        $this->Session->setFlash(__('Group was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }
}
?>