<?php

$categoriasListFixed = array();
foreach ($categorias as $categoria) {
    $editLink = $this->Html->link('Editar', '/categorias/edit/' . $categoria['Categoria']['id']);
    $deleteLink = $this->Html->link('Excluir', '/categorias/delete/' . $categoria['Categoria']['id']);
    $viewLink = $this->Html->link($categoria['Categoria']['nome_categoria'], '/categorias/view/' . $categoria['Categoria']['id']);
    
    $categoriasListFixed[] = array(
        'nome_categoria' => $viewLink,
        'peso_permitido' => $categoria['Categoria']['peso_permitido'],
        $editLink . ' ' . $deleteLink
    );
}

echo $this->Html->tag('h1', 'Categorias', array('class' => 'text-center m-3'));

$titulos = array('Nome da Categoria', 'Peso máximo permitido','');
$tableHeader = $this->Html->tag('thead',$this->Html->tableHeaders($titulos), array('class' => 'table-dark align-middle'));
$tableBody = $this->Html->tableCells($categoriasListFixed);
$addButton = $this->Html->link('Nova categoria', '/categorias/add', array('class' => 'btn btn-primary text-center mb-3'));

echo $addButton;
echo $this->Html->tag('table', $tableHeader . $tableBody, array('class' => 'table align-middle'));
?>