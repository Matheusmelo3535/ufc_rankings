<?php
$form = $this->Form->create('Lutador');
$form .= $this->Form->input('Lutador.nome');
$form .= $this->Form->input('Lutador.altura');
$form .= $this->Form->input('Lutador.peso');
$form .= $this->Form->input('Lutador.idade');
$form .= $this->Form->input('Lutador.vitorias');
$form .= $this->Form->input('Lutador.derrotas');
$form .= $this->Form->input('Lutador.rank');
$form .= $this->Form->input('Lutador.estilo_de_luta');
$form .= $this->Form->end();

echo $this->Html->tag('h1', 'Novo Lutador');
echo $form;


?>