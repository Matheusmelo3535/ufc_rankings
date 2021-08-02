<?php

App::uses('AppModel', 'Model');

class Categoria extends AppModel {
    public $hasMany = array(
        'Lutador'
    );
}

