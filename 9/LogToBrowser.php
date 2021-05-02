<?php

class LogToFile extends Logger {
    private $file;

    public function __construct($filename)
    {
        $this->file = fopen($filename, 'w');
    }

    public function __destruct() {
        fclose($this->file);
    }

    public function write($str)
    {
        fwrite($this->file, $str);
    }
}