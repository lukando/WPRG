<?php
$maxOdwiedziny = 3;

if(isset($_POST["reset"])){
    setcookie('liczba_odwiedzin', 0, time() - 3600);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

if(isset($_COOKIE['liczba_odwiedzin'])){
    $liczbaOdwiedzin = $_COOKIE['liczba_odwiedzin'] + 1;
}
else{
    $liczbaOdwiedzin = 1;
}

setcookie('liczba_odwiedzin', $liczbaOdwiedzin, time() + (365 * 24 * 60 * 60));
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h3>Liczba odwiedzin:</h3>
    <h3><?= $liczbaOdwiedzin ?></h3>

    <?php
        if($liczbaOdwiedzin > $maxOdwiedziny){
            echo "<h5>Odwiedziłeś stronę więcej niż 3 razy!</h5>";
        }
    ?>

    <form method="post">
        <button type="submit" name="reset">Resetuj ciasteczka</button>
    </form>
</body>
</html>
