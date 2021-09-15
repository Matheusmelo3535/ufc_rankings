<?php
$this->extend('/Common/form');
$this->assign('titulo', 'Visualizar Luta');

$formFields = $this->element('formCreate');

$formFields .= $this->Html->div('form-row d-flex justify-content-center',
    $this->Html->div('form-group col-md-2 m-3',
        $this->Form->input('Luta.lutador_vencedor', array('type' => 'select', 'options' => $lutadors, 'class' => 'form-select', 'label' => 'Vencedor', 'disabled' => true))
    ) .
    $this->Html->div('form-group col-md-2 m-3',
        $this->Form->input('Luta.lutador_perdedor', array('type' => 'select' , 'options' => $lutadors, 'class' => 'form-select', 'label' => 'Perdedor', 'disabled' => true))
    )
) .
$this->Html->div('form-row d-flex justify-content-center',
    
    $this->Html->div('form-group col-md-2 m-3',
        $this->Form->input('Luta.data_luta', array(
            'type' => 'text',
            'class' => 'datepicker',
            'label' => 'Data da Luta',
            'disabled' => true
        ))
    )
);

$this->assign('formFields', $formFields);