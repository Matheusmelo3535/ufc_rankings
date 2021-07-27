<?php

$lutadoresListFixed = array();

foreach ($lutadores as $lutador) {
    $lutadoresListFixed[] = array(
        'nome' => $lutador['Lutador']['nome'],
        'rank' => $lutador['Lutador']['rank'],
        'vitorias' => $lutador['Lutador']['vitorias'],
        'derrotas' => $lutador['Lutador']['derrotas']
    );
}

echo $this->Html->tag('h1', 'Lutadores');

$titulos = array('Nome', 'Rank', 'Vitorias', 'Derrotas');
$tableHeader = $this->Html->tableHeaders($titulos);
$tableBody = $this->Html->tableCells($lutadoresListFixed);

echo $this->Html->tag('table', $tableHeader . $tableBody);





?>