<?php
$dataNasc = new DateTime($this->request->data['Lutador']['idade']);
$currentTime = new DateTime();
$conversaoParaIdade = $currentTime->diff($dataNasc);
$idadeLutador = $conversaoParaIdade->y;
$this->request->data['Lutador']['idade'] = $idadeLutador;

$this->extend('/Common/form');
$this->assign('titulo', 'Visualizar Lutador');

$formFields = $this->element('formCreate');

$formFields .= $this->Html->div('form-row d-flex justify-content-center',
    $this->Html->div('form-group col-md-3 m-3',
        $this->Form->input('Lutador.nome', array('disabled' => true))
    ) .
    $this->Html->div('form-group col-md-2 m-3',
        $this->Form->input('Lutador.altura', array('disabled' => true))
    ) .
    $this->Html->div('form-group col-md-2 m-3',
        $this->Form->input('Lutador.peso', array('disabled' => true))
    )
) .
$this->Html->div('form-row d-flex justify-content-center mb-4',
    $this->Html->div('form-group col-md-4 m-3',
        $this->Form->input('Categoria.Categoria',array(
            'type' => 'select',
            'multiple' => true,
            'label' => 'Categorias de Peso',
            'disabled' => true
        ))
    ) . 
    $this->Html->div('form-group col-md-2 m-3',
        $this->Form->input('Lutador.idade', array(
            'type' => 'text',
            'class' => 'datepicker',
            'label' => 'Idade',
            'disabled' => true
        ))
    )
) .
$this->Html->div('form-row d-flex justify-content-center mb-4',
    $this->Html->div('form-group col-md-1 m-3',
        $this->Form->input('Lutador.vitorias', array('disabled' => true))
        
    ) .
    $this->Html->div('form-group col-md-1 m-3',
        $this->Form->input('Lutador.derrotas', array('disabled' => true))
            
    ) .
    $this->Html->div('form-group col-md-1 m-3',
        $this->Form->input('Lutador.rank', array('disabled' => true))
    ) 
) .
$this->Html->div('form-row d-flex justify-content-center mb-4',
    $this->Html->div('form-group col-md-4 m-3',
        $this->Form->input('Lutador.estilo_de_luta', array('disabled' => true))
    )
);
$this->assign('formFields', $formFields);
?>