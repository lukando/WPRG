<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator</title>
    <style>
        body {
            background-color: #111;
            color: white;
            font-family: Arial, sans-serif;
        }
        h2, form{
            border-bottom: 2px solid #555;
            padding-bottom: 5px;
        }
        .result {
            margin-top: 15px;
        }
    </style>
</head>
<body>

<div class="container">

    <div>
        <h2>Kalkulator Prosty</h2>
        <form method="post">
            <input type="number" name="a" required>

            <select name="dzialanie">
                <option value="dodawanie">Dodawanie</option>
                <option value="odejmowanie">Odejmowanie</option>
                <option value="mnozenie">Mnożenie</option>
                <option value="dzielenie">Dzielenie</option>
            </select>

            <input type="number" name="b" required>

            <input type="submit" name="oblicz_prosty" value="Oblicz">
        </form>

        <div class="result">
        <?php
        if (isset($_POST['oblicz_prosty'])) {
            $a = $_POST['a'];
            $b = $_POST['b'];
            $dzialanie = $_POST['dzialanie'];
            if (!is_numeric($a) || !is_numeric($b)) {
                echo "Wprowadź poprawne liczby.";
            } else {
                switch ($dzialanie) {
                    case 'dodawanie': 
                        $wynik = $a + $b; 
                        break;
                    case 'odejmowanie': 
                        $wynik = $a - $b; 
                        break;
                    case 'mnozenie': 
                        $wynik = $a * $b; 
                        break;
                    case 'dzielenie':
                        $wynik = ($b != 0) ? $a / $b : "Błąd: Dzielenie przez 0!";
                        break;
                }
                echo "Wynik: $wynik";
            }
        }
        ?>
        </div>
    </div>

    <div>
        <h2>Kalkulator Zaawansowany</h2>
        <form method="post">

            <input type="text" name="liczba" placeholder="Wprowadź wartość" required>

            <select name="operacja">
                <option value="cos">Cosinus</option>
                <option value="sin">Sinus</option>
                <option value="tan">Tangens</option>
                <option value="binNaDec">Binarne na Dziesiętne</option>
                <option value="decNaBin">Dziesiętne na Binarne</option>
                <option value="decNaHex">Dziesiętne na Szesnastkowe</option>
                <option value="hexNaDec">Szesnastkowe na Dziesiętne</option>
            </select>
            <input type="submit" name="oblicz_zaaw" value="Oblicz">
        </form>

        <div class="result">
        <?php
        if (isset($_POST['oblicz_zaaw'])) {
            $liczba = $_POST['liczba'];
            $operacja = $_POST['operacja'];
            $wynik = "";

            switch ($operacja) {
                case 'cos':
                    if (is_numeric($liczba)) {
                        $wynik = cos(deg2rad($liczba));
                    } 
                    else {
                        $wynik = "Wprowadź poprawną liczbę.";
                    }
                    break;
                case 'sin':
                    if (is_numeric($liczba)) {
                        $wynik = sin(deg2rad($liczba));
                    } 
                    else {
                        $wynik = "Wprowadź poprawną liczbę.";
                    }
                    break;
                case 'tan':
                    if (is_numeric($liczba)) {
                        $wynik = tan(deg2rad($liczba));
                    } 
                    else {
                        $wynik = "Wprowadź poprawną liczbę.";
                    }
                    break;
                case 'binNaDec':
                    if (preg_match('/^[01]+$/', $liczba)){
                        $wynik = bindec($liczba);
                    }
                    else {
                        $wynik = "Niepoprwna liczba binarna!";
                    }
                    break;
                case 'decNaBin':
                    if(is_numeric($liczba)) {
                        $liczba = (int) $liczba;
                        $wynik = decbin($liczba);
                    }
                    else {
                        $wynik = "Niepoprawna liczba dziesiętna!";
                    }
                    break;
                case 'decNaHex':
                    if(is_numeric($liczba)) {
                        $liczba = (int) $liczba;
                        $wynik = strtoupper(dechex($liczba));
                    }
                    else {
                        $wynik = "Niepoprawna liczba dziesiętna!";
                    }
                    break;
                case 'hexNaDec':
                    if(ctype_xdigit($liczba)) {
                        $wynik = hexdec($liczba);
                    }
                    else{
                        $wynik = "Niepoprawna liczba szesnastkowa!";
                    }
                    break;

                default:
                    $wynik = "Nieznana operacja.";
            }

            echo "<strong>Wynik:</strong> $wynik";
        }
        ?>
        </div>
    </div>
</div>

</body>
</html>