<?php

App::uses('AppModel', 'Model');

class Categoria extends AppModel {
    public $hasAndBelongsToMany = array(
        'Lutador'
    );
}

