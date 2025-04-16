<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>

<form method="post">
    Imię: <input type="text" name="imie" required><br>
    Nazwisko: <input type="text" name="nazwisko" required><br>
    Adres email: <input type="email" name="email" required><br>
    Hasło: <input type="password" name="haslo" required><br>
    Potwierdź hasło: <input type="password" name="haslo2" required><br>
    Wiek: <input type="number" name="wiek" required><br>
    <input type="submit" value="Zarejestruj się">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $imie = htmlspecialchars($_POST["imie"]);

    $nazwisko = htmlspecialchars($_POST["nazwisko"]);

    $email = htmlspecialchars($_POST["email"]);

    $haslo = $_POST["haslo"];
    $haslo2 = $_POST["haslo2"];

    $wiek = (int) $_POST["wiek"];

    if ($haslo !== $haslo2) {
        echo "<h3>Hasła się nie zgadzają!</h3>";
    } else {
        echo "<h3>Twoje dane:</h3>";
        echo "<table>
                <tr><th>Pole</th><th>Wartość</th></tr>
                <tr><td>Imię</td><td>$imie</td></tr>
                <tr><td>Nazwisko</td><td>$nazwisko</td></tr>
                <tr><td>Email</td><td>$email</td></tr>
                <tr><td>Wiek</td><td>$wiek</td></tr>
              </table>";
    }
}
?>

</body>
</html>