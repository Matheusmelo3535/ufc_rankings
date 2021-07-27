<?php

App::uses('AppController', 'Controller');
App::uses('Lutador', 'Model');


class LutadorsController extends AppController {
        
    public function index() {
        // $lutadores = array(
        //     array('Lutador' => array('nome' => 'Kamaru Usman', 'rank' => 'C', 'vitorias' => '18', 'derrotas' => '0')),
        //     array('Lutador' => array('nome' => 'Robert Whittaker', 'rank' => '1', 'vitorias' => '28', 'derrotas' => '4')),
        //     array('Lutador' => array('nome' => 'Robertinho Clayson', 'rank' => '7', 'vitorias' => '19', 'derrotas' => '3')),
        //     array('Lutador' => array('nome' => 'Jon Jones', 'rank' => 'C', 'vitorias' => '32', 'derrotas' => '0')),
        // );
        
        
        $lutadores = $this->Lutador->find('all');
        $this->set('lutadores', $lutadores);
    }
    
}




?>