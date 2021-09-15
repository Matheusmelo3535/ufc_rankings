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
            $nome = $this->request->data['Luta']['lutador_vencedor_or_lutador_perdedor'];
            $this->Session->write('Luta.lutador_vencedor_or_lutador_perdedor', $nome);
        } else {
            $nome = $this->Session->read('Luta.lutador_vencedor_or_lutador_perdedor');
            $this->request->data('Luta.lutador_vencedor_or_lutador_perdedor', $nome);
        }
        if (!empty($nome)) {
            $this->paginate['conditions']['or'] = array(
                'Luta.lutador_vencedor LIKE' => '%' .trim($nome) . '%',
                'Luta.lutador_perdedor LIKE' => '%' . trim($nome) . '%'
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

?>