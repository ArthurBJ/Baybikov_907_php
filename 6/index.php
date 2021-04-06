<?php
$file = fopen("text.txt", "r");
$data = parse_ini_file("index.ini", true, INI_SCANNER_TYPED);
while (!feof($file)) {
    $res = "";
    $str = fgets($file);
    $symbol = substr($str, 0, 3);
    if($data["first_rule"]["symbol"] == $symbol){
        switch ($data["first_rule"]['upper']) {
            case "true":
                echo strtoupper($str)."<br />";
                break;
            case "false":
                echo strtolower($str)."<br />";
                break;
        }
    } else if ($data["second_rule"]["symbol"] == $symbol){
        $strArr = str_split($str);
        if ($data['second_rule']['direction'] == "+") {
            for ($i = 1; $i < count($strArr); $i++) {
                if (is_numeric($strArr[$i]) && $strArr[$i] != 9) {
                    $strArr[$i]++;
                } else if (is_numeric($strArr[$i]) && $strArr[$i] == 9) {
                    $strArr[$i] = 0;
                }
            }
        } else if ($data['second_rule']['direction'] == "-") {
            for ($i = 1; $i < count($strArr); $i++) {
                if (is_numeric($strArr[$i]) && $strArr[$i] != 0) {
                    $strArr[$i]--;
                } else if (is_numeric($strArr[$i]) && $strArr[$i] == 0) {
                    $strArr[$i] = 9;
                }
            }
        }
        print_r(implode($strArr)."<br/>");
    } else if ($data["third_rule"]["symbol"] == $symbol){
        echo str_replace($data["third_rule"]["delete"], "", $str)."<br />";
    } else{
        echo $str."<br>";
    }
}
fclose($file);