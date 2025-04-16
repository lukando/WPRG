<?php

function zadanie4($a, $b, $c, $d){
    $liczba = $c;
    for($i = $a; $i <= $b; $i++){
        $tablica[$i] = $liczba;
        $liczba++;
        if($liczba > $d){
            $liczba = $c;
        }
    }

    return $tablica;
}

$a = 22;
$b = 33;
$c = 1;
$d = 5;

print_r(zadanie4($a, $b, $c, $d));

?>