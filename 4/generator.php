<?php
function generator($calcProb, $arr2){
    $sumWeight = $arr2["sum"];
    $arr = $arr2["data"];
    $ran = getRandom($sumWeight, $arr);

    foreach ($ran as $value){
        $index = array_search($value, $arr);
        $count =  $calcProb[$index]["count"]++;
        $calcProb[$index]["calculated_probability"] = $count/10000;
    }
    return $calcProb;
}

function getRandom($sumWeight, $arr){

    for ($i = 0; $i < 10000; $i++){
        $count = -1;
        $weight = 0;
        $ran = mt_rand(1 , $sumWeight);

        while ($weight < $ran){
            $count++;
            $weight += (int)$arr[$count]["weight"];
        }
        yield $arr[$count];
    }
}