<?php

App::uses('AppController', 'Controller');

class LutadorsController extends AppController {
    
    public $paginate = array(
        'fields' => array(
            'Lutador.id',
            'Lutador.rank', 'Lutador.nome', 
            'Lutador.altura', 'Lutador.peso', 
            'Lutador.idade', 'Lutador.vitorias', 
            'Lutador.derrotas', 'Lutador.estilo_de_luta'),
        'conditions' => array(),
        'limit' => 5,
        'order' => array('Lutador.rank' => 'asc')
    );
    
    public function setPaginateConditions() {
        if ($this->request->is('post') && !empty($this->request->data['Lutador']['nome'])) {
            $this->paginate['conditions']['Lutador.nome LIKE'] = '%' . trim($this->request->data['Lutador']['nome']) . '%';
        }

    }

    public function add() {
        if (!empty($this->request->data)) {
            $this->Lutador->create();
            if ($this->Lutador->saveAll($this->request->data)) {
                $this->Flash->set('Lutador gravado com êxito.');
                $this->redirect('/lutadors');
            }
        }
        $fields = array('Categoria.id', 'Categoria.nome_categoria');
        $categorias = $this->Lutador->Categoria->find('list', compact('fields'));
        $this->set('categorias', $categorias);
    }
    
    public function edit($id = null) {
        if (!empty($this->request->data)) {
            if ($this->Lutador->saveAll($this->request->data)) {
                $this->Flash->set('Lutador alterado com êxito.');
                $this->redirect('/lutadors');
            }
        }
        else {
            $fields = array(
            'Lutador.id',
            'Lutador.nome', 
            'Lutador.altura', 
            'Lutador.peso', 
            'Lutador.idade', 
            'Lutador.vitorias', 
            'Lutador.derrotas', 
            'Lutador.rank',
            'Lutador.estilo_de_luta');
            $conditions = array('Lutador.id' => $id);
            $lutador = $this->Lutador->find('first', compact('fields', 'conditions'));
            $lutador['Lutador']['idade'] = date('d-m-Y', strtotime($lutador['Lutador']['idade']));
            $this->request->data = $lutador;
        }
        $fields = array('Categoria.id', 'Categoria.nome_categoria');
        $categorias = $this->Lutador->Categoria->find('list', compact('fields'));
        $this->set('categorias', $categorias);
    }

    public function view($id = null) {
        $fields = array(
            'Lutador.id',
            'Lutador.nome', 
            'Lutador.altura', 
            'Lutador.peso', 
            'Lutador.idade', 
            'Lutador.vitorias', 
            'Lutador.derrotas', 
            'Lutador.rank',
            'Lutador.estilo_de_luta');
            $conditions = array('Lutador.id' => $id);
            $this->request->data = $this->Lutador->find('first', compact('fields', 'conditions'));
            $fields = array('Categoria.id', 'Categoria.nome_categoria');
            $categorias = $this->Lutador->Categoria->find('list', compact('fields'));
            $this->set('categorias', $categorias);
    }

    public function delete($id) {
        $this->Lutador->delete($id);
        $this->Flash->set('Lutador excluído com êxito.');
        $this->redirect('/lutadors');
    }
    
    public function report() {
        $this->layout = false;
        $this->response->type('pdf');
        $fields = array(
            'Lutador.id',
            'Lutador.nome', 
            'Lutador.vitorias', 
            'Lutador.derrotas', 
            'Lutador.rank',
            'Lutador.estilo_de_luta',
        );
        $lutadores = $this->Lutador->find('all', compact('fields'));
        // debug($lutadores);
        // exit();
        $this->set('lutadores', $lutadores);
        
    }
}
?>