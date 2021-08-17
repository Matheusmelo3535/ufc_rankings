<?php

$form = $this->Form->create('Lutador');
$form .= $this->Html->div('container');
$form .= $this->Html->div('row d-flex justify-content-center');
$form .= $this->Html->div('col-md-3 mb-3');
$form .= $this->Form->input('Lutador.nome', array('required' => false, 'class' => 'form-control borda-redonda'));
$form .= $this->Form->input('Lutador.altura', array('required' => false));
$form .= $this->Form->input('Lutador.peso');
$form .= $this->Form->input('Categoria.Categoria', array('multiple' => 'multiple', 'type' => 'select', 'options' => $categorias));
$form .= $this->Form->input('Lutador.idade', array(
    'label' => 'Data de Nascimento',
    'dateFormat' => 'DMY',
    'minYear' => date('Y') - 70
));
$form .= $this->Form->input('Lutador.vitorias');
$form .= $this->Form->input('Lutador.derrotas');
$form .= $this->Form->input('Lutador.rank', array('required' => false));
$form .= $this->Form->input('Lutador.estilo_de_luta');
$form .= $this->Form->end('Gravar');
echo $this->Html->tag('h1', 'Novo Lutador');
echo $form;
?>