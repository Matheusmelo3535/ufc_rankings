<?php

$this->extend('/Common/index');

$this->assign('titulo', 'Categorias de Peso');

$searchFields = $this->Form->input('Categoria.nome_categoria', array(
    'required' => false,
    'label' => false,
    'class' => 'form-control mb-2 mr-sm-2',
    'div' => false,
    'placeholder' => 'Nome da categoria...'
));
$this->assign('searchFields', $searchFields);

$titulos = array('Nome da Categoria', 'Peso máximo permitido','');
$tableHeaders = $this->Html->tableHeaders($titulos);
$this->assign('tableHeaders', $tableHeaders);

$categoriasListFixed = array();
foreach ($categorias as $categoria) {
    $editLink = $this->Js->link('Editar', '/categorias/edit/' . $categoria['Categoria']['id'], array('update' => '#content'));
    $deleteLink = $this->Js->link('Excluir', '/categorias/delete/' . $categoria['Categoria']['id'],array('update' => '#content'));
    $viewLink = $this->Js->link($categoria['Categoria']['nome_categoria'], '/categorias/view/' . $categoria['Categoria']['id'],array('update' => '#content'));
    
    $categoriasListFixed[] = array(
        'nome_categoria' => $viewLink,
        'peso_permitido' => $categoria['Categoria']['peso_permitido'],
        $editLink . ' ' . $deleteLink
    );
}

$tableCells = $this->Html->tableCells($categoriasListFixed);
$this->assign('tableCells', $tableCells);
?>