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
    
    public function beforeFilter() {
        $this->Auth->mapActions(['read' => ['report']]);
    }

    public function setPaginateConditions() {
        if ($this->request->is('post') && !empty($this->request->data['Categoria']['nome_categoria'])) {
            $this->paginate['conditions']['Categoria.nome_categoria LIKE'] = '%' . trim($this->request->data['Categoria']['nome_categoria']) . '%';
        }
    }

    public function add() {
        parent::add();
    }
    
    public function edit($id = null) {
        if (!empty($this->request->data)) {
            if ($this->Categoria->saveAll($this->request->data)) {
                $this->Flash->set('Categoria alterada com êxito');
                $this->redirect('/categorias');
            }
        }
        else {
            $fields = array(
                'Categoria.id',
                'Categoria.nome_categoria',
                'Categoria.peso_permitido'
            );
            $conditions = array('Categoria.id' => $id);
            $this->request->data = $this->Categoria->find('first', compact('fields', 'conditions'));
        }
    }
    
    public function delete($id) {
        $this->Categoria->delete($id);
        $this->Flash->set('Categoria excluída com êxito');
        $this->redirect('/categorias');
    }

    public function view($id = null) {
        $fields = array(
            'Categoria.nome_categoria',
            'Categoria.peso_permitido'
        );
        $conditions = array('Categoria.id' => $id);
        $this->request->data = $this->Categoria->find('first', compact('fields', 'conditions'));
    }
    
    public function report() {
        $this->layout = false;
        $this->response->type('pdf');
        $fields = array(
            'Categoria.nome_categoria',
            'Categoria.peso_permitido'
        );
        $categorias = $this->Categoria->find('all', compact('fields'));
        $this->set('categorias', $categorias);
    }
}
?>