<?php
class UsersController extends AppController {

    var $name = 'Users';

    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('*');
    }

    function aclsetup() {
        $this->Acl->Aco->create(array('parent_id' => null, 'alias' => 'controllers'));
        //$this->Acl->Aco->save();
        $this->set('data', $this);

    }

    function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
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
                $this->Session->setFlash(__('The user has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->User->read(null, $id);
        }

        // Check if their permission group is changing
        $oldgroupid = $this->User->field('group_id');
        if ($oldgroupid !== $this->data['User']['group_id']) {
            $aro =& $this->Acl->Aro;
            $user = $aro->findByForeignKeyAndModel($this->data['User']['id'], 'User');
            $group = $aro->findByForeignKeyAndModel($this->data['User']['group_id'], 'Group');

            // Save to ARO table
            $aro->id = $user['Aro']['id'];
            $aro->save(array('parent_id' => $group['Aro']['id']));
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
    }

    function logout() {
        //Leave empty for now.
    }

    function initDB() {
        $group =& $this->User->Group;
        //Allow admins to everything
        $group->id = 5;
        $this->Acl->allow($group, 'controllers');

        //allow managers to posts and widgets
        $group->id = 6;
        $this->Acl->deny($group, 'controllers');
        $this->Acl->allow($group, 'controllers/Posts');
        $this->Acl->allow($group, 'controllers/Widgets');

        //allow users to only add and edit on posts and widgets
        $group->id = 7;
        $this->Acl->deny($group, 'controllers');
        $this->Acl->allow($group, 'controllers/Posts/add');
        $this->Acl->allow($group, 'controllers/Posts/edit');
        $this->Acl->allow($group, 'controllers/Widgets/add');
        $this->Acl->allow($group, 'controllers/Widgets/edit');
    }
}
?>