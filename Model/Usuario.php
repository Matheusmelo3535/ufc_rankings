<?php

App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class Usuario extends AppModel {
    public $validate = array(
        'nome' => array(
            'nomeNotBlank' => array(
                'rule' => 'notBlank',
                'message' => 'Informe o nome'
            ),
            'minLength' => array(
                'rule' => array('minLength', 3),
                'message' => 'Informe um nome com mais de 2 caracteres'
            )
        ),
        'login' => array(
            'isUnique' => array(
                'rule' => 'isUnique',
                'message' => 'Login já existente'
            )
        ),
        'senha' => array(
            'senhaNotBlank' => array(
                'rule' => 'notBlank',
                'message' => 'Por favor preencha com a nova senha'
            )
        )
    );    
    
    public function beforeSave($options = array()) {
        if (!empty($this->data['Usuario']['senha'])) {
            $passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
            $this->data['Usuario']['senha'] = $passwordHasher->hash($this->data['Usuario']['senha']);
        }

        return true;
    }
}
?>