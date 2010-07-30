<?php
class VisitsController extends AppController {

    var $name = 'Visits';
    var $uses = array('Visit', 'Client', 'Contact', 'User');

    function index() {
        $this->Visit->recursive = 0;
        $this->set('userVendors', $this->User->find('list', array('fields' => array('id', 'full_name'), 'conditions' => 'group_id = 3')));
        $this->set('clientNames', $this->Client->find('list', array('fields' => array('id', 'name'), 'conditions' => '')));
        $this->set('visits', $this->paginate());
    }

    function index_vendor() {
        $this->Visit->recursive = 0;
        $this->set('visits', $this->paginate());
    }

    function report() {
        $this->set('userVendors', $this->User->find('list', array('fields' => array('id', 'full_name'), 'conditions' => 'group_id = 3')));
        $this->set('clientNames', $this->Client->find('list', array('fields' => array('id', 'name'), 'conditions' => '')));

        $data = $this->data;
        $this->Visit->recursive = 0;
        $conditions = array();

        if($data['Visit']['user_id'] == null && $data['Visit']['client_id'] == null) {
            $this->Session->setFlash('Nenhum Vendedor ou Cliente foi selecionado');
            $this->redirect(array('action' => 'index'));
        }
        
        $data['Visit']['user_id'] != null ? $conditions['Contact.user_id'] = $data['Visit']['user_id'] : null;
        $data['Visit']['client_id'] != null ? $conditions['Contact.client_id'] = $data['Visit']['client_id'] : null;
        $to = $data['Visit']['to']['day'] ."-". $data['Visit']['to']['month'] ."-". $data['Visit']['to']['year'];
        $from = $data['Visit']['from']['day'] ."-". $data['Visit']['from']['month'] ."-". $data['Visit']['from']['year'];
        $contacts = $this->Contact->find("list", array('fields' => array('id'), 'conditions' => $conditions));


        $this->paginate = array(
                'conditions' => array(
                        'Visit.contact_id' =>  $contacts,
                        'Visit.real_date >' => $from,
                        'Visit.real_date <' => $to
                )
        );
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
        $this->set('userVendors', $this->User->find('list', array('fields' => array('id', 'full_name'), 'conditions' => 'group_id = 3')));
        $this->set('clientNames', $this->Client->find('list', array('fields' => array('id', 'name'), 'conditions' => '')));
        if (!empty($this->data)) {
            $this->Visit->create();
            if ($this->Visit->save($this->data)) {
                $this->Session->setFlash(__('The visit has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The visit could not be saved. Please, try again.', true));
            }
        }
        $contacts = $this->Visit->Contact->find('list');
        $this->set(compact('contacts'));
    }

    function edit($id = null) {
        $this->set('userVendors', $this->User->find('list', array('fields' => array('id', 'full_name'), 'conditions' => 'group_id = 3')));
        $this->set('clientNames', $this->Client->find('list', array('fields' => array('id', 'name'), 'conditions' => '')));
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid visit', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
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
        $contacts = $this->Visit->Contact->find('list');
        $this->set(compact('contacts'));
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

    function calendar($year = null, $month = null) {
        $this->loadModel('Client');

        if($year == null || $month == null){
            $year = date('Y');
            $month = date('m');
        }

        $date = $year."-".$month."-01";
        $nextDate = date("Y-m-d", mktime(0, 0, 0, $month + 1, 1, $year));
        $monthVisits = $this->Visit->find('all',  array(
                'conditions' => array(
                    'Visit.date >=' => $date,
                    'Visit.date <' => $nextDate
                ),
                'order' => array(
                    'Visit.date',
                    'Contact.name'
                )
        ));

        $clientsData = $this->Client->find('list',  array(
                'fields'=> array('Client.id', 'Client.name')
        ));

        $this->set('monthVisits', $monthVisits);
        $this->set('year', $year);
        $this->set('month', $month);
        $this->set('clientsData', $clientsData);
    }

    function calendar_vendor($year = null, $month = null) {
        $this->loadModel('Client');
        $userAuth = $this->Session->read('Auth.User');

        if($year == null || $month == null){
            $year = date('Y');
            $month = date('m');
        }


        //$userAuth['id']
        $date = $year."-".$month."-01";
        $nextDate = date("Y-m-d", mktime(0, 0, 0, $month + 1, 1, $year));
        $monthVisits = $this->Visit->find('all',  array(
                'conditions' => array(
                    'Visit.date >=' => $date,
                    'Visit.date <' => $nextDate,
                    'Contact.user_id' => $userAuth['id']
                ),
                'order' => array(
                    'Visit.date',
                    'Contact.name'
                )
        ));

        $clientsData = $this->Client->find('list',  array(
                'fields'=> array('Client.id', 'Client.name')
        ));

        $this->set('monthVisits', $monthVisits);
        $this->set('year', $year);
        $this->set('month', $month);
        $this->set('clientsData', $clientsData);
    }

}
?>