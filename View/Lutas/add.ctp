<?php

$form = $this->Form->create('Luta');
$form .= $this->Form->input('Luta.data_luta');
$form .= $this->Form->input('Luta.vencedor');
$form .= $this->Form->input('Lutador.Lutador', array('multiple' => 'multiple', 'type' => 'select', 'options' => $lutadores));
$form .= $this->Form->end('Gravar');

echo $this->Html->tag('h1', 'Nova Luta');
echo $form;
?>