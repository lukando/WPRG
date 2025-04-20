<?php

function zadanie1($ciag){
    echo strtoupper($ciag) . "\n";
    echo strtolower($ciag) . "\n";

    for($i = 0; $i < strlen($ciag); $i++){
        if($i == 0){
            echo strtoupper($ciag[$i]);
        }
        else{
            echo strtolower($ciag[$i]);
        }
    }
    echo "\n";

    for($i = 0; $i < strlen($ciag); $i++){
        if($i == 0 || $ciag[$i - 1] == ' '){
            echo strtoupper($ciag[$i]);
        }
        else{
            echo strtolower($ciag[$i]);
        }
    }
    echo "\n";
}

$ciag = "LeBron James rEXL abc";
zadanie1($ciag);

?>