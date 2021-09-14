<?php
$this->extend('/Common/index');
$this->assign('titulo', 'Usuários');

$searchFields = $this->Form->input('Usuario.nome', array(
    'required' => false,
    'label' => false,
    'class' => 'form-control mb-2 mr-sm-2',
    'div' => false,
    'placeholder' => 'Nome...'
));
$this->assign('searchFields', $searchFields);

$titulos = array('Nome','Login', '');
$tableHeaders = $this->Html->tableHeaders($titulos);
$this->assign('tableHeaders', $tableHeaders);

$listaDeUsuarios = array();
foreach ($usuarios as $usuario) {
    $editLink = $this->Js->link('Editar', '/usuarios/edit/' . $usuario['Usuario']['id'], array('update' => '#content'));
    $deleteLink = $this->Js->link('Excluir', '/usuarios/delete/' . $usuario['Usuario']['id'], array('update' => '#content'));
    $viewLink = $this->Js->link($usuario['Usuario']['nome'], '/usuarios/view/' . $usuario['Usuario']['id'], array('update' => '#content'));

    $listaDeUsuarios[] = array(
        'nome' => $viewLink,
        'login' => $usuario['Usuario']['login'],
        $editLink . '   ' . $deleteLink
    ); 
}

$tableCells = $this->Html->tableCells($listaDeUsuarios);
$this->assign('tableCells', $tableCells);