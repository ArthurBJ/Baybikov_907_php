<?php
    if (isset($_REQUEST["send"])) {
        $text = $_REQUEST["text"];
        $text = explode("\n", $text);
        $stringArr = array();
        $shuffleArr = array();
        $outputArr = array();

        for ($i = 0; $i < count($text); $i++) {
            $stringArr[$i] = explode(" ", $text[$i]);
            $shuffleArr[$i] = explode(" ", $text[$i]);
            shuffle($shuffleArr[$i]);
        }

        $fullArr = array_merge($stringArr, $shuffleArr);

        function cmp($a, $b) {
            return ($a[1] < $b[1]) ? -1 : 1;
        }

        usort($fullArr, "cmp");

        for ($i = 0; $i < count($fullArr); $i++) {
            $outputArr[$i] = implode(" ", $fullArr[$i]);
        }

        foreach ($outputArr as $item) {
            echo $item."<br />";
        }
    } else {
        include "index.html";
    }