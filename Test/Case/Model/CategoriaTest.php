<?php
App::uses('AppTest', 'Test/Case/Model');

class CategoriaTest extends AppTest {
    
    public $modelName = 'Categoria';
    public $fixtures = array('app.categoria');
    public $Categoria = null;
    
    public function setUp() {
        $this->Categoria = ClassRegistry::init('Categoria');
    }
    
    
    
    
    
    
}