<?php
App::uses('AppTest', 'Test/Case/Model');

class CategoriaTest extends AppTest {
    
    public $modelName = 'Categoria';
    public $fixtures = array('app.categoria');
    public $Categoria = null;
    
    public function setUp() {
        $this->Categoria = ClassRegistry::init('Categoria');
    }
    
    public function testExisteModel() {
        $categoria = ClassRegistry::init('Categoria');
        $this->assertTrue(is_a($this->Categoria, 'Categoria'));
    }
    
    public function testNomeCategoriaEmpty() {
        $field = 'nome_categoria';
        $content = '';
        $this->assertEqualsInvalidField($field, $content);
    }
    
    
    
    
    
    
}