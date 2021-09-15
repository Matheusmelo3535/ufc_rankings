<?php
$this->extend('/Common/form');
$this->assign('titulo', 'Alterar Luta');

$formFields = $this->element('formCreate');

$formFields .= $this->Html->div('form-row d-flex justify-content-center',
    $this->Html->div('form-group col-md-2 m-3',
        $this->Form->input('Luta.lutador_vencedor', array('type' => 'select', 'options' => $lutadors, 'class' => 'form-select', 'label' => 'Vencedor'))
    ) .
    $this->Html->div('form-group col-md-2 m-3',
        $this->Form->input('Luta.lutador_perdedor', array('type' => 'select' , 'options' => $lutadors, 'class' => 'form-select', 'label' => 'Perdedor'))
    ) .
    $this->Form->input('Luta.id', array('type' => 'hidden'))
) .
$this->Html->div('form-row d-flex justify-content-center',
    
    $this->Html->div('form-group col-md-2 m-3',
        $this->Form->input('Luta.data_luta', array(
            'type' => 'text',
            'class' => 'datepicker',
            'label' => 'Data da Luta',
        ))
    )
);

$this->assign('formFields', $formFields);
$this->Js->buffer('$(".datepicker").datepicker({
    format: "dd/mm/yyyy",
    language: "pt-BR"
    })'
);

