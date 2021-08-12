<?php

$dataNasc = new DateTime($this->request->data['Lutador']['idade']);
$currentTime = new DateTime();
$conversaoParaIdade = $currentTime->diff($dataNasc);
$idadeLutador = $conversaoParaIdade->y;

$view = $this->Html->tag('h2', 'Rank');
$view .= $this->Html->para('', $this->request->data['Lutador']['rank']);
$view .= $this->Html->tag('h2', 'Nome');
$view .= $this->Html->para('', $this->request->data['Lutador']['nome']);
$view .= $this->Html->tag('h2', 'Altura');
$view .= $this->Html->para('', $this->request->data['Lutador']['altura']);
$view .= $this->Html->tag('h2', 'Peso');
$view .= $this->Html->para('', $this->request->data['Lutador']['peso']);
$view .= $this->Html->tag('h2', 'Idade');
$view .= $this->Html->para('', $idadeLutador);
$view .= $this->Html->tag('h2', 'Vitorias');
$view .= $this->Html->para('', $this->request->data['Lutador']['vitorias']);
$view .= $this->Html->tag('h2', 'Derrotas');
$view .= $this->Html->para('', $this->request->data['Lutador']['derrotas']);
$view .= $this->Html->tag('h2', 'Estilo de Luta');
$view .= $this->Html->para('', $this->request->data['Lutador']['estilo_de_luta']);

$view .= $this->Html->tag('h2', 'Categorias de peso');
foreach ($this->request->data['Categoria'] as $categoria) {
    $categorias = $categoria['nome_categoria'];
    $view .= $this->Html->para('', $categorias);
}

$linkVoltar = $this->Html->link('Voltar', '/lutadors');

echo $this->Html->tag('h1', 'Visualizar Lutador');
echo $view;
echo $linkVoltar;


?>