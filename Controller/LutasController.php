<?php

App::uses('AppController', 'Controller');

class LutasController extends AppController {
    
    public function index() {
        $lutas = $this->Luta->find('all');
        $this->set('lutas', $lutas);
    }
    
    public function add() {
       if (!empty($this->request->data)) {
            $this->Luta->create();
            if ($this->Luta->saveAll($this->request->data)) {
                $this->Flash->set('Deu certo');
                $this->redirect('/lutas');
            }
       }
       $fields = array('Lutador.id', 'Lutador.nome');
       $lutadores =  $this->Luta->Lutador->find('list', compact('fields'));
       $this->set('lutadores', $lutadores);
    }    
}

?>