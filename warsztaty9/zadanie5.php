<?php
function czyDozwolonyIP($ip, $plikIP) {
    if (!file_exists($plikIP)) {
        return false;
    }

    $dozwolone = file($plikIP, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    return in_array($ip, $dozwolone);
}

$ipUzytkownika = $_SERVER['REMOTE_ADDR'];
$plikIP = "ip.txt";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Strona warunkowa</title>
</head>
<body>
<h2>Witaj użytkowniku!</h2>

<?php
if (czyDozwolonyIP($ipUzytkownika, $plikIP)) {
    echo "<p>Masz dostęp do specjalnej wersji strony.</p>";

}
else {
    echo "<p>To jest standardowa wersja strony.</p>";
}

echo "<p>Twój adres IP to: <strong>$ipUzytkownika</strong></p>";
?>
</body>
</html>