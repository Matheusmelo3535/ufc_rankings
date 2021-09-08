<?php

$controllerName = $this->request->params['controller'];
$actionName = $this->request->params['action'];
$form = $this->Form->create(false);
$form .= $this->fetch('formFields');
if ($actionName != 'view') {
    $form .= $this->Js->submit('Gravar', array('class' => 'btn btn-success m-3', 'div' => false, 'update' => '#content'));
}
$form .=  $this->Js->Link('Voltar', '/' . $controllerName, array('class' => 'btn btn-secondary text-center', 'update' => '#content'));
$form .= $this->Form->end();

echo $this->Html->tag('h1', $this->fetch('titulo'), array('class' => 'text-center m-5'));
echo $form;

if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}
?>