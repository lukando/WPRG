<?php

function print_primes($poczatek, $koniec){

    if(!is_numeric($poczatek) || !is_numeric($koniec)) {
        echo "Start and stop must be numeric!\n";
        return;
    }

    $poczatek = (int)ceil($poczatek);
    $koniec = (int)floor($koniec);

    if($poczatek > $koniec) {
        [$poczatek, $koniec] = [$koniec, $poczatek];
    }

    if($koniec < 2) {
        echo "Brak liczb pierwszych w podanym zakresie!\n";
        return;
    }

    if($poczatek < 2) {
        $poczatek = 2;
    }

    for($i = $poczatek; $i <= $koniec; $i++){
        if(is_prime($i)) {
            echo $i . " ";
        }
    }

    echo "\n";
}

function is_prime($liczba){
    if($liczba < 2){
        return false;
    }

    for($i = 2; $i <= sqrt($liczba); $i++){
        if($liczba % $i == 0){
            return false;
        }
    }

    return true;
}

print_primes(5, 10);
print_primes(10, 5);
print_primes(5.5, 10);
print_primes(-5, 10);
print_primes("prime", 10);

?>