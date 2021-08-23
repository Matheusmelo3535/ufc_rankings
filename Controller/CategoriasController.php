<?php

App::uses('AppController', 'Controller');

class CategoriasController extends AppController {
    public $layout = 'bootstrap';
    public $paginate = array(
        'fields' => array(
            'Categoria.id',
            'Categoria.nome_categoria',
            'Categoria.peso_permitido'
        ),
        'conditions' => array(),
        'limit' => 5,
        'order' => array('Categoria.peso_permitidos' => 'asc')
    );

    public function index() {
        $categorias = $this->paginate();
        $this->set('categorias', $categorias);
    }

    public function add() {
        if (!empty($this->request->data)) {
            $this->Categoria->create();
            if ($this->Categoria->saveAll($this->request->data)) {
                $this->Flash->set('Categoria gravada com êxito');
                $this->redirect('/categorias');
            }
        }
    }
    
        
    
}

?>