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
            'LoginUnique' => array(
                'rule' => 'isUnique',
                'message' => 'Login já existente'
            ),
            'LoginBlank' => array(
                'rule' => 'notBlank',
                'message' => 'Informe o login'
            ),
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

    public function afterSave($created, $options = array()) {
        $this->saveAro();
    }

    public function saveAro() {
        // 1 - verificar se existe um aro para esse usuario
        // 2-  se existir, atualiza, caso contrário cria
        // 3- save Aro

        $aroModel = ClassRegistry::init('Aro');
        $aro = $aroModel->findByForeignKey($this->data['Usuario']['id']);
        $usuarioAro = ['model' => 'Usuario', 'foreign_key' => $this->data['Usuario']['id'], 'parent_id' => $this->data['Usuario']['aro_parent_id']];
        if (empty($aro)) {
            $aroModel->create();
        } else {
            $usuarioAro['id'] = $aro['Aro']['id'];
        }
        $aroModel->save($usuarioAro);
    }


}
?>