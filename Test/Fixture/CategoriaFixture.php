<?php
class CategoriaFixture extends CakeTestFixture {
    public $name = 'Categoria';
    public $import = array('model' => 'Categoria', 'records' => false);
    
    public function init() {
        $this->records = array(
            array(
                'nome_categoria' => 'Peso Galo',
                'peso_permitido' => 61.20
            )
            
        );
        parent::init();
    }
    
    
    
}