<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_unset();
    session_destroy();
    header("Location: zadanie4logowanie.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<?php if (isset($_SESSION['user'])): ?>
    <h2>Gratulacje, <?= htmlspecialchars($_SESSION['user']) ?>, zalogowałeś się!</h2>
    <form method="post">
        <button type="submit">Wyloguj się</button>
    </form>
<?php else: ?>
    <p>Nie jesteś zalogowany. <a href="zadanie4logowanie.php">Zaloguj się</a></p>
<?php endif; ?>
</body>
</html>