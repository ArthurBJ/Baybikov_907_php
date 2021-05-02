<?php
include "Logger.php";
include "LogToFile.php";
include "LogToBrowser.php";

if (isset($_POST['send'])) {
    $text = $_POST['text'];

    if (isset($_POST['logger'])) {
        $logger = $_POST['logger'];

        if ($logger == "logToFile") {
            $filename = $_POST['filename'];
            $res = new LogToFile($filename);
            $res->write($text);
            $res->write(isUpper($text));
        } elseif ($logger == "logToBrowser") {
            if ($_POST['typeofdata']) {
                $typeofdata = $_POST['typeofdata'];
                $res = new LogToBrowser($typeofdata);
                $res->write($text);
                echo "<br/>".isUpper($text);
            }
        }
    }
} else {
    include 'index.html';
}

function isUpper($str) {
    if (strtolower($str) == $str) {
        return " Строка: $str - не содержит заглавные буквы";
    } else return " Строка: $str - содержит заглавные буквы";
}