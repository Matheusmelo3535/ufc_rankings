<?php
class LutaFixture extends CakeTestFixture {
    public $name = 'Luta';
    public $import = array('model' => 'Luta', 'records' => false);

    public function init() {
        $this->records = array(
            array(
                'data_luta' => '2021-09-10',
                'lutador_vencedor' => '1',
                'lutador_perdedor' => '2'
            )
        );
        parent::init();
    }
}