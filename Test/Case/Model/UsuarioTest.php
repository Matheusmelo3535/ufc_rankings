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
        $this->assertTrue(is_a($this->Usuario, 'Usuario'));
    }

    public function testCadastroComExito() {
        $data = array('Usuario' => array('nome' => 'Matheuszera', 'login' => 'naosei', 'senha' => 'oioioi'));
        $saved = $this->Usuario->save($data);
        $nomeSaved = $saved['Usuario']['nome'];
        $this->assertSame($nomeSaved, 'Matheuszera');
    }

    public function testNomeEmpty() {
        $field = 'nome';
        $content = '';
        $this->assertEqualsInvalidField($field, $content);
    }

    public function testNomeInvalidSize2char() {
        $field = 'nome';
        $content = 'oi';
        $this->assertEqualsInvalidField($field, $content);
    }

    public function testLoginDuplicado() {
        $field = 'login';
        $content = 'fixtureLogin';
        $this->assertEqualsInvalidField($field, $content);
    }

    public function testLoginBlank() {
        $field = 'login';
        $content = '';
        $this->assertEqualsInvalidField($field, $content);
    }

    public function testSenhaBlank() {
        $field = 'senha';
        $content = '';
        $this->assertEqualsInvalidField($field, $content);
    }
}
