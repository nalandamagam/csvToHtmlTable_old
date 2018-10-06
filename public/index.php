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
    public static function getRecordsFromCSV($csvFileName) {
        $csvFile = fopen($csvFileName, "r");
        $columnNames = array();
        $isHeaderRecord = true;

        while(!feof($csvFile)){
            $row = fgetcsv($csvFile);
            if($isHeaderRecord){
                $columnNames = $row;
                $isHeaderRecord = false;
            } else {
                $records = recordFactory::createRecord($columnNames, $row);
            }
        }

        fclose($csvFile);
        return $records;
    }
}

class recordFactory {
    public static function createRecord(Array $columnNames = null, $cellValues = null) {
        $record = new record($columnNames, $cellValues);
        return $record;
    }

}

class record {
    public function __construct(Array $columnNames = null, $cellValues = null) {
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