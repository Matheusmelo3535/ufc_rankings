<?php
$form = $this->Form->create('Lutador');
$form .= $this->Form->input('Lutador.nome');
$form .= $this->Form->hidden('Lutador.id');
$form .= $this->Form->input('Lutador.altura');
$form .= $this->Form->input('Lutador.peso');
$form .= $this->Form->hidden('Lutador.id_categoria', array('value' => 1));
$form .= $this->Form->input('Lutador.idade', array(
    'label' => 'Data de Nascimento',
    'dateFormat' => 'DMY',
    'minYear' => date('Y') - 70
));
$form .= $this->Form->input('Lutador.vitorias');
$form .= $this->Form->input('Lutador.derrotas');
$form .= $this->Form->input('Lutador.rank');
$form .= $this->Form->input('Lutador.estilo_de_luta');
$form .= $this->Form->end('Gravar');

echo $this->Html->tag('h1', 'Alterar Lutador');
echo $form;


?>