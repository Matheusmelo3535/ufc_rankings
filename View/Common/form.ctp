<?php

$controllerName = $this->request->params['controller'];
$actionName = $this->request->params['action'];

$form = $this->fetch('formFields');
$form .= $this->Html->div('d-grid gap-2 col-1  d-flex justify-content-center align-items-center mx-auto mb-3');
if ($actionName != 'view') {
    $form .= $this->Js->submit('Gravar', array('class' => 'btn btn-success m-1', 'div' => false, 'update' => '#content'));
}
$form .=  $this->Js->Link('Voltar', '/' . $controllerName, array('class' => 'btn btn-secondary m-1', 'update' => '#content'));
$form .= $this->Form->end();

echo $this->Html->tag('h1', $this->fetch('titulo'), array('class' => 'text-center m-5'));
echo $form;

$this->Js->buffer('$(".form-error").addClass("is-invalid");');

if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}
?>