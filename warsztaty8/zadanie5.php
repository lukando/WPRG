<?php

function zadanie5($ciag){
    $licznik = 0;
    $przecinek = false;

    for($i = 0; $i < strlen($ciag); $i++){
        if($ciag[$i] == ','){
            $przecinek = true;
        }
        else if($przecinek == true){
            $licznik++;
        }
    }

    echo $licznik;
}

$ciag = "123456,12345";
zadanie5($ciag);

?>
