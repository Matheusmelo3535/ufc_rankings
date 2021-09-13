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
        $nome = '';
        if ($this->request->is('post')) {
            $nome = $this->request->data['Lutador']['nome'];
            $this->Session->write('Lutador.nome', $nome);
        } else {
            $nome = $this->Session->read('Lutador.nome');
            $this->request->data('Lutador.nome', $nome);
        }
        if (!empty($nome)) {
            $this->paginate['conditions']['Lutador.nome LIKE'] = '%' . trim($this->request->data['Lutador']['nome']) . '%';
        }
    }

    public function add() {
        parent::add();
        $this->setCategorias();
    }
    
    public function getEditData($id) {
        $this->setCategorias();
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
            return $lutador;
    }

    // public function view($id = null) {
    //    parent::view($id);
    // }

    public function setCategorias() {
        $fields = array('Categoria.id', 'Categoria.nome_categoria');
        $categorias = $this->Lutador->Categoria->find('list', compact('fields'));
        $this->set('categorias', $categorias);
    }
}
?>