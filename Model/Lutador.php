<?php

App::uses('AppModel', 'Model');

class Lutador extends AppModel {
    public $belongsTo = array(
        'Categoria'
    );

    public $validate = array(
        'nome' => array('rule' => 'notBlank', 'message' => 'Informe o nome'),
        'altura' => array('rule' =>'notBlank', 'message' => 'Informe a altura')
    );
    
}
