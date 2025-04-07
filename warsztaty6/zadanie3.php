<?php

function sequences_n($pierwszy, $parametr, $liczbaElementow){

    if(!is_numeric($pierwszy) || !is_numeric($liczbaElementow) || !is_numeric($parametr)){
        echo $pierwszy . ", " . $parametr . ", " . $liczbaElementow . ": Parameters must be numeric!" . "\n";
        return;
    }

    if($liczbaElementow < 1){
        echo "The number of elements can not be smaller than 1!" . "\n";
        return;
    }

    echo "Arithmetic: ";
    $arithmeticPoczatek = $pierwszy;
    $geometricPoczatek = $pierwszy;

    for($i = 0; $i < $liczbaElementow; $i++){
        echo $arithmeticPoczatek . " ";
        $arithmeticPoczatek += $parametr;
    }

    echo "\nGeometric: ";
    for($i = 0; $i < $liczbaElementow; $i++){
        echo $geometricPoczatek . " ";
        $geometricPoczatek *= $parametr;
    }

    echo "\n\n";
}

sequences_n(5, 2, 10);
sequences_n(5, -2, 10);
sequences_n(-5, 2, 10);
sequences_n(5, 2.5, 10);
sequences_n(5, 2.5, -10);
sequences_n("start", 2, 10);

?>
