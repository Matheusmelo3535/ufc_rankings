<?php

App::uses('AppController', 'Controller');

class CategoriasController extends AppController {
    public $layout = 'bootstrap';

    public function index() {
        $categorias = $this->Categoria->find('all');
        $this->set('categorias', $categorias);
    }

   
    
        
    
}

?>