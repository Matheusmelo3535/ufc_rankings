<?php

$view = $this->Html->div('container text-center');
$view .= $this->Html->tag('h2', 'Nome da Categoria');
$view .= $this->Html->para('', $this->request->data['Categoria']['nome_categoria']);
$view .= $this->Html->tag('h2', 'Limite de peso');
$view .= $this->Html->para('', $this->request->data['Categoria']['peso_permitido']);

$linkVoltar = $this->Js->link('Voltar', '/categorias', array('update' => '#content'));

echo $this->Html->tag('h1', 'Visualizar Categoria', array('class' => 'm-4 text-center'));
echo $view;
echo $linkVoltar;

if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}
?>