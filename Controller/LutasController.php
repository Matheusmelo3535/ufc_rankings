<?php

App::uses('AppController', 'Controller');

class LutasController extends AppController {
    
    public function index() {
        $lutas = $this->Luta->find('all');
        $this->set('lutas', $lutas);
    }
    
    public function add() {
       $fields = array('Lutador.id', 'Lutador.nome');
       $lutadores =  $this->Luta->Lutador->find('list', compact('fields'));
       debug($lutadores);
       $this->set('lutadores', $lutadores);
    }
    
    
        
    
}

?>