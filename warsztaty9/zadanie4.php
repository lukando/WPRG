<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<h2>Lista odnośników</h2>

<?php
$plik = "linki.txt";

if (file_exists($plik)) {
    $linie = file($plik, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    echo "<ul>";
    foreach ($linie as $linia) {
        list($adres, $opis) = explode(";", $linia);
        echo "<li><a href=\"$adres\" target=\"_blank\">$opis</a></li>";
    }
    echo "</ul>";
}
else {
    echo "Plik z linkami nie istnieje.";
}
?>
</body>
</html>