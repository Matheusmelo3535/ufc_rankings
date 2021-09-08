<?php

$controllerName = $this->request->params['controller'];
$addButton =  $this->Js->link('Novo', '/' . $controllerName . '/add' , array('class' => 'btn btn-success m-2', 'update' => '#content'));
$reportButton = $this->Html->link('Imprimir', '/' . $controllerName . '/report', array('class' => 'btn btn-primary m-2', 'target' => '_blank'));

$filtro = $this->Form->create(false, array('class' => 'form-inline'));
$filtro .= $this->Js->submit('Filtrar', array('class' => 'btn btn-primary mb-2', 'div' => false, 'update' => '#content'));
$filtro .= $this->fetch('searchFields'); 
$filtro .= $this->Form->end(); 

$filtroBar = $this->Html->div('row mb-3 mt-3 d-flex align-items-end',
    $this->Html->div('col-md-3', $filtro) . 
    $this->Html->div('col-md-6', $addButton . $reportButton)
);

$tableHeaders = $this->fetch('tableHeaders');
$header = $this->Html->tag('thead', $tableHeaders , array('class' => 'table-dark align-middle'));
$tableCells = $this->fetch('tableCells');
$table = $this->Html->tag('table', $header . $tableCells, array('class' => 'table align-middle'));

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
echo $this->Flash->render('warning'); 
echo $this->Flash->render('success'); 

echo $this->Html->tag('h1', $this->fetch('titulo'), array('class' => 'text-center m-5'));
echo $filtroBar;
echo $table;
echo $paginateBar;

if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}
?>