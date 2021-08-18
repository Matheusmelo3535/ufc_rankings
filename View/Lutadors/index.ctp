<?php

$lutadoresListFixed = array();
foreach ($lutadores as $lutador) {
    $editLink = $this->Html->link('Editar', '/lutadors/edit/' . $lutador['Lutador']['id']);
    $deleteLink = $this->Html->link('Excluir', '/lutadors/delete/' . $lutador['Lutador']['id']);
    $viewLink = $this->Html->link($lutador['Lutador']['nome'], '/lutadors/view/' . $lutador['Lutador']['id']);
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
$addButton =  $this->Html->link('Novo Lutador', '/lutadors/add', array('class' => 'btn btn-primary text-center mb-3'));

echo $addButton;
echo $this->Html->tag('table', $tableHeader . $tableBody, array('class' => 'table align-middle'));
$this->Paginator->options(array('update' => '#content'));
$links = array(
    $this->Paginator->first('Primeira', array('class' => 'page-link')),
    $this->Paginator->prev('Anterior', array('class' => 'page-link')),
    $this->Paginator->next('Próxima', array('class' => 'page-link')),
    $this->Paginator->last('Última', array('class' => 'page-link'))
);
$paginate = $this->Html->nestedList($links, array('class' => 'pagination'), array('class' => 'page-item'));
$paginate = $this->Html->tag('nav', $paginate);
$paginateCount = $this->Paginator->counter(
    '{:page} de {:pages}, mostrando {:current} registros de {:count}, começando em {:start} até {:end}'
);
echo $paginateBar = $this->Html->div('row', 
    $this->Html->div('col-md-6', $paginate) . 
    $this->Html->div('col-md-6', $paginateCount)
);

?>