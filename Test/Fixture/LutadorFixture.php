<?php
class LutadorFixture extends CakeTestFixture {

    public $name = 'Lutador';
    public $import = array('model' => 'Lutador', 'records' => false);

    public function init() {
        $this->records = array(
            array(
            'rank' => '5',
            'nome' => 'Georginho Jones',
            'altura' =>'1.70',
            'peso' => '56.7',
            'idade' =>'1992-10-05',
            'vitorias' => '34',
            'derrotas' => '3',
            'estilo_de_luta' =>'Freestyle' 
            )
        );
        parent::init();
    }
}