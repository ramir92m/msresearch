<?php


class Sampleclass
{
    public $_column = array();
    public $_value = array();
    
    
    public function __construct($arrydata) {
        foreach ($arrydata as $column => $value)
        {
            $this->_column[] = $column;
            $this->_value[] = $value;
        }
    }
}




?>
