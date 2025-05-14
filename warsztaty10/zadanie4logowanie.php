<?php
session_start();
$blad = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $haslo = $_POST['haslo'];

    if (file_exists("uzytkownicy.txt")) {
        $lines = file("uzytkownicy.txt", FILE_IGNORE_NEW_LINES);
        foreach ($lines as $line) {
            list($imie, $nazwisko, $zapisanyEmail, $zapisaneHaslo) = explode(";", $line);
            if ($email === $zapisanyEmail && password_verify($haslo, $zapisaneHaslo)) {
                $_SESSION['user'] = "$imie $nazwisko";
                header("Location: zadanie4zalogowano.php");
                exit;
            }
        }
    }

    $blad = "Nieprawidłowy email lub hasło.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<h2>Logowanie</h2>
<?php if ($blad): ?>
    <p><?= $blad ?></p>
<?php endif; ?>
<form method="post">
    Email: <input type="email" name="email" required><br>
    Hasło: <input type="password" name="haslo" required><br>
    <button type="submit">Zatwierdź</button>
</form>
</body>
</html>
