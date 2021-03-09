<?php
$input_string = $_REQUEST["text"];
$output_string = "";

    function changeLine($string) {
        $count = 0;

        for ($i = 0; $i < strlen($string); $i++) {
            $ch = $string[$i];

            if ($ch == "h") {
                $ch = 4;
                $count++;
            } elseif ($ch == "I") {
                $ch = 1;
                $count++;
            } elseif ($ch == "e") {
                $ch = 3;
                $count++;
            } elseif($ch == "o") {
                $ch = 0;
                $count++;
            }
            yield $ch;
        }
        return $count;
    }

    function changing($str) {
        $generator = changeLine($str);

        foreach ($generator as $item) {
            $output_string = $output_string.$item;
        }
        echo $generator->getReturn()."<br />";
        return $output_string;
    }

    echo "$input_string <br />";
    echo changing($input_string);