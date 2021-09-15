<?php

$settings = array(
    'template' => array(
        'header' => array(
            array('cell' => array('text' => 'Lutas Cadastradas', 'align' => 'C', 'fontSizePt' => '18', 'lineHeight' => 20))
        ),
        'columnTitles' => array(
            array('line' => array(
                'fontStyle' => 'B',
                'border' => 1,
                array('cell' => array('text' => 'Data da Luta')),
                array('cell' => array('text' => 'Vencedor')),
                array('cell' => array('text' => 'Perdedor'))
            ))
        ),
        'body' => array(
            array('line' => array(
                'border' => 1,
                'alternateFill' => '190',
                array('cell' => array('fieldName' => 'Luta.data_luta')),
                array('cell' => array('fieldName' => 'lutador_vencedor.nome')),
                array('cell' => array('fieldName' => 'lutador_perdedor.nome'))
            ))
        ),
        'sumary' => array(
            array('cell' => array('text' => 'Total de Lutas : [RECORD_COUNT]', 'fontStyle' => 'I', 'lineHeight' => 20))
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
    'records' => $lutas
);
echo $this->Report->create($settings);
?>