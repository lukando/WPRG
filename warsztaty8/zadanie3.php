<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Operacje na ciągach znaków</title>
    <style>
        body {
            font-family: Arial;
            padding: 20px;
        }

        h2 {
            color: red;
        }

        form, .result {
            margin-top: 20px;
        }

        input[type="text"], select {
            padding: 8px;
            width: 300px;
        }
        button {
            padding: 8px 16px;
            margin-top: 10px;
        }

    </style>
</head>
<body>

<h2>Operacje na ciągach znaków</h2>

<form method="post">
    <input type="text" name="ciag" placeholder="Wprowadź ciąg znaków" required>

    <select name="operacja">

        <option value="reverse">Odwrócenie ciągu znaków</option>

        <option value="upper">Zamiana wszystkich liter na wielkie</option>

        <option value="lower">Zamiana wszystkich liter na małe</option>

        <option value="length">Liczenie liczby znaków</option>
        <option value="trim">Usuwanie białych znaków z początku i końca</option>
    </select>

    <br><br>
    <button type="submit" name="wykonaj">Wykonaj</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ciag = $_POST["ciag"];
    $operacja = $_POST["operacja"];

    if (empty($ciag)) {
        echo "<p class='result'>Wprowadź ciąg znaków!</p>";
    }
    else {
        switch ($operacja) {
            case "reverse":
                $wynik = strrev($ciag);
                break;

            case "upper":
                $wynik = strtoupper($ciag);
                break;

            case "lower":
                $wynik = strtolower($ciag);
                break;
            case "length":
                $wynik = strlen($ciag);
                break;

            case "trim":
                $wynik = trim($ciag);
                break;
        }

        echo "<div class='result'><strong>Wynik:</strong> " . htmlspecialchars($wynik) . "</div>";
    }
}
?>

</body>
</html>