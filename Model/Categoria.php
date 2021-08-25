<?php

App::uses('AppModel', 'Model');

class Categoria extends AppModel {
    public $hasAndBelongsToMany = array(
        'Lutador'
    );
    
    public $validate = array(
        'nome_categoria' => array(
            'nomeCategoriaNotBlank' => array(
                'rule' => 'notBlank',
                'message' => 'Informe o nome da categoria'
            ),
            'nomeCategoriaLength' => array(
                'rule' => array('minLength', 8),
                'message' => 'O nome da categoria deve possuir no minínimo 8 caracteres'
            ),
            'nomeCategoriaContainsWordPeso' => array(
                'rule' => 'checkIfContainsWordPeso',
                'message' => 'O nome da categoria deve começar a palavra Peso'
            ),
        ),
    );
    
    public function checkIfContainsWordPeso($check) {
        return strpos($check['nome_categoria'], 'Peso');
    }
}

