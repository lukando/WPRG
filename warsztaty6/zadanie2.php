<?php

function numbers($wyraz){
    $dlugoscWyrazu = strlen($wyraz);
    $suma = 0;
    $licznik = 0;

    for($i = 0; $i < $dlugoscWyrazu; $i++){
        if(ord($wyraz[$i]) >= 48 && ord($wyraz[$i]) <= 57) {
            $suma += ord($wyraz[$i]) - 48;
            $licznik++;
        }
    }

    if($licznik > 0){
        echo $wyraz . ": " . $suma . " " . "\n";
    }
    else{
        echo $wyraz . ": " . "Parameter must be numeric!" . "\n";
    }
}

numbers("5210");
numbers("-5210");
numbers("5210.5");
numbers("numbers");
?>
