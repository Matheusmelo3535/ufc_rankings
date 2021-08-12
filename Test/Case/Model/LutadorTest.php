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
    
    public function testRank3Caractere() {
        $data = array('Lutador' => array('rank' => 100));
        $saved = $this->Lutador->save($data);
        $this->assertFalse($saved);
    }

    public function testNomeEmpty() {
        $data = array('Lutador' => array('nome' => null));
        $saved = $this->Lutador->save($data); 
        $this->assertFalse($saved);

    }

    public function testAlturaEmpty() {
        $data = array('Lutador' => array('altura' => null));
        $saved = $this->Lutador->save($data); 
        $this->assertFalse($saved);
    }
}

