<?php
App::uses('AppTest', 'Test/Case/Model');

class LutaTest extends AppTest {
    
    public $modelName = 'Luta';
    public $fixtures = array('app.luta');
    public $Luta = null;
    
    public function setUp() {
        parent::setUp();
        $this->Luta = ClassRegistry::init('Luta');
    }
    
    public function tearDown() {
        parent::tearDown();
        unset($this->Luta);
    }
    
    public function testExisteModel() {
        $this->assertTrue(is_a($this->Luta, 'Luta'));
    }

    public function testLutaCadastradaComExito() {
        $data = array('Luta' => array(
            'data_luta' => '2021-09-15',
            'lutador_vencedor' => '1',
            'lutador_perdedor' => '2'
        ));
        $saved = $this->Luta->save($data);
        $dataLutaSaved = $saved['Luta']['data_luta'];
        $this->assertSame($dataLutaSaved, '2021-09-15');
    }
}
