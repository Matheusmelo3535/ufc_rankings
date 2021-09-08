<?php
$settings = array(
    'template' => array(
        'header' => array(
            array('cell' => array('text' => 'Categorias de Peso Cadastradas', 'align' => 'C', 'fontSizePt' => '18', 'lineHeight' => 20))
        ),
        'columnTitles' => array(
            array('line' => array(
                'fontStyle' => 'B',
                'border' => 1,
                array('cell' => array('text' => 'Nome da Categoria')),
                array('cell' => array('text' => 'Peso máximo permitido(KG)')),
            ))
        ),
        'body' => array(
            array('line' => array(
                'border' => 1,
                array('cell' => array('fieldName' => 'Categoria.nome_categoria')),
                array('cell' => array('fieldName' => 'Categoria.peso_permitido')),
            ))
        ),
        'sumary' => array(
            array('cell' => array('text' => 'Total de Categorias de Peso : [RECORD_COUNT]', 'fontStyle' => 'I', 'lineHeight' => 20))
        ),
        'footer' => array(
            array('line' => array(
                'border' => 'T',
                'fontSizePt' => 10,
                array('cell' => array('text' => 'Impresso em [DATE]', 'fontStyle' => 'I', 'lineHeight' => 10)),
                array('cell' => array('text' => 'Páginas: [PAGE]/[PAGES]', 'fontStyle' => 'I', 'lineHeight' => 10, 'align' => 'R')),
            ))
        ),
    ),
    'records' => $categorias
);
echo $this->Report->create($settings);
?>