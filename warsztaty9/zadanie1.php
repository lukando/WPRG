<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>zadanie 1</title>
</head>
<body>
    <h2>Podaj datę urodzenia</h2>
    <form method="get">
        <input type="date" name="data" required>
        <button type="submit" name="wykonaj">submit</button>
    </form>

    <?php

    if(isset($_GET["data"])){
        $dataurodzin = $_GET["data"];

        if(strtotime($dataurodzin)){
            echo "<h2>Wyniki:</h2>";
            echo "Dzień tygodnia urodzin: " . dzientygodnia($dataurodzin) . "<br>";
            echo "Wiek: " . ileLat($dataurodzin) . "<br>";
            echo "Dni do urodzin: " . dniDoUrodzin($dataurodzin) . "<br>";
        }
    }

    function dzienTygodnia($data){
        $dni = ['Niedziela', 'Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota'];
        $timestamp = strtotime($data);
        $dzien = date("w", $timestamp);
        return $dni[$dzien];
    }

    function ileLat($data){
        $dataUrodzin = new DateTime($data);
        $dzisiejszyDzien = new DateTime();
        $wiek = $dataUrodzin->diff($dzisiejszyDzien);
        return $wiek->y;
    }


    function dniDoUrodzin($data){
        $dzisiejszyDzien = new DateTime();
        $urodziny = DateTime::createFromFormat("Y-m-d", $data);
        $najblizsze = DateTime::createFromFormat('Y-m-d', $dzisiejszyDzien->format('Y') . '-' . $urodziny->format('m-d'));

        if ($najblizsze < $dzisiejszyDzien) {
            $najblizsze->modify('+1 year');
        }

        $roznica = $dzisiejszyDzien->diff($najblizsze);
        return $roznica->days;
    }
    ?>
</body>
</html>