<?php

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "war12zad1";
$tableName = "student";

$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
$message = "";

if($conn){
    echo "You are connected!";
}else{
    echo "You are NOT connected!";
}

if (isset($_POST['delete_table'])) {
    $sql_drop = "DROP TABLE IF EXISTS $tableName";
    if ($conn->query($sql_drop) === TRUE) {
        $message = "Tabela $tableName została pomyślnie usunięta.<br>";
    } else {
        $message = "Błąd podczas usuwania tabeli: " . $conn->error . "<br>";
    }
}

$sql_check = "SHOW TABLES LIKE '$tableName'";
$result = $conn->query($sql_check);

if ($result->num_rows > 0) {
    if (!isset($_POST['delete_table'])) {
        $message = "Tabela $tableName już istnieje.";
    }
}
else {
    $sql_create = "CREATE TABLE $tableName (
        StudentID INT,
        Firstname VARCHAR(255),
        Secondname VARCHAR(255),
        Salary INT,
        DateOfBirth DATE
    )";

    if ($conn->query($sql_create) === TRUE) {
        $message .= "Tabela $tableName została pomyślnie utworzona.";
        $message_type = "success";
    }
    else {
        $message .= "Błąd podczas tworzenia tabeli: " . $conn->error;
        $message_type = "error";
    }
}


?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zad 1</title>
</head>
<body>
    <div>
        <h1>Manage MySql Table</h1>

        <?php if(!empty($message)): ?>
            <div><?php echo $message; ?></div>
        <?php endif; ?>

        <form method="post" action="">
            <button type="submit" name="delete_table">Delete Table</button>
        </form>
    </div>
</body>
</html>
