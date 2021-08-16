<?php

$categoriasListFixed = array();
foreach ($categorias as $categoria) {
    $editLink = $this->Html->link('Editar', 'categorias/edit/' . $categoria['Categoria']['id']);
    $deleteLink = $this->Html->link('Excluir', '/categorias/delete/' . $categoria['Categoria']['id']);
    $viewLink = $this->Html->link($categoria['Categoria']['nome_categoria'], '/categorias/view/' . $categoria['Categoria']['id']);
    
    $categoriasListFixed[] = array(
        'nome_categoria' => $viewLink,
        'peso_permitido' => $categoria['Categoria']['peso_permitido'],
        $editLink . ' ' . $deleteLink
    );
}

echo $this->Html->tag('h1', 'Categorias');

$titulos = array('Nome da Categoria', 'Peso máximo permitido','');
$tableHeader = $this->Html->tableHeaders($titulos);
$tableBody = $this->Html->tableCells($categoriasListFixed);
$addButton = $this->Html->link('Nova categoria', '/categorias/add');

echo $addButton;
echo $this->Html->tag('table', $tableHeader . $tableBody);
?>