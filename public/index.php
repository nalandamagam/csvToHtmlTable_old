<?php
/**
 * Created by PhpStorm.
 * User: nalanda
 * Date: 10/5/18
 * Time: 11:42 PM
 */

class main {

}

class html {

}

class csv {

}

class recordFactory {

}

class record {
    public function __construct(Array $columnNames = null, $cellValues = null ) {
        $record = array_combine($columnNames, $cellValues);

        foreach ($record as $key => $value){
            $this -> createProperty($key, $value);
        }
    }

    public function createProperty($key = 'key', $value = 'value') {
        $key = '<th>'. $key . '</th>';
        $value = '<td>'. $value . '</td>';
        $this->{$key} = $value;
    }

    public function returnRecordAsArray(){
        $array = (array) $this;
        return $array;
    }
}