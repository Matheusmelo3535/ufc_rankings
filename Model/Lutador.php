<?php

App::uses('AppModel', 'Model');

class Lutador extends AppModel {
    public $hasAndBelongsToMany = array(
        'Categoria'
    );

    public $validate = array(
        'rank' => array(
            'rankNotEmpty' => array(
                'rule' => 'notBlank',
                'message' => 'Informe o rank'
            ),
            'rankAlphaNumeric' => array(
                'rule' => 'alphaNumeric',
                'message' => 'Apenas números ou letras são permitidos nesse campo'
            ),
            'rankLength' => array(
                'rule' => array('maxLength', 2),
                'message' => 'Máximo de 2 caracteres nesse campo'
            )
        ),        

        'nome' => array(
            'nomeNotEmpty' => array(
                'rule' => 'notBlank',
                'message' => 'Informe o nome'
            ),
            'nomeLengthAndString' => array(
                'rule' => '/^[a-z]{6,}$/i',
                'message' => 'O nome deve ter no minimo 6 caracteres e conter apenas letras'
            ),
        ),
        'altura' => array('rule' =>'notBlank', 'message' => 'Informe a altura'),
        'peso' => array('rule' => 'notBlank', 'message' => 'Informe o peso'),
        'idade' => array('rule' => 'notBlank', 'message' => 'Informe a idade'),
        'vitorias' => array('rule' => 'notBlank', 'message' => 'Informe a quantidade de vitórias'),
        'derrotas' => array('rule' => 'notBlank', 'message' => 'Informe a quantidade de derrotas'),
        'estilo_de_luta' => array('rule' => 'notBlank', 'message' => 'Informe o estilo de luta do lutador')
    );
    
}
