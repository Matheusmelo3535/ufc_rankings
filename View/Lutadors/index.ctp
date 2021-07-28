<?php

$lutadoresListFixed = array();
foreach ($lutadores as $lutador) {
    $editLink = $this->Html->link('Editar', '/lutadors/edit/' . $lutador['Lutador']['id_lutador']);
    $dataNasc = new DateTime($lutador['Lutador']['idade']);
    $currentTime = new DateTime();
    $conversaoParaIdade = $currentTime->diff($dataNasc);
    $idadeLutador = $conversaoParaIdade->y;
    
    $lutadoresListFixed[] = array(
        'nome' => $lutador['Lutador']['nome'],
        'altura' => $lutador['Lutador']['altura'],
        'peso' => $lutador['Lutador']['peso'],
        'idade' =>$idadeLutador,
        'vitorias' => $lutador['Lutador']['vitorias'],
        'derrotas' => $lutador['Lutador']['derrotas'],
        'rank' => $lutador['Lutador']['rank'],
        'estilo_de_luta' => $lutador['Lutador']['estilo_de_luta'],
        $editLink
    );
}

echo $this->Html->tag('h1', 'Lutadores');

$titulos = array('Nome', 'Altura', 'Peso', 'Idade', 'Vitorias', 'Derrotas', 'Rank', 'Estilo de Luta', '');
$tableHeader = $this->Html->tableHeaders($titulos);
$tableBody = $this->Html->tableCells($lutadoresListFixed);
$addButton =  $this->Html->link('Novo Lutador', '/lutadors/add');

echo $addButton;
echo $this->Html->tag('table', $tableHeader . $tableBody);






?>