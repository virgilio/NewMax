<?php
class VisitsController extends AppController {

    var $name = 'Visits';

//    function beforeFilter() {
//        parent::beforeFilter();
//        //$this->Auth->allowedActions = array('*');
//        //$this->Auth->allowedActions = array('index', 'view', 'login', 'logout', 'initDB');
//    }



    function index() {
        $this->Visit->recursive = 0;
        $this->set('visits', $this->paginate());
    }

    function index_vendor() {
        $user = $this->Session->read('Auth.User');
        $id = $user['id'];

        $this->paginate['Visit'] = array(
            'conditions' => array(
                'Visit.user_id ' => $id
            )
        );

        $this->Visit->recursive = 0;
        $this->set('visits', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Visita inv&aacute;lida.', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('visit', $this->Visit->read(null, $id));
    }

    function add() {
        //$client tera as informações do cliente selecionado
        $client = $this->Visit->Client->findById($this->data['Visit']['client_id']);

        if (!empty($this->data)) {
            //Jogando em $this->data a informação do id do usuario (vendedor)
            $this->data['Visit']['user_id'] = $client['Client']['user_id'];

            //Marcando a visita como 'nao feita'
            $this->data['Visit']['done'] = '0';

            //Marcando o id de cronograma como null
            $this->data['Visit']['cronogram_id'] = null;

            //Marcando o relatorio como vazio
            $this->data['Visit']['report'] = "";

            $this->Visit->create();
            if ($this->Visit->save($this->data)) {
                $this->Session->setFlash(__('Visita salva.', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Visita n&atilde;o salva. Tente novamente.', true));
            }
        }
        $cronograms = $this->Visit->Cronogram->find('list');
        $clients = $this->Visit->Client->find('list');
        $users = $this->Visit->User->find('list');
        $this->set(compact('cronograms', 'clients', 'users'));
    }

    function edit_vendor($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Visita inv&aacute;lida.', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            $client = $this->Visit->Client->findById($this->data['Visit']['client_id']);
            $this->data['Visit']['user_id'] = $client['Client']['user_id'];

            if ($this->Visit->save($this->data)) {
                $this->Session->setFlash(__('Visita salva.', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Visita n&atilde;o salva. Tente novamente.', true));
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

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Visita inv&aacute;lida.', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            $client = $this->Visit->Client->findById($this->data['Visit']['client_id']);
            $this->data['Visit']['user_id'] = $client['Client']['user_id'];

            if ($this->Visit->save($this->data)) {
                $this->Session->setFlash(__('Visita salva.', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Visita n&atilde;o salva. Tente novamente.', true));
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
            $this->Session->setFlash(__('Id de visita inv&aacute;lido', true));
            $this->redirect(array('action'=>'index'));
        }
        if ($this->Visit->delete($id)) {
            $this->Session->setFlash(__('Visita excluida', true));
            $this->redirect(array('action'=>'index'));
        }
        $this->Session->setFlash(__('Visita n&atilde;o excluida', true));
        $this->redirect(array('action' => 'index'));
    }
}
?>