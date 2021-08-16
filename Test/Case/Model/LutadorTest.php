<?php

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
        $data = array('Lutador' => array('rank' => null));
        $saved = $this->Lutador->save($data);
        $this->assertFalse($saved);
    }
    
    public function testRankPosicaoInexistente() {
        $data = array('Lutador' => array('rank' => 100));
        $saved = $this->Lutador->save($data);
        $this->assertFalse($saved);
    }
    
    public function testCriarLutadorComRankRepetido() {
        $data = array('Lutador' => array('rank' => 5));
        $saved = $this->Lutador->save($data);
        $this->assertFalse($saved);
    }
    
    
    public function testNomeEmpty() {
        $data = array('Lutador' => array('nome' => null));
        $saved = $this->Lutador->save($data); 
        $this->assertFalse($saved);
    }
    
    public function testNomeLength() {
        $data = array('Lutador' => array('nome' => 'Matt'));
        $saved = $this->Lutador->save($data); 
        $this->assertFalse($saved);
    }

    public function testAlturaEmpty() {
        $data = array('Lutador' => array('altura' => null));
        $saved = $this->Lutador->save($data); 
        $this->assertFalse($saved);
    }
    
    public function testAlturaRangeValido() {
        $data = array('Lutador' => array('altura' => 1.49));
        $saved = $this->Lutador->save($data);
        $this->assertFalse($saved);
    }
    
    public function testPesoEmpty() {
        $data = array('Lutador' => array('peso' => null));
        $saved = $this->Lutador->save($data);
        $this->assertFalse($saved);
    }
    
    public function testPesoRangeValido() {
        $data = array('Lutador' => array('peso' => 56.6));
        $saved = $this->Lutador->save($data);
        $this->assertFalse($saved);
    }
    
    public function testIdadeEmpty() {
        $data = array('Lutador' => array('idade' => null));
        $saved = $this->Lutador->save($data);
        $this->assertFalse($saved);
    }
    
    public function testIdadeValida18AnosOuMais() {
        $data = array('Lutador' => array('idade' => '2004-04-10'));
        $saved = $this->Lutador->save($data);
        $this->assertFalse($saved);
    }
    
    public function testVitoriasEmpty() {
        $data = array('Lutador' => array('vitorias' => null));
        $saved = $this->Lutador->save($data);
        $this->assertFalse($saved);
    }
    
    public function testVitoriasQtdValida() {
        $data = array('Lutador' => array('vitorias' => 1));
        $saved = $this->Lutador->save($data);
        $this->assertFalse($saved);
    }
    
    public function testDerrotasEmpty() {
        $data = array('Lutador' => array('derrotas' => null));
        $saved = $this->Lutador->save($data);
        $this->assertFalse($saved);
    }
    
    public function testDerrotasQtdValida() {
        $data = array('Lutador' => array('derrotas' => -1));
        $saved = $this->Lutador->save($data);
        $this->assertFalse($saved);
    }
    
    public function testEstiloDeLutaLengthValido() {
        $data = array('Lutador' => array('estilo_de_luta' => 'abc'));
        $saved = $this->Lutador->save($data);
        $this->assertFalse($saved);
    }
}

