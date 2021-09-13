<?php

App::uses('AppController', 'Controller');

class UsuariosController extends AppController {
    
    public $paginate = array(
        'fields' => array(
            'Usuario.id',
            'Usuario.nome',
            'Usuario.login',
            'Usuario.senha'
        ),
        'conditions' => array(),
        'limite' => 5,
        'order' => array('Usuario.nome' => 'asc')
    );

    public function beforeFilter() {
        $this->Auth->allow(array('logout','login'));            
        parent::beforeFilter();
    }
    
    public function login() {
        $this->layout = 'login';
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->bootstrap('Usuário ou senha incorretos', array('key' => 'danger'));
        }
    }
    
    public function logout() {
        $this->Auth->logout();
        $this->redirect('/login');
    }

    public function setPaginateConditions() {
        if ($this->request->is('post') && !empty($this->request->data['Usuario']['nome'])) {
            $this->paginate['conditions']['Usuario.nome LIKE'] = '%' . trim($this->request->data['Usuario']['nome']) . '%';
        }
    }
    
    public function add() {
        parent::add();
        $aros = $this->Acl->Aro->find('list', [
           'conditions' => ['Aro.parent_id IS NULL'],
           'fields' => ['Aro.id', 'Aro.alias'] 
        ]);
        $this->set('aros', $aros);
    }
    
    public function edit($id = null) {
        if (!empty($this->request->data)) {
            if ($this->Usuario->save($this->request->data)) {
                $this->Flash->bootstrap('Usuário editado com êxito', array('key' => 'success'));
                $this->redirect('/usuarios');
            }
        }
        else {
            $fields = array(
              'Usuario.id',
              'Usuario.nome',
              'Usuario.login',
              'Usuario.senha'
            );
            $conditions = array('Usuario.id' => $id );
            $this->request->data = $this->Usuario->find('first', compact('fields', 'conditions'));
        }
    }
    
    public function view($id = null) {
        $fields = array(
            'Usuario.id',
            'Usuario.nome',
            'Usuario.login'
        );
        $conditions = array('Usuario.id' => $id);
        $this->request->data = $this->Usuario->find('first', compact('fields', 'conditions'));
    }

    public function delete($id) {
        $this->Usuario->delete($id);
        $this->Flash->bootstrap('Usuario excluído com êxito', array('key' => 'success'));
        $this->redirect('/usuarios');
    }
}