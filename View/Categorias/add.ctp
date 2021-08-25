<?php

$form = $this->Form->create('Categoria');
$form .= $this->Html->div(
    'container my-3 justify-content-center',
    $this->Html->div(
        'row d-flex justify-content-center',
        $this->Html->div(
                'form-group col-md-3 m-3',
                $this->Form->input('Categoria.nome_categoria', array('required' => false, 'class' => 'form-control', 'label' => 'Nome da Categoria'))
            )
    ).
    $this->Html->div(
        'row d-flex justify-content-center',
        $this->Html->div(
                'form-group col-md-3 m-3',
                $this->Form->input('Categoria.peso_permitido', array('required' => false, 'class' => 'form-control', 'label' => 'Limite de peso da Categoria'))
            )
    )
);

$optionsFormEnd = array(
    'label' => 'Gravar',
    'class' => 'btn btn-primary',
    'div' => array('class' => 'text-center')
);
$form .= $this->Form->end($optionsFormEnd);
echo $form;
