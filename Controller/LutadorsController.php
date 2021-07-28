<?php

App::uses('AppController', 'Controller');
App::uses('Lutador', 'Model');


class LutadorsController extends AppController {
        
    public function index() {
        // $fields = array('Lutador.nome','Lutador.rank', 'Lutador.vitorias', 'Lutador.derrotas');
        // $conditions = array('Lutador.nome LIKE' => '%Deiveson%');
        $lutadores = $this->Lutador->find('all');
        $this->set('lutadores', $lutadores);
    }

    

    public function add() {
        if(!empty($this->request->data)) {
            $this->Lutador->create();
            if ($this->Lutador->save($this->request->data)) {
                $this->Flash->set('Lutador gravado com êxito.');
                $this->redirect('/lutadors');
            }
        }
    } 
}

?>