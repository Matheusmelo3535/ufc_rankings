<?php

App::uses('AppController', 'Controller');

class CategoriasController extends AppController {
    
    public function index() {
        $categorias = $this->Categoria->find('all');
        $this->set('categorias', $categorias);
    }
    
        
    
}

?>