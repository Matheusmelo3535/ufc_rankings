<?php
echo $this->Html->div('alert alert-' . $key . ' alert-dismissible fade show', 
    $message . 
    $this->Form->button(
        '',
        array('type' => "button", 'class' => "btn-close", 'data-bs-dismiss' => "alert", 'aria-label' => "Close")
    )
);