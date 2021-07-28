<?php

App::uses('AppController', 'Controller');
App::uses('Lutador', 'Model');


class LutadorsController extends AppController {
        
    public function index() {
        $lutadores = $this->Lutador->find('all');
        $this->set('lutadores', $lutadores);
    }

    public function add() {
        if (!empty($this->request->data)) {
            $this->Lutador->create();
            if ($this->Lutador->save($this->request->data)) {
                $this->Flash->set('Lutador gravado com êxito.');
                $this->redirect('/lutadors');
            }
        }
    }
    
    public function edit($id = null) {
        if (!empty($this->request->data)) {
            debug($this->request->data['Lutador']);
            if ($this->Lutador->save($this->request->data)) {
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
            $this->request->data = $this->Lutador->find('first', compact('fields', 'conditions'));
        }
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
    }

    public function delete($id) {
        $this->Lutador->delete($id);
        $this->Flash->set('Lutador excluído com êxito.');
        $this->redirect('/lutadors');
    }
}

?>