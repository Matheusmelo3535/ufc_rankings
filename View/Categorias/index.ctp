<?php

$filtro = $this->Form->create('Categoria');
$filtro .= $this->Html->div('row d-flex justify-content-center m-3',
    $this->Html->div('col-md-5 form-group',
        $this->Form->input('Categoria.nome_categoria', array('required' => false, 'class' => 'form-control', 'label' => 'Filtrar pelo nome'))
    ) .
    $this->Html->div('col-md-1 form-group align-self-end',
        $this->Js->submit('Filtrar', array('type' => 'submit', 'class' => 'btn btn-primary', 'div' => false, 'update' => '#content'))
    )
);
$filtro .= $this->Form->end();
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

echo $this->Html->tag('h1', 'Categorias', array('class' => 'text-center m-3'));

$titulos = array('Nome da Categoria', 'Peso máximo permitido','');
$tableHeader = $this->Html->tag('thead',$this->Html->tableHeaders($titulos), array('class' => 'table-dark align-middle'));
$tableBody = $this->Html->tableCells($categoriasListFixed);
$addButton = $this->Js->link('Nova categoria', '/categorias/add', array('class' => 'btn btn-primary text-center mb-3', 'update' => '#content'));
$this->Paginator->options(array('update' => '#content'));
$navigationLinks = array(
    $this->Paginator->first('Primeira', array('class' => 'page-link')),
    $this->Paginator->prev('Anterior', array('class' => 'page-link', 'tag' => false)),
    $this->Paginator->next('Próxima', array('class' => 'page-link', 'tag' => false)),
    $this->Paginator->last('Última', array('class' => 'page-link')),
);
$paginate = $this->Html->nestedList($navigationLinks, array('class' => 'pagination'), array('class' => 'page-item'));
$paginate = $this->Html->tag('nav', $paginate);
$paginateCount = $this->Paginator->counter(
    '{:page} de {:pages}, exibindo {:current} registros de {:count}, começando em {:start} até {:end}'
);
$paginateBar = $this->Html->div('row',
    $this->Html->div('col-md-6', $paginate) . 
    $this->Html->div('col-md-6', $paginateCount)
);
echo $addButton;
echo $filtro;
echo $this->Html->tag('table', $tableHeader . $tableBody, array('class' => 'table align-middle'));
echo $paginateBar;

if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}
?>