<?php

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

setcookie('liczba_odwiedzin', $liczbaOdwiedzin, time() + (360 * 24 * 60 * 60));
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h2>Sonda Internetowa</h2>
    <form method="post">
        <h4>Kto twoim zdaniem wygra wybory prezydenckie 2025?</h4>
        <?php if($liczbaOdwiedzin <= 1): ?>
            <select id="prezydent">
                <option value="" selected>Wybierz Kandydata</option>
                <option value="trzaskowski">Trzaskowski</option>
                <option value="nawrocki">Nawrocki</option>
                <option value="mentzen">Mentzen</option>
                <option value="zandberg">Zandberg</option>
                <option value="holownia">Hołownia</option>
                <option value="biejat">Biejat</option>
                <option value="braun">Braun</option>
                <option value="senszyn">Senszyn</option>
            </select>
            <button type="submit" name="zatwierdz">Zatwierdź Wybór</button>
        <?php else: ?>
            <h4>Drogi użytkowniku, już oddałeś głos!</h4>
        <?php endif; ?>
        <p></p>
        <button type="submit" name="reset">Resetuj licznik odwiedzin</button>
    </form>
</body>
</html>
