<?php

class LogToBrowser extends Logger {

    private $typeofdata;

    public function __construct($typeofdata) {
        $this->typeofdata = $typeofdata;
    }

    public function write($str)
    {
        switch ($this->typeofdata) {
            case "time":
                $date = date('h:i:s');
                echo "$date $str";
                break;
            case "dateAndTime":
                $date = date("d-m-Y h:i:s");
                echo "$date $str";
                break;
            case "off":
                echo $str;
                break;
        }
    }
}