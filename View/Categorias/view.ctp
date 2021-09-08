<?php

$this->extend('/Common/form');

$this->assign('titulo', 'Visualizar Categoria de Peso');

$formFields .= $this->Html->div(
    'container my-3 justify-content-center',
    $this->Html->div(
        'row d-flex justify-content-center',
        $this->Html->div(
                'form-group col-md-3 m-3',
                $this->Form->input('Categoria.nome_categoria', array(
                    'required' => false, 
                    'class' => 'form-control', 
                    'label' => 'Nome da Categoria', 
                    'disabled' => true
                    )
                )
            )
    ).
    $this->Html->div(
        'row d-flex justify-content-center',
        $this->Html->div(
                'form-group col-md-3 m-3',
                $this->Form->input('Categoria.peso_permitido', array(
                    'required' => false, 
                    'class' => 'form-control', 
                    'label' => 'Limite de peso da Categoria',
                    'disabled' => true
                    )
                )
            ) . 
            $this->Form->input('Categoria.id', array('type' => 'hidden'))
    )
);

$this->assign('formFields', $formFields);
?>