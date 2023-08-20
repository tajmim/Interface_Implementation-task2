<?php

interface Logger {
    public function log($message);
}

class FileLogger implements Logger {
    private $filename;

    public function __construct($filename) {
        $this->filename = $filename;
    }

    public function log($message) {
        $timestamp = date('Y-m-d H:i:s');
        $logMessage = "$timestamp: $message\n";
        file_put_contents($this->filename, $logMessage, FILE_APPEND);
    }
}

class ConsoleLogger implements Logger {
    public function log($message) {
        $timestamp = date('Y-m-d H:i:s');
        echo "$timestamp: $message\n";
    }
}


    $fileLogger = new FileLogger('log.txt');
    $fileLogger->log('This is a log message from the FileLogger.');

    $consoleLogger = new ConsoleLogger();
    $consoleLogger->log('This is a log message from the ConsoleLogger.');








?>