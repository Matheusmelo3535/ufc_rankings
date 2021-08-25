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
            if ($this->Categoria->save($this->request->data)) {
                $this->Flash->set('Categoria gravada com êxito');
                $this->redirect('/categorias');
            }
        }
    }
    
    public function edit($id = null) {
        if (!empty($this->request->data)) {
            if ($this->Categoria->save($this->request->data)) {
                $this->Flash->set('Categoria alterada com êxito');
                $this->redirect('/categorias');
            }
        }
        else {
            $fields = array(
                'Categoria.nome_categoria',
                'Categoria.peso_permitido'
            );
            $conditions = array('Categoria.id' => $id);
            $this->request->data = $this->Categoria->find('first', compact('fields', 'conditions'));
        }
    }

}

?>