<?php

$form = $this->Form->create('Usuario');
$form .= 
    $this->Html->div('form-row d-flex justify-content-center align-items-center mt-5',
        $this->Html->div('form-group col-md-3 m-1',
            $this->Form->input('Usuario.login', array('required' => false, 'class' => 'form-control', 'error' => array('attributes' => array('class' => 'invalid-feedback'))))
        )
    ) .
    
    $this->Html->div('form-row d-flex justify-content-center align-items-center',
        $this->Html->div('form-group col-md-3 m-1',
            $this->Form->input('Usuario.senha', array('class' => 'form-control', 'type' => 'password', 'error' => array('attributes' => array('class' => 'invalid-feedback'))))
        )
    ) . 
    
    $this->Html->div('form-row d-flex justify-content-center align-items-center mt-4',
        $this->Html->div('col-md-3 form-group',
            $this->Form->submit('Entrar', array('class' => 'btn btn-primary mb-3', 'div' => false))
        )
);
$form .= $this->Flash->render('danger'); 
$form .= $this->Flash->render('warning'); 
$form .= $this->Form->end();

echo $form;

$this->Js->buffer('$(".form-error").addClass("is-invalid");');

if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}




















?>