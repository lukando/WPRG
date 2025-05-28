<?php

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "war12zad2";

$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
$message = "";

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['add_person'])){
    $firstname = trim($_POST['firstName']);
    $lastname = trim($_POST['lastName']);
    $email = trim($_POST['email']);

    $sql = "INSERT INTO Person (Person_firstname, Person_secondname, Person_email) VALUES ('$firstname','$lastname','$email')";

    if(mysqli_query($conn, $sql)){
        $message = "Osoba '" . $firstname . " " . $lastname . "' została dodana!";
    }
    else{
        $message = "Błąd podczas dodawania osoby: " . mysqli_error($conn);
    }
}

if(isset($_POST['add_car'])){
    $model = trim($_POST['model']);
    $price = trim($_POST['price']);
    $day_of_buy = trim($_POST['dayOfBuy']);
    $person_id = trim($_POST['person_id']);

    $sql = "INSERT INTO Cars (Cars_model, Cars_price, Cars_day_of_buy, Person_id) VALUES ('$model','$price','$day_of_buy','$person_id')";
    if(mysqli_query($conn, $sql)){
        $message = "Samochód: " . $model . " " . $price . " " . $day_of_buy . " " . $person_id . ", został dodany!";
    }
}

$persons = [];
$sql_select_persons = "SELECT Person_id, Person_Firstname, Person_Secondname FROM Person ORDER BY Person_Secondname, Person_Firstname";
$resultpersons = mysqli_query($conn, $sql_select_persons);

if($resultpersons){
    while($row = mysqli_fetch_assoc($resultpersons)){
        $persons[] = $row;
    }
}
else{
    $message = "Błąd podczas pobierania listy osób: " . mysqli_error($conn);
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zadanie 2</title>
    <link href="kolory.css" rel="stylesheet">
</head>
<body>
    <div>
        <h1>Manage MySQL Database</h1>

        <?php if(!empty($message)){
            echo "<p>" . $message . "</p>";
        } ?>

        <h3>Add Person</h3>

        <form method="post">
            <input type="text" placeholder="First Name" name="firstName" required><br>
            <input type="text" placeholder="Last Name" name="lastName" required><br>
            <input type="email" placeholder="Email" name="email" required><br>
            <button type="submit" name="add_person">Add Person</button>
        </form>

        <h3>Add Car</h3>

        <form method="post">
            <input type="text" placeholder="Model" name="model" required><br>
            <input type="text" placeholder="Price" name="price" required><br>
            <input type="date" placeholder="Day Of Buy" name="dayOfBuy" required><br>
            <select name="person_id" required>
                <option value="">--Wybierz Osobę--</option>
                <?php foreach ($persons as $person): ?>
                    <option value="<?php echo htmlspecialchars($person['Person_id']); ?>">
                        <?php echo htmlspecialchars($person['Person_Firstname'] . ' ' . $person['Person_Secondname']); ?>
                    </option>
                <?php endforeach; ?>            </select>
            <button type="submit" name="add_car">Add Car</button>
        </form>

        <h3>Persons</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            <tr>
                <td><?php echo $person['Person_id']; ?></td>
                <td><?php echo $person['Person_Firstname']; ?></td>
                <td><?php echo $person['Person_Secondname']; ?></td>
                <td><?php echo $person['Person_email']; ?></td>
                <td></td>
            </tr>
        </table>

        <h3>Cars</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Model</th>
                <th>Price</th>
                <th>Day Of Buy</th>
                <th>Person ID</th>
            </tr>
            <tr>
            </tr>
        </table>
    </div>
</body>
</html>
