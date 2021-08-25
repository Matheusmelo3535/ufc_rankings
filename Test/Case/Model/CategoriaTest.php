<?php
App::uses('AppTest', 'Test/Case/Model');

class CategoriaTest extends AppTest {
    
    public $modelName = 'Categoria';
    public $fixtures = array('app.categoria');
    public $Categoria = null;
    
    public function setUp() {
        parent::setUp();
        $this->Categoria = ClassRegistry::init('Categoria');
    }

    public function tearDown() {
        parent::tearDown();
        unset($this->Categoria);
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

    public function testNomeCategoriaLength() {
        $field = 'nome_categoria';
        $content = 'Peso';
        $this->assertEqualsInvalidField($field, $content);
    }

    public function testNomeCategoriaContainsPeso() {
        $field = 'nome_categoria';
        $content = 'Leve leve leve';
        $this->assertEqualsInvalidField($field, $content);
    }

    public function testPesoPermitidoNotBlank() {
        $field = 'peso_permitido';
        $content = '';
        $this->assertEqualsInvalidField($field, $content);
    }    
}