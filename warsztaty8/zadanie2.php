<?php

function zadanie2($ciag){
    $odp = "";

    for($i = 0; $i < strlen($ciag); $i++){
        if($ciag[$i] != "\\" && $ciag[$i] != "/" && $ciag[$i] != ":" && $ciag[$i] != "*" && $ciag[$i] != "?" && $ciag[$i] != "\"" && $ciag[$i] != "<" && $ciag[$i] != ">" && $ciag[$i] != "|" && $ciag[$i] != "+" && $ciag[$i] != "-") {
            $odp .= $ciag[$i];
        }
    }

    echo $odp . "\n";
}

$ciag = "123.23+-|<>?123";
zadanie2($ciag);
?>
