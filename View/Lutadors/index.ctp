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

echo $this->Html->tag('h1', 'Lutadores');

$titulos = array('Rank','Nome', 'Altura', 'Peso', 'Idade', 'Vitorias', 'Derrotas', 'Estilo de Luta', '');
$tableHeader = $this->Html->tableHeaders($titulos);
$tableBody = $this->Html->tableCells($lutadoresListFixed);
$addButton =  $this->Html->link('Novo Lutador', '/lutadors/add');

echo $addButton;
echo $this->Html->tag('table', $tableHeader . $tableBody);

?>