<?php
// App::uses('AppTest', 'Test/Case/Model');

class LutadorTest extends CakeTestCase {

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
        $this->Lutador->validationErrors = null;
        $field = 'rank';
        $content = -1;
        $this->Lutador->set(array($field => $content));
        // debug($this->Lutador->validates(array('fieldList' => array($field))));
        // debug($this->assertEqualsInvalidField($field, $content));
        debug($this);
        exit();
    }
    
    // public function testRankPosicaoInexistente() {
    //     $data = array('Lutador' => array('rank' => 100));
    //     $saved = $this->Lutador->save($data);
    //     $this->assertFalse($saved);
    // }
    
    // public function testCriarLutadorComRankRepetido() {
    //     $data = array('Lutador' => array('rank' => 5));
    //     $saved = $this->Lutador->save($data);
    //     $this->assertFalse($saved);
    // }
    
    
    // public function testNomeEmpty() {
    //     $data = array('Lutador' => array('nome' => null));
    //     $saved = $this->Lutador->save($data); 
    //     $this->assertFalse($saved);
    // }
    
    // public function testNomeLength() {
    //     $data = array('Lutador' => array('nome' => 'Matt'));
    //     $saved = $this->Lutador->save($data); 
    //     $this->assertFalse($saved);
    // }

    // public function testAlturaEmpty() {
    //     $data = array('Lutador' => array('altura' => null));
    //     $saved = $this->Lutador->save($data); 
    //     $this->assertFalse($saved);
    // }
    
    // public function testAlturaRangeValido() {
    //     $data = array('Lutador' => array('altura' => 1.49));
    //     $saved = $this->Lutador->save($data);
    //     $this->assertFalse($saved);
    // }
    
    // public function testPesoEmpty() {
    //     $data = array('Lutador' => array('peso' => null));
    //     $saved = $this->Lutador->save($data);
    //     $this->assertFalse($saved);
    // }
    
    // public function testPesoRangeValido() {
    //     $data = array('Lutador' => array('peso' => 56.6));
    //     $saved = $this->Lutador->save($data);
    //     $this->assertFalse($saved);
    // }
    
    // public function testIdadeEmpty() {
    //     $data = array('Lutador' => array('idade' => null));
    //     $saved = $this->Lutador->save($data);
    //     $this->assertFalse($saved);
    // }
    
    // public function testIdadeValida18AnosOuMais() {
    //     $data = array('Lutador' => array('idade' => '2004-04-10'));
    //     $saved = $this->Lutador->save($data);
    //     $this->assertFalse($saved);
    // }
    
    // public function testVitoriasEmpty() {
    //     $data = array('Lutador' => array('vitorias' => null));
    //     $saved = $this->Lutador->save($data);
    //     $this->assertFalse($saved);
    // }
    
    // public function testVitoriasQtdValida() {
    //     $data = array('Lutador' => array('vitorias' => 1));
    //     $saved = $this->Lutador->save($data);
    //     $this->assertFalse($saved);
    // }
    
    // public function testDerrotasEmpty() {
    //     $data = array('Lutador' => array('derrotas' => null));
    //     $saved = $this->Lutador->save($data);
    //     $this->assertFalse($saved);
    // }
    
    // public function testDerrotasQtdValida() {
    //     $data = array('Lutador' => array('derrotas' => -1));
    //     $saved = $this->Lutador->save($data);
    //     $this->assertFalse($saved);
    // }
    
    // public function testEstiloDeLutaLengthValido() {
    //     $data = array('Lutador' => array('estilo_de_luta' => 'abc'));
    //     $saved = $this->Lutador->save($data);
    //     $this->assertFalse($saved);
    // }


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
        $this->assertEquals($field, $invalidFieldName);
    }
}

