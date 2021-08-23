<?php

abstract class AppTest extends CakeTestCase {

    protected function assertEqualsInvalidField($field, $content) {
        $this->{$this->modelName}->validationErrors = null;        
        if (empty($this->{$this->modelName}->data)) {
            $this->{$this->modelName}->set(array($field => $content));
        } else {
            $this->{$this->modelName}->data[$this->modelName][$field] = $content;            
        }
        $valid = $this->{$this->modelName}->validates(array('fieldList' => array($field)));
        $invalidFields = $this->{$this->modelName}->validationErrors;
        if (is_array($invalidFields)) {
            $invalidFields = array_keys($invalidFields);            
            $invalidFieldName = $invalidFields[0];
        } else {
            $invalidFieldName = $invalidFields;
        }
        $this->assertFalse($valid);
        $this->assertSame($field, $invalidFieldName);
    } 
}