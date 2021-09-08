<?php

App::uses('AppModel', 'Model');

class Luta extends AppModel {
    
    public $belongsTo = array(
        'Lutador'
    );
    
}

