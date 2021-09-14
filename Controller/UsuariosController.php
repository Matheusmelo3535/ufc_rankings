<?php

App::uses('AppController', 'Controller');

class UsuariosController extends AppController {
    
    public $paginate = array(
        'fields' => array(
            'Usuario.id',
            'Usuario.nome',
            'Usuario.login',
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
        $nome = '';
        if ($this->request->is('post')) {
            $nome = $this->request->data['Usuario']['nome'];
            $this->Session->write('Usuario.nome', $nome);
        } else {
            $nome = $this->Session->read('Usuario.nome');
            $this->request->data('Usuario.nome', $nome);
        }
        if (!empty($nome)) {
            $this->paginate['conditions']['Usuario.nome LIKE'] = '%' . trim($this->request->data['Usuario']['nome']) . '%';
        }
    }
    
    public function add() {
        parent::add();
        $this->setAros();
    }
    
    public function getEditData($id) {
        $this->setAros();
        $fields = array(
            'Usuario.id',
            'Usuario.nome',
            'Usuario.login',
        );
        $conditions = array('Usuario.id' => $id);
        $usuario = $this->Usuario->find('first', compact('fields', 'conditions'));
        return $usuario; 
    }
    
    public function setAros() {
        $aros = $this->Acl->Aro->find('list', [
            'fields' => ['Aro.id', 'Aro.alias'] 
         ]);
         $this->set('aros', $aros);
    }
}