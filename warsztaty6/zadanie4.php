<?php

function mnozenieMacierzy($A, $B){
    $wierszeA = count($A);
    $wierszeB = count($B);
    $kolumnyA = count($A[0]);
    $kolumnyB = count($B[0]);

    if($kolumnyA != $wierszeB){
        echo "Nie można pomnożyć tych macierzy! Wymiary są niezgodne!" . "\n";
        return;
    }

    $wynik = [];
    for($i = 0; $i < $wierszeA; $i++){
        for($j = 0; $j < $kolumnyB; $j++){
            $wynik[$i][$j] = 0;
        }
    }
    for($i = 0; $i < $wierszeA; $i++){
        for($j = 0; $j < $kolumnyB; $j++){
            for($k = 0; $k < $kolumnyA; $k++){
                $wynik[$i][$j] += $A[$i][$k] * $B[$k][$j];
            }

            echo $wynik[$i][$j] . " ";
        }
        echo "\n";
    }
}

$A = [
    [1, 2, 3],
    [4, 5, 6]
];

$B = [
    [7, 8],
    [9, 10],
    [11, 12]
];

mnozenieMacierzy($A, $B);

?>

