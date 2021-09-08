<?php

App::uses('AppController', 'Controller');

class LutasController extends AppController {
    public $layout = 'bootstrap';
    public $helpers = array('Js' => array('Jquery'), 'Pdf.report');
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
    
    public function index() {
        $lutas = $this->paginate();
        $this->set('lutas', $lutas);
    }
    
    public function add() {
       if (!empty($this->request->data)) {
           debug($this->request->data);
            $this->Luta->create();
            if (debug($this->Luta->saveAll($this->request->data))) {
                $this->Flash->set('Deu certo');
                
            }
       }
       $fields = array('Lutador.id', 'Lutador.nome');
       $lutadores =  $this->Luta->Lutador->find('list', compact('fields'));
       $this->set('lutadores', $lutadores);
    }    
}

?>