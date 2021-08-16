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
            'rankPosicaoValida' => array(
                'rule' => array('range', 0, 16),
                'message' => 'Posição no ranking inválida, são válidas de 1 a 15'
            ),
            'rankNotDuplicated' => array(
                'rule' => 'isUnique',
                'on' => 'create',
                'message' => 'Esse rank não está vago'
            ),
        ),        
        'nome' => array(
            'nomeNotBlank' => array(
                'rule' => 'notBlank',
                'message' => 'Informe o nome'
            ),
            'nomeLengthAndString' => array(
                'rule' => '/^[a-z]{6,}$/i',
                'message' => 'O nome deve ter no minimo 6 caracteres e conter apenas letras'
            ),
        ),
        'altura' => array(
            'alturaNotBlank' => array(
                'rule' => 'notBlank',
                'message' => 'informe a altura'
            ),
            'alturaRangeValido' => array(
                'rule' => array('range', 1.49, 2.21),
                'message' => 'Altura inválida, informe um valor entre 1.50 ~ 2.20M'
            ),
        ),
        'peso' => array(
            'pesoNotBlank' => array(
                'rule' => 'notBlank',
                'message' => 'Informe o peso'
            ),
            'pesoRangeValido' => array(
                'rule' => array('range', 56.6, 120.3),
                'message' => 'Peso inválido, informe um valor entre 56.7 ~ 120.2Kg'
            ),
        ),
        'idade' => array(
            'idadeNotBlank' => array(
                'rule' => 'notBlank',
                'message' => 'Informe a idade'
            ),
            'idadeRangeValido' => array(
                'rule' => 'checarMaiorDeIdade',
                'message' => 'Idade inválida, informe uma idade entre 18 ~ 50 anos'
            ),
        ),
        'vitorias' => array(
            'vitoriasNotBlank' => array(
                'rule' => 'notBlank',
                'message' => 'Informe a quantidade de vitórias'
            ),
            'vitoriasQtdValida' => array(
                'rule' => array('comparison', '>=', 10),
                'message' => 'O lutador deve possuir no minímo 10 vítorias para entrar no ranking'   
            )
        ),
        'derrotas' => array(
            'derrotasNotBlank' => array(
                'rule' => 'notBlank',
                'message' => 'Informe a quantidade de derrotas'
            ),
            'derrotasQtdValida' => array(
                'rule' => array('comparison', '>=', 0),
                'message' => 'A quantidade de derrotas deve ser maior ou igual a 0'
            )
        ),
        'estilo_de_luta' => array(
            'estiloIsStringAndLength' => array(
                'rule' => '/^[a-z]{4,}$/i',
                'message' => 'O estilo de luta deve possuir no minímo 4 caracteres e ser formado por letras'
            ),
        )
    );
    
    public function checarRankDuplicado($check) {
        $rankVago = true;
        $checkIfRankExists = $this->find('count', array('conditions' => $check, 'recursive' => -1));
        if ($checkIfRankExists) {
            $rankVago = false;
        }
        return $rankVago;
    }
    
    public function checarMaiorDeIdade($check) {
        $dataDeNascimento = strtotime($check['idade']);
        return time() >= strtotime('+18 years', $dataDeNascimento);
    }
    
}
