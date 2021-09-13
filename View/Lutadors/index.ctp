<?php

$this->extend('/Common/index');

$this->assign('titulo', 'Lutadores TOP 15');

$searchFields = $this->Form->input('Lutador.nome', array(
    'required' => false,
    'label' => false,
    'class' => 'form-control mb-2 mr-sm-2',
    'div' => false,
    'placeholder' => 'Nome...'
));
$this->assign('searchFields', $searchFields);

$titulos = array('Rank','Nome', 'Altura', 'Peso', 'Idade', 'Vitorias', 'Derrotas', 'Estilo de Luta', '');
$tableHeaders = $this->Html->tableHeaders($titulos);
$this->assign('tableHeaders', $tableHeaders);

$lutadoresListFixed = array();
foreach ($lutadors as $lutador) {
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

$tableCells = $this->Html->tableCells($lutadoresListFixed);
$this->assign('tableCells', $tableCells);
?>