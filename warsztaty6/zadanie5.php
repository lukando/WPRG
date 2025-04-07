<?php

function pangramChecker($zdanie){
    $maleZdanie = strtolower($zdanie);
    $dlugoscZdania = strlen($maleZdanie);

    for($i = 97; $i <= 122; $i++){
        $licznik = 0;
        for($j = 0; $j < $dlugoscZdania; $j++){
            if(chr($i) == $maleZdanie[$j]){
                $licznik++;
            }
        }

        if($licznik == 0){
            echo "Podane słowo nie jest pangramem!" . "\n";
            return;
        }
    }

    echo "Podane słowo jest pangramem!" . "\n";
}

pangramChecker("The quick brown fox jumps over the lazy dog.");
pangramChecker("Abc");
?>