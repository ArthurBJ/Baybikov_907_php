<?php

namespace logger;

use Psr\Log\LogLevel;
use Psr\Log\LoggerInterface;

class Logger implements LoggerInterface
{
    public $json_array = array();
    public $filename;
    public $file;

    public function log($level, $message, array $context = array())
    {
        $json = ['date' => date("d.m.Y H:i:s"),
            'type' => $level,
            'content' => $message];

        array_push($this->json_array, $json);
    }

    public function __construct($filename) {
        $this->filename = $filename;
        $this->file = fopen($this->filename, 'w');
    }

    public function __destruct() {
        $json = json_encode($this->json_array, JSON_PRETTY_PRINT);
        fwrite($this->file, $json);
        fclose($this->file);
    }

    public function emergency($message, array $context = array())
    {
        $this->log(LogLevel::EMERGENCY, $message, $context);
    }

    public function alert($message, array $context = array())
    {
        $this->log(LogLevel::ALERT, $message, $context);
    }

    public function critical($message, array $context = array())
    {
        $this->log(LogLevel::CRITICAL, $message, $context);
    }

    public function error($message, array $context = array())
    {
        $this->log(LogLevel::ERROR, $message, $context);
    }

    public function warning($message, array $context = array())
    {
        $this->log(LogLevel::WARNING, $message, $context);
    }

    public function notice($message, array $context = array())
    {
        $this->log(LogLevel::NOTICE, $message, $context);
    }

    public function info($message, array $context = array())
    {
        $this->log(LogLevel::INFO, $message, $context);
    }

    public function debug($message, array $context = array())
    {
        $this->log(LogLevel::DEBUG, $message, $context);
    }
}