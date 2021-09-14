<?php
$this->extend('/Common/form');
$this->assign('titulo', 'Novo Lutador');

$formFields = $this->element('formCreate');

$formFields .= $this->Html->div('form-row d-flex justify-content-center',
    $this->Html->div('form-group col-md-3 m-3',
        $this->Form->input('Lutador.nome')
    ) .
    $this->Html->div('form-group col-md-2 m-3',
        $this->Form->input('Lutador.altura')
    ) .
    $this->Html->div('form-group col-md-2 m-3',
        $this->Form->input('Lutador.peso')
    )
) .
$this->Html->div('form-row d-flex justify-content-center mb-4',
    $this->Html->div('form-group col-md-4 m-3',
        $this->Form->input('Categoria.Categoria',array(
            'type' => 'select',
            'multiple' => true,
            'label' => 'Categorias'
        ))
    ) .
    $this->Html->div('form-group col-md-2 m-3',
        $this->Form->input('Lutador.idade', array(
            'type' => 'text',
            'class' => 'datepicker',
            'label' => 'Data de nascimento',
        ))
    )
) .
$this->Html->div('form-row d-flex justify-content-center mb-4',
    $this->Html->div('form-group col-md-1 m-3',
        $this->Form->input('Lutador.vitorias')
    ) .
    $this->Html->div('form-group col-md-1 m-3',
        $this->Form->input('Lutador.derrotas')
    ) .
    $this->Html->div('form-group col-md-1 m-3',
        $this->Form->input('Lutador.rank')
    )
) .
$this->Html->div('form-row d-flex justify-content-center mb-4',
    $this->Html->div('form-group col-md-4 m-3',
        $this->Form->input('Lutador.estilo_de_luta')
    )
);

$this->assign('formFields', $formFields);
$this->Js->buffer('$(".datepicker").datepicker({
    format: "dd/mm/yyyy",
    language: "pt-BR"
    })'
);
?>