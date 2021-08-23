<?php
App::uses('AppTest', 'Test/Case/Model');

class LutadorTest extends AppTest {
    
    public $modelName = 'Lutador';
    public $fixtures = array('app.lutador');
    public $Lutador = null;

    public function setUp() {
        $this->Lutador = ClassRegistry::init('Lutador');
    }

    public function testExisteModel() {
        $lutador = ClassRegistry::init('Lutador');
        $this->assertTrue(is_a($this->Lutador, 'Lutador'));

    }
    
    public function testRankEmpty() {
        $field = 'rank';
        $content = null;
        $this->assertEqualsInvalidField($field, $content);
    }
    
    public function testRankPosicaoInexistente() {
        $field = 'rank';
        $content = 16;
        $this->assertEqualsInvalidField($field, $content);
    }
    
    public function testCriarLutadorComRankRepetido() {
        $field = 'rank';
        $content = 5;
        $this->assertEqualsInvalidField($field, $content);
    }
    
    public function testNomeEmpty() {
        $field = 'nome';
        $content = '';
        $this->assertEqualsInvalidField($field, $content);
    }
    
    public function testNomeLength() {
        $field = 'nome';
        $content = 'Ben';
        $this->assertEqualsInvalidField($field, $content);
    }
    
    public function testNomeNaoAceitarNumerosNoNome() {
        $field = 'nome';
        $content = 312142425;
        $this->assertEqualsInvalidField($field, $content);
    }

    public function testAlturaEmpty() {
        $field = 'altura';
        $content = '';
        $this->assertEqualsInvalidField($field, $content);
    }
    
    public function testAlturaRangeValido() {
        $field = 'altura';
        $content = 1.49;
        $this->assertEqualsInvalidField($field, $content);
    }
    
    public function testPesoEmpty() {
        $field = 'peso';
        $content = '';
        $this->assertEqualsInvalidField($field, $content);
    }
    
    public function testPesoRangeValido() {
        $field = 'peso';
        $content = 56.6;
        $this->assertEqualsInvalidField($field, $content);
    }
    
    public function testIdadeEmpty() {
       $field = 'idade';
       $content = '';
       $this->assertEqualsInvalidField($field, $content);
    }
    
    public function testIdadeValida18AnosOuMais() {
        $field = 'idade';
        $content = '2004-04-10';
        $this->assertEqualsInvalidField($field, $content);
    }
    
    public function testVitoriasEmpty() {
       $field = 'vitorias';
       $content = '';
       $this->assertEqualsInvalidField($field, $content);
    }
    
    public function testVitoriasQtdValida() {
        $field = 'vitorias';
        $content = 9;
        $this->assertEqualsInvalidField($field, $content);
    }
    
    public function testDerrotasEmpty() {
        $field = 'derrotas';
        $content = '';
        $this->assertEqualsInvalidField($field, $content);
    }
    
    public function testDerrotasQtdValida() {
        $field = 'derrotas';
        $content = -1;
        $this->assertEqualsInvalidField($field, $content);
    }
    
    public function testEstiloDeLutaLengthValido() {
        $field = 'estilo_de_luta';
        $content = 'aaa';
        $this->assertEqualsInvalidField($field, $content);
    }

    public function assertEqualsInvalidField($field, $content) {
        $this->{$this->modelName}->validationErrors = null;        
        if (empty($this->{$this->modelName}->data)) {
            $this->{$this->modelName}->set(array($field => $content));
        } else {
            $this->{$this->modelName}->data[$this->modelName][$field] = $content;            
        }
        $valid = $this->{$this->modelName}->validates(array('fieldList' => array($field)));
        $invalidFields = $this->{$this->modelName}->validationErrors;
        if (is_array($invalidFields)) {
            $invalidFields = array_keys($invalidFields);            
            $invalidFieldName = $invalidFields[0];
        } else {
            $invalidFieldName = $invalidFields;
        }
        $this->assertFalse($valid);
        $this->assertSame($field, $invalidFieldName);
    }
}

