<?php
if (isset($_POST["send"])) {
    $text = $_POST["text"];
    $text = explode("\n", $text);
    $sumWeight = 0;

    for ($i = 0; $i < count($text); $i++) {
        $words[$i] = explode(" ", $text[$i]);
        $weight = (int) end($words[$i]);
        $sumWeight += $weight;
    }

    $json = ["sum" => $sumWeight, "data" => []];
    $calcProb = [];

    for ($i = 0; $i < count($text); $i++) {
        $weight = (int) end($words[$i]);
        $words[$i] = substr($text[$i], 0, - (strlen(end($words[$i])) + 1));
        $words[$i] = str_replace("\r", "", $words[$i]);
        $probability = (float) $weight / $sumWeight;
        array_push($json["data"], ["text" => $words[$i], "weight" => $weight, "probability" => $probability]);
        array_push($calcProb, ["text" => $words[$i], "count" => (int)0, "calculated_probability" => 0]);
    }

    print_r(json_encode($json, JSON_PRETTY_PRINT));
    echo "<br /> <br />";

    include "generator.php";
    $arr2 = $json;
    $arr = generator($calcProb, $arr2);
    print_r(json_encode($arr, JSON_PRETTY_PRINT));
} else {
    include "index.html";
}