<?php
ini_set('max_execution_time', 900);

if (isset($_POST['send'])) {
    $address = $_POST['address'];
    $address = escapeshellcmd($address);

    if ($address != "") {
        if (isset($_POST["ping"])) {
            exec("ping $address", $output);

            echo "<b>Ip адрес:". getIp($output) ."</b> </br>";

            for ($i = 0; $i < count($output); $i++) {
                $index = strpos($output[$i], "%");
                if ($index != false) {
                    $str = substr($output[$i], 0, $index);
                    $res = substr($str, stripos($str, " "));
                }
            }
            echo (100 - (int)$res) ."% успешных запросов </br>";
        }
        elseif ($_POST['tracert']) {
            $output = array();
            exec("tracert $address", $output, $status);
            if ($status == 1) {
                print_r("Неверный URL сайта");
            } else {
                echo "<b> IP адрес: ". getIp($output). "</b></br>";
                printTrace($output);
            }
        }
    }
} else {
    include "index.html";
}

function getIp($output)
{
    $res = "";
    $str = stristr($output[1], "[");
    $index = strpos($str, "]");
    for ($i = 1; $i < $index; $i++) {
        $res = $res . $str[$i];
    }
    return $res;
}

function printTrace($output) {
    foreach ($output as $item) {
        $pattern = "/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/";
        preg_match($pattern, $item, $word);
        print_r($word[0]." ");
    }
}