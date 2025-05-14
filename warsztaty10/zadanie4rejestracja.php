<?php
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $imie = trim($_POST["imie"]);
    $nazwisko = trim($_POST["nazwisko"]);
    $email = trim($_POST["email"]);
    $haslo = $_POST["haslo"];

    if (strlen($haslo) < 6) {
        $errors[] = "Hasło musi mieć minimum 6 znaków!";
    }
    if (!preg_match('/[A-Z]/', $haslo)) {
        $errors[] = "Hasło musi posiadać minimum jedną wielką literę!";
    }
    if (!preg_match('/[0-9]/', $haslo)) {
        $errors[] = "Hasło musi posiadać minimum jedną cyfrę!";
    }
    if (!preg_match('/[^a-zA-Z0-9]/', $haslo)) {
        $errors[] = "Hasło musi posiadać minimum jeden znak specjalny!";
    }

    if (file_exists("uzytkownicy.txt")) {
        $lines = file("uzytkownicy.txt", FILE_IGNORE_NEW_LINES);
        foreach ($lines as $line) {
            list(, , $savedEmail) = explode(";", $line);
            if ($email === $savedEmail) {
                $errors[] = "Użytkownik z tym adresem email już istnieje.";
                break;
            }
        }
    }

    if (empty($errors)) {
        $hashedPassword = password_hash($haslo, PASSWORD_DEFAULT);
        $line = "$imie;$nazwisko;$email;$hashedPassword\n";
        file_put_contents("uzytkownicy.txt", $line, FILE_APPEND);
        header("Location: zadanie4zalogowano.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<h2>Rejestracja</h2>
<?php
if (!empty($errors)) {
    echo "<ul style='color:red;'>";
    foreach ($errors as $e) {
        echo "<li>$e</li>";
    }
    echo "</ul>";
}
?>
<form method="post">
    Imię: <input type="text" name="imie" required><br>
    Nazwisko: <input type="text" name="nazwisko" required><br>
    Email: <input type="email" name="email" required><br>
    Hasło: <input type="password" name="haslo" required><br>
    <button type="submit">Zatwierdź</button>
</form>
</body>
</html>