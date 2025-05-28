<?php

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "war12zad3";

$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
$message = "";

if($conn){
    echo "Connection succeeded";
}

if(isset($_POST["register"])){
    $firstname = trim($_POST["firstname"]);
    $lastname = trim($_POST["lastname"]);
    $email = trim($_POST["email"]);
    $age = $_POST["age"];
    $password = $_POST["password"];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (User_firstname, User_lastname, User_email, User_age, User_password) VALUES ('$firstname','$lastname','$email','$age','$hashed_password')";

    if(mysqli_query($conn, $sql)){
        $message = "User: " . $firstname . " "  . $lastname . " "  . $email . " "  . $age . " "  . $hashed_password . " "  . " created!";
    }
}

$user_count = 0;
$sql_count = "SELECT COUNT(*) as total_users FROM users";
$result_count = mysqli_query($conn, $sql_count);

if ($result_count) {
    $row_count = mysqli_fetch_assoc($result_count);
    $user_count = $row_count['total_users'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>zad3</title>
    <link href="kolory.css" type="text/css" rel="stylesheet">
</head>
<body>
    <div>
        <h1>Registration Form</h1>

        <?php echo $message; ?>

        <form method="post">
            <input type="text" name="firstname" placeholder="First Name" required><br>
            <input type="text" name="lastname" placeholder="Last Name" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="number" name="age" placeholder="Age" required><br>
            <input type="password" name="password" placeholder="password" required><br>
            <button type="submit" name="register">Register</button>
        </form>


        <br><br>
        <h3>Users registered: </h3>
        <h5><?php echo $user_count; ?></h5>
    </div>
</body>
</html>
