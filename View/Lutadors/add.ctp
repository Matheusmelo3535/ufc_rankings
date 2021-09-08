<?php

$this->extend('/Common/form');

$this->assign('titulo', 'Novo Lutador');
$formFields .= 
    $this->Html->div('form-row d-flex justify-content-center',
            $this->Html->div('form-group col-md-3 m-3',
                $this->Form->input('Lutador.nome', array('required' => false, 'class' => 'form-control'))
            
        ). $this->Html->div('form-group col-md-2 m-3',
                $this->Form->input('Lutador.altura', array('required' => false, 'class' =>'form-control'))

        ). $this->Html->div('form-group col-md-2 m-3',
                $this->Form->input('Lutador.peso', array('required' => false, 'class' => 'form-control')))
    ).
    $this->Html->div('form-row d-flex justify-content-center mb-4',
        $this->Html->div('form-group col-md-4 offset-md-2 m-3',
            $this->Form->input('Categoria.Categoria',array(
            'type' => 'select',
            'multiple' => true,
            'class' => 'form-control',
            'label' => 'Categorias'
         ))
         
        ). $this->Html->div('form-group col-md-2 offset-md-2 m-3',
                $this->Form->input('Lutador.idade', array(
                'type' => 'text',
                'class' => 'datepicker',
                'label' => 'Data de nascimento',
            ))
        )
    ).
    $this->Html->div('form-row d-flex justify-content-center mb-4',
        $this->Html->div('form-group col-md-1 m-3',
            $this->Form->input('Lutador.vitorias', array(
                'class' => 'form-control'
            ))
            
        ). $this->Html->div('form-group col-md-1 m-3',
                $this->Form->input('Lutador.derrotas', array(
                    'class' => 'form-control'
                ))
                
        ). $this->Html->div('form-group col-md-1 m-3',
                $this->Form->input('Lutador.rank', array(
                    'class' => 'form-control'
                )))
    ).
    $this->Html->div('form-row d-flex justify-content-center mb-4',
        $this->Html->div('form-group col-md-4 m3',
            $this->Form->input('Lutador.estilo_de_luta', array(
                'class' => 'form-control'
))));

$this->assign('formFields', $formFields);
$this->Js->buffer('$(".datepicker").datepicker({
    format: "dd/mm/yyyy",
    language: "pt-BR"
    })'
);
?>