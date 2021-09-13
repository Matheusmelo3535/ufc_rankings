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
        'contain' => array('lutador_vencedor', 'lutador_perdedor' => array('fields' => array('nome'))),
        'limit' => 5,
        'order' => array('Luta.data_luta' => 'asc')
    );
    
    public function setPaginateConditions() {
        // if ($this->request->is('post') && !empty($this->request->data['Usuario']['nome'])) {
        //     $this->paginate['conditions']['Usuario.nome LIKE'] = '%' . trim($this->request->data['Usuario']['nome']) . '%';
        // }
    }
    
    public function add() {
       parent::add();
       $fields = array('Lutador.id', 'Lutador.nome');
       $lutadores =  $this->Luta->Lutador->find('list', compact('fields'));
       $this->set('lutadores', $lutadores);
    }    
}

?>