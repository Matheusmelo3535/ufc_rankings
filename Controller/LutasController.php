<?php

App::uses('AppController', 'Controller');

class LutasController extends AppController {
   
    public $paginate = array(
        'fields' => array(
            'Luta.id',
            'Luta.data_luta',
            'Luta.lutador_vencedor',
            'Luta.lutador_perdedor'
        ),
        'contain' => array(
            'lutador_vencedor' => array(
                'fields' => array('nome')
            ),
            'lutador_perdedor' => array(
                'fields' => array('nome')
            )
        ),
        'limit' => 5,
        'order' => array('Luta.data_luta' => 'asc')
    );
    
    public function setPaginateConditions() {
        $nome = '';
        if ($this->request->is('post')) {
            $nome = $this->request->data['lutador_vencedor']['nome'];
            $this->Session->write('lutador_vencedor.nome', $nome);
        } else {
            $nome = $this->Session->read('lutador_vencedor.nome');
            $this->request->data('lutador_vencedor.nome', $nome);
        }
        if (!empty($nome)) {
            $this->paginate['conditions']['or'] = array(
                'lutador_vencedor.nome LIKE' => '%' .trim($nome) . '%',
            );
        }
    }
    
    public function add() {
       parent::add();
       $this->setLutadores();
    }
    
    public function getEditData($id) {
       $this->setLutadores();
        $fields = array(
            'Luta.id',
            'Luta.data_luta',
            'Luta.lutador_vencedor',
            'Luta.lutador_perdedor'
        );
        $conditions = array('Luta.id' => $id);
        $contain = array('lutador_vencedor', 'lutador_perdedor');
        $luta = $this->Luta->find('first', compact('fields', 'conditions', 'contain'));
        return $luta;
    }
    
    public function setLutadores() {
        $fields = array('Lutador.id', 'Lutador.nome');
        $lutadors = $this->Luta->Lutador->find('list', compact('fields'));
        $this->set('lutadors', $lutadors);
    }
}