<?php

App::uses('AppModel', 'Model');

class Luta extends AppModel {
    public $hasAndBelongsToMany = array(
        'Lutador' => array(
            'className' => 'Lutador',
            'joinTable' => 'lutadors_lutas',
            'foreignKey' => 'luta_id',
            'associationForeignKey' => 'lutador_id'
        )
    );
}

