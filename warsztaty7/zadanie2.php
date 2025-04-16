<?php

function zadanie2($tablica, $indeks){

    if($indeks < 0 || $indeks >= count($tablica)){
        echo "BŁĄD\n";
    }

    array_splice($tablica, $indeks, 0, '$');

    return $tablica;
}

$tablica = [1, 2, 3, 4, 5];
$indeks = 2;
print_r(zadanie2($tablica, $indeks));

?>
