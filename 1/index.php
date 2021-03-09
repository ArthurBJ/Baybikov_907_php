<?php
if (isset($_REQUEST["send"])) {

    $code = $_REQUEST["code"];
    $params = $_REQUEST["params"];
    $array = array(0);
    $cell = 0;

    $codeArray = str_split($code);
    $paramsArray = str_split($params);
    $index = 0;
    $brackets = 0;

    for ($i = 0; $i < count($codeArray); $i++) {
        switch ($codeArray[$i]) {
            case "+":
                $array[$cell]++;
                break;
            case "-":
                $array[$cell]--;
                break;
            case ".":
                print chr($array[$cell]);
                break;
            case ",":
                $array[$cell] = ord($paramsArray[$index++]);
                break;
            case ">":
                $cell++;
                break;
            case "<":
                $cell--;
                break;
            case "[":
                if (!$array[$cell]) {
                    $brackets = 1;
                    while ($brackets) {
                        $i++;
                        if ($codeArray[$i] == "[") {
                            $brackets++;
                        } elseif ($codeArray[$i] == "]") {
                            $brackets--;
                        }
                    }
                }
                break;
            case "]":
                if ($array[$cell]) {
                    $brackets = 1;
                    while ($brackets) {
                        $i--;
                        if ($codeArray == "]") {
                            $brackets++;
                        } elseif ($codeArray[$i] == "[") {
                            $brackets--;
                        }
                    }
                }
                break;
        }
    }
} else {
    include "index.html";
}
?>