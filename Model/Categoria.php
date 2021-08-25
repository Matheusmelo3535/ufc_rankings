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
        'peso_permitido' => array(
            'pesoRangeValidoDasCategorias' => array(
                'rule' => array('range', 56.6, 120.3),
                'message' => 'Peso limite inválido, informe um valor entre 56.7 - 120.2Kg'
            ),
            'pesoNotBlank' => array(
                'rule' => 'notBlank',
                'message' => 'Informe o limite de peso'
            )
        ),
    );
    
    public function checkIfContainsWordPeso($check) {
        $nomeCategoria = $check['nome_categoria'];
        return stripos($nomeCategoria, 'Peso') !== false;
    }
}

