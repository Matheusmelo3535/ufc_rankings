<?php

App::uses('AppController', 'Controller');

class UsuariosController extends AppController {
    public $layout = 'bootstrap';
    public $helpers = array('Js' => array('Jquery'));
    public $components = array('RequestHandler');
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

    public function index() {
        if ($this->request->is('post') && !empty($this->request->data['Usuario']['nome'])) {
            $this->paginate['conditions']['Usuario.nome LIKE'] = '%' . trim($this->request->data['Usuario']['nome']) . '%';
        }
        $usuarios = $this->paginate();
        $this->set('usuarios', $usuarios);
    }
}