<?php

function zadanie4($ciag){
    $ciag = strtolower($ciag);
    $liczbaSamoglosek = 0;

    for($i = 0; $i < strlen($ciag); $i++){
        if($ciag[$i] == 'a' || $ciag[$i] == 'e' || $ciag[$i] == 'i' || $ciag[$i] == 'o' || $ciag[$i] == 'u'){
            $liczbaSamoglosek++;
        }
    }

    echo "Liczba samoglosek: ".$liczbaSamoglosek."\n";
}

$ciag = "Ala ma niebieskiego kota";
zadanie4($ciag);

?>