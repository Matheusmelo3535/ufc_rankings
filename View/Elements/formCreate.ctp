<?php

$inputDefaults = array(
    'class' => 'form-control',
    'required' => false,
    'error' => array('attributes' => array('class' => 'invalid-feedback'))
);
$formCreate = $this->Form->create(false, array('inputDefaults' => $inputDefaults));

echo $formCreate;