<?php
class UsuarioFixture extends CakeTestFixture {
    public $name = 'Usuario';
    public $import = array('model' => 'Usuario', 'records' => false);

    public function init() {
        $this->records = array(
            array(
                'nome' => 'Usuario',
                'login' => 'fixtureLogin',
                'senha' => 'senha123'
            )
        );
        parent::init();
    }
}