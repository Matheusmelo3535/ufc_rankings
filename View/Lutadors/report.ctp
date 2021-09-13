<?php
$settings = array(
    'template' => array(
        'header' => array(
            array('cell' => array('text' => 'Lutadores Cadastrados', 'align' => 'C', 'fontSizePt' => '18', 'lineHeight' => 20))
        ),
        'columnTitles' => array(
            array('line' => array(
                'fontStyle' => 'B',
                'border' => 1,
                array('cell' => array('text' => 'Nome')),
                array('cell' => array('text' => 'Rank', 'lineWidth' => '15')),
                array('cell' => array('text' => 'Categoria', 'lineWidth' => '35')),
                array('cell' => array('text' => 'Vitorias', 'lineWidth' => '20')),
                array('cell' => array('text' => 'Derrotas', 'lineWidth' => '20')),
                array('cell' => array('text' => 'Estilo')),
            ))
        ),
        'body' => array(
            array('line' => array(
                'border' => 1,
                'alternateFill' => '190',
                array('cell' => array('fieldName' => 'Lutador.nome')),
                array('cell' => array('fieldName' => 'Lutador.rank', 'lineWidth' => '15')),
                array('cell' => array('fieldName' => 'Categoria.0.nome_categoria', 'lineWidth' => '35')),
                array('cell' => array('fieldName' => 'Lutador.vitorias', 'lineWidth' => '20')),
                array('cell' => array('fieldName' => 'Lutador.derrotas', 'lineWidth' => '20')),
                array('cell' => array('fieldName' => 'Lutador.estilo_de_luta'))
            ))
        ),
        'sumary' => array(
            array('cell' => array('text' => 'Total de Lutadores : [RECORD_COUNT]', 'fontStyle' => 'I', 'lineHeight' => 20))
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
    'records' => $lutadors
);
echo $this->Report->create($settings);
?>