<?php

$form = $this->Form->create('Lutador');
$form .= $this->Html->div('container border border-5 m-5',
    $this->Html->div('form-row d-flex justify-content-center',
            $this->Html->div('form-group col-md-3 m-3',
                $this->Form->input('Lutador.nome', array('required' => false, 'class' => 'form-control'))
            
        ). $this->Html->div('form-group col-md-2 m-3',
                $this->Form->input('Lutador.altura', array('required' => false, 'class' =>'form-control'))

        ). $this->Html->div('form-group col-md-2 m-3',
                $this->Form->input('Lutador.peso', array('required' => false, 'class' => 'form-control')))
    ).
    $this->Html->div('form-row d-flex justify-content-center mb-4',
        $this->Html->div('form-group col-md-4 offset-md-2 m-3',
            $this->Form->input('Categoria.Categoria',array(
            'type' => 'select',
            'multiple' => true,
            'class' => 'form-control',
            'label' => 'Categorias'
         ))
         
        ). $this->Html->div('form-group col-md-2 offset-md-2 m-3',
                $this->Form->input('Lutador.idade', array(
                'type' => 'text',
                'class' => 'datepicker',
                'label' => 'Data de nascimento',
                'dateFormat' => 'DMY',
            ))
            
        )
    ).
    $this->Html->div('form-row d-flex justify-content-center mb-4',
        $this->Html->div('form-group col-md-1 m-3',
            $this->Form->input('Lutador.vitorias', array(
                'class' => 'form-control'
            ))
            
        ). $this->Html->div('form-group col-md-1 m-3',
                $this->Form->input('Lutador.derrotas', array(
                    'class' => 'form-control'
                ))
                
        ). $this->Html->div('form-group col-md-1 m-3',
                $this->Form->input('Lutador.rank', array(
                    'class' => 'form-control'
                )))
    ).
    $this->Html->div('form-row d-flex justify-content-center mb-4',
        $this->Html->div('form-group col-md-4 m3',
            $this->Form->input('Lutador.estilo_de_luta', array(
                'class' => 'form-control'
            ))))
);

$optionsFormEnd = array(
    'label' => 'Gravar',
    'class' => 'btn btn-primary',
    'div' => array('class' => 'text-center')
);
$form .= $this->Form->end($optionsFormEnd);

echo $this->Html->tag('h1', 'Novo Lutador', array('class' => 'mt-5 text-center'));
echo $form;
echo $this->Html->Link('Voltar', '/lutadors', array('class' => 'btn btn-secondary text-center'));
?>