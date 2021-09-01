<?php

$filtro = $this->Form->create('Lutador');
$filtro .= $this->Html->div('row d-flex justify-content-center m-3',
    $this->Html->div('col-md-5 form-group',
        $this->Form->input('Lutador.nome', array('required' => false, 'class' => 'form-control', 'label' => 'Filtrar pelo nome'))
    ) .
    $this->Html->div('col-md-1 form-group align-self-end',
        $this->Js->submit('Filtrar', array('type' => 'submit', 'class' => 'btn btn-primary', 'div' => false, 'update' => '#content'))
    )
);
$filtro .= $this->Form->end();
$lutadoresListFixed = array();
foreach ($lutadores as $lutador) {
    $editLink = $this->Js->link('Editar', '/lutadors/edit/' . $lutador['Lutador']['id'], array('update' => '#content'));
    $deleteLink = $this->Js->link('Excluir', '/lutadors/delete/' . $lutador['Lutador']['id'], array('update' => '#content'));
    $viewLink = $this->Js->link($lutador['Lutador']['nome'], '/lutadors/view/' . $lutador['Lutador']['id'], array('update' => '#content'));
    $dataNasc = new DateTime($lutador['Lutador']['idade']);
    $currentTime = new DateTime();
    $conversaoParaIdade = $currentTime->diff($dataNasc);
    $idadeLutador = $conversaoParaIdade->y;
    
    $lutadoresListFixed[] = array(
        'rank' => $lutador['Lutador']['rank'],
        'nome' => $viewLink,
        'altura' => $lutador['Lutador']['altura'],
        'peso' => $lutador['Lutador']['peso'],
        'idade' =>$idadeLutador,
        'vitorias' => $lutador['Lutador']['vitorias'],
        'derrotas' => $lutador['Lutador']['derrotas'],
        'estilo_de_luta' => $lutador['Lutador']['estilo_de_luta'],
        $editLink . ' ' . $deleteLink
    );
}
echo $this->Html->tag('h1', 'TOP 15 do UFC', array('class' => 'text-center m-5'));

$titulos = array('Rank','Nome', 'Altura', 'Peso', 'Idade', 'Vitorias', 'Derrotas', 'Estilo de Luta', '');
$tableHeader = $this->Html->tag('thead',$this->Html->tableHeaders($titulos), array('class' => 'table-dark align-middle'));
$tableBody = $this->Html->tableCells($lutadoresListFixed);
$addButton =  $this->Js->link('Novo Lutador', '/lutadors/add', array('class' => 'btn btn-primary text-center mb-3', 'update' => '#content'));

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
?>