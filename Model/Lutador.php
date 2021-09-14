<?php

App::uses('AppModel', 'Model');
class Lutador extends AppModel {
    public $hasAndBelongsToMany = array(
        'Categoria'
    );
    
    // regex utilizada \pL - Matches anything in the Unicode letter category
    // \pM - Combining marks (e.g. combining diacritics)
    // \p{Zs} - White-space separators
    // u - Pattern and subject strings are treated as UTF-8
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
            'nomeRegexString' => array(
                'rule' => '/^[\pL\pM\p{Zs}.-]+$/u',
                'message' => 'O nome deve conter apenas letras'
            ),
            'nomeLength' => array(
                'rule' => array('minLength', 6),
                'message' => 'O nome deve possuir no minímo 6 caracteres'
            ),
        ),
        'altura' => array(
            'alturaNotBlank' => array(
                'rule' => 'notBlank',
                'message' => 'informe a altura'
            ),
            'alturaRangeValido' => array(
                'rule' => array('range', 1.49, 2.21),
                'message' => 'Altura inválida, informe um valor entre 1.50 - 2.20M'
            ),
        ),
        'peso' => array(
            'pesoNotBlank' => array(
                'rule' => 'notBlank',
                'message' => 'Informe o peso'
            ),
            'pesoRangeValido' => array(
                'rule' => array('range', 56.6, 120.3),
                'message' => 'Peso inválido, informe um valor entre 56.7 - 120.2Kg'
            ),
        ),
        'idade' => array(
            'idadeNotBlank' => array(
                'rule' => 'notBlank',
                'message' => 'Informe a idade'
            ),
            'idadeRangeValido' => array(
                'rule' => 'checarMaiorDeIdade',
                'message' => 'Idade inválida, informe uma idade entre 18 - 50 anos'
            ),
            'idadeIsADate' => array(
                'rule' => array('date', 'dmy'),
                'message' => 'Informe uma data válida'
            )
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
            'estiloLength' => array(
                'rule' => array('minLength', '4'),
                'message' => 'O estilo de luta deve possuir no minímo 4 caracteres'
            ),
            'estiloIsString' => array(
                'rule' => '/^[\pL\pM\p{Zs}.-]+$/u',
                'message' => 'O estilo de luta deve conter apenas letras'
            )
        )
    );
    
    public function checarMaiorDeIdade($check) {
        $dataDeNascimento = strtotime($check['idade']);

        return time() >= strtotime('+18 years', $dataDeNascimento);
    }

    public function beforeSave($options = array()) {
        $continue = true;
        if (!empty($this->data['Lutador']['idade'])) {
            $data = str_replace('/', '-', $this->data['Lutador']['idade']);
            $this->data['Lutador']['idade'] = date('Y-m-d', strtotime($data));
        }

        return $continue;
    }
}
