<?php
$this->extend('/Common/form');
$this->assign('titulo', 'Visualizar Usuário');

$formFields = $this->element('formCreate');
$formFields .= $this->Html->div('form-row d-flex justify-content-center align-items-center mt-4',
    $this->Html->div('form-group col-md-3 m-1',
        $this->Form->input('Usuario.nome', array('disabled' => true))
    )
) .
$this->Html->div('form-row d-flex justify-content-center align-items-center',
    $this->Html->div('form-group col-md-3 m-1',
        $this->Form->input('Usuario.login', array('disabled' => true))
    )
) .
$this->Html->div('form-row d-flex justify-content-center align-items-center',
    $this->Html->div('form-group col-md-3 m-3',
        $this->Form->input('Usuario.aro_parent_id', array(
            'type' => 'select',
            'label' => array('text' => 'Nível de Acesso'),
            'options' => $aros,
            'disabled' => true
        ))
    )
);
$this->assign('formFields', $formFields);