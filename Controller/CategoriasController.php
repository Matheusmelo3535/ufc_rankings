<?php

App::uses('AppController', 'Controller');

class CategoriasController extends AppController {
   
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
    
    public function setPaginateConditions() {
        $nome = '';
        if ($this->request->is('post')) {
            $nome = $this->request->data['Categoria']['nome_categoria'];
            $this->Session->write('Categoria.nome_categoria', $nome);
        } else {
            $nome = $this->Session->read('Categoria.nome_categoria');
            $this->request->data('Categoria.nome_categoria', $nome);
        }
        if (!empty($nome)) {
            $this->paginate['conditions']['Categoria.nome_categoria LIKE'] = 
                '%' . trim($this->request->data['Categoria']['nome_categoria']) . '%';
        }
    }
    
    public function getEditData($id) {
        $fields = array(
            'Categoria.id',
            'Categoria.nome_categoria', 
            'Categoria.peso_permitido', 
        );
        $conditions = array('Categoria.id' => $id);
        $categoria = $this->Categoria->find('first', compact('fields', 'conditions'));

        return $categoria;
    }

}