<?php

App::uses('AppModel', 'Model');

class Luta extends AppModel {
    
    public $actsAs = array('Containable');
    public $belongsTo = array(
        'lutador_vencedor' => array(
            'className' => 'Lutador',
            'foreignKey' => 'lutador_vencedor'
        ),
        'lutador_perdedor' => array(
            'className' => 'Lutador',
            'foreignKey' => 'lutador_perdedor'
        )
    );
}

