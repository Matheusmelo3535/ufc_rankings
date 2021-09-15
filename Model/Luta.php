<?php

App::uses('AppModel', 'Model');

class Luta extends AppModel {
    
    public $actsAs = array('Containable');
    public $belongsTo = array(
        'Lutador',
        'lutador_vencedor' => array(
            'className' => 'Lutador',
            'foreignKey' => 'lutador_vencedor'
        ),
        'lutador_perdedor' => array(
            'className' => 'Lutador',
            'foreignKey' => 'lutador_perdedor'
        )
    );
    
    public function beforeSave($options = array()) {
        $continue = true;
        if (!empty($this->data['Luta']['data_luta'])) {
            $data = str_replace('/', '-', $this->data['Luta']['data_luta']);
            $this->data['Luta']['data_luta'] = date('Y-m-d', strtotime($data));
        }

        return $continue;
    }
}

