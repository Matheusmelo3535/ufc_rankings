<?php

$form = $this->Form->create('Luta');
$form .= $this->Form->input('Luta.data_luta');
$form .= $this->Form->input('Luta.lutador_vencedor', array('type' => 'select' , 'options' => $lutadores, 'label' => 'Vencedor' ));
$form .= $this->Form->input('Luta.lutador_perdedor', array('type' => 'select', 'options' => $lutadores, 'label' => 'Perdedor'));
$form .= $this->Form->end('Gravar');

echo $this->Html->tag('h1', 'Nova Luta');
echo $form;
?>