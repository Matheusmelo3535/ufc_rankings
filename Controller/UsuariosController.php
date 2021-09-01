<?php

App::uses('AppController', 'Controller');

class UsuariosController extends AppController {
    public $layout = 'bootstrap';
    public $helpers = array('Js' => array('Jquery'));
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

    public function index() {
        if ($this->request->is('post') && !empty($this->request->data['Usuario']['nome'])) {
            $this->paginate['conditions']['Usuario.nome LIKE'] = '%' . trim($this->request->data['Usuario']['nome']) . '%';
        }
        $usuarios = $this->paginate();
        $this->set('usuarios', $usuarios);
    }
    
    public function add() {
        if (!empty($this->request->data)) {
            $this->Usuario->create();
            if ($this->Usuario->save($this->request->data)) {
                $this->Flash->bootstrap('Usuario gravado com sucesso', array('key' => 'success'));
                $this->redirect('/usuarios');
            }
        }
    }
}