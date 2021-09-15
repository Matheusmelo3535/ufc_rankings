<?php
App::uses('AppTest', 'Test/Case/Model');

class UsuarioTest extends AppTest {
    
    public $modelName = 'Usuario';
    public $fixtures = array('app.usuario');
    public $Usuario = null;
    
    public function setUp() {
        parent::setUp();
        $this->Usuario = ClassRegistry::init('Usuario');
    }
    
    public function tearDown() {
        parent::tearDown();
        unset($this->Usuario);
    }
    
    public function testExisteModel() {
        $usuario = ClassRegistry::init('Usuario');
        $this->assertTrue(is_a($this->Usuario, 'Usuario'));
    }
}
