<?php

$filtro = $this->Form->create('Usuario');
$filtro .= $this->Html->div('row d-flex justify-content-center m-3',
    $this->Html->div('col-md-5 form-group',
        $this->Form->input('Usuario.nome', array('required' => false, 'class' => 'form-control', 'label' => 'Filtrar pelo nome'))
    ) .
    $this->Html->div('col-md-1 form-group align-self-end',
        $this->Js->submit('Filtrar', array('type' => 'submit', 'class' => 'btn btn-primary', 'div' => false, 'update' => '#content'))
    )
);
$filtro .= $this->Form->end();

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
echo $this->Html->tag('h1', 'Lista de usuários cadastrados', array('class' => 'text-center m-5'));

$titulos = array('Nome', 'Login', '');
$tableHeader = $this->Html->tag('thead', $this->Html->tableHeaders($titulos), array('class' => 'table-dark align-middle'));
$tableBody = $this->Html->tableCells($listaDeUsuarios);
$addButton = $this->Js->link('Novo Usuário', '/usuarios/add', array('class' => 'btn btn-primary text-center mb-3', 'update' => '#content'));

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
echo $addButton;
echo $filtro;
echo $this->Html->tag('table', $tableHeader . $tableBody, array('class' => 'table align-middle'));
echo $paginateBar;











if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}