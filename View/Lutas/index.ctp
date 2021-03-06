<?php
$this->extend('/Common/index');

$this->assign('titulo', 'Lutas');

$searchFields = $this->Form->input('lutador_vencedor.nome', array(
    'required' => false,
    'label' => false,
    'class' => 'form-control mb-2 mr-sm-2',
    'div' => false,
    'placeholder' => 'Nome do vencedor...'
));
$this->assign('searchFields', $searchFields);

$titulos = array('Data da Luta', 'Vencedor', 'Perdedor', '');
$tableHeaders = $this->Html->tableHeaders($titulos);
$this->assign('tableHeaders', $tableHeaders);

$lutasListFixed = array();
foreach ($lutas as $luta) {
    $editLink = $this->Js->link('Editar', '/lutas/edit/' . $luta['Luta']['id'], array('update' => '#content'));
    $deleteLink = $this->Js->link('Excluir', '/lutas/delete/' . $luta['Luta']['id'], array('update' => '#content'));
    $viewLink = $this->Js->link($luta['Luta']['data_luta'], '/lutas/view/' . $luta['Luta']['id'], array('update' => '#content'));

    $lutasListFixed[] = array(
        'data_luta' => $viewLink,
        'lutador_vencedor' => $luta['lutador_vencedor']['nome'],
        'lutador_perdedor' => $luta['lutador_perdedor']['nome'],
        $editLink . ' ' . $deleteLink
    );
}

$tableCells = $this->Html->tableCells($lutasListFixed);
$this->assign('tableCells', $tableCells);