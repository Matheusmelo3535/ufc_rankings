<?php

$form = $this->Form->create('Usuario');
$form .=
    $this->Html->div('form-row d-flex justify-content-center align-items-center mt-4',
        $this->Html->div('form-group col-md-3 m-1',
            $this->Form->input('Usuario.nome', array('required' => false, 'class' => 'form-control'))
        )
    ) .
    
    $this->Html->div('form-row d-flex justify-content-center align-items-center',
        $this->Html->div('form-group col-md-3 m-1',
            $this->Form->input('Usuario.login', array('required' => false, 'class' => 'form-control'))
        )
    ) .
    
    $this->Html->div('form-row d-flex justify-content-center align-items-center',
        $this->Html->div('form-group col-md-3 m-1',
            $this->Form->input('Usuario.senha', array('class' => 'form-control', 'type' => 'password'))
        )
    ) . 
    
    $this->Html->div('form-row d-flex justify-content-center align-items-center mt-4',
        $this->Html->div('col-md-1 form-group',
            $this->Form->submit('Gravar', array('type' => 'submit', 'class' => 'btn btn-primary', 'div' => false))
        )
);
$form .= $this->Form->end();

echo $form;




















?>