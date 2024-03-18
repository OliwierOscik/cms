<?php

$email = $_REQUEST['email'];
$password = $_REQUEST['password'];

$email = filter_var($email, FILTER_SANITIZE_EMAIL);

$db = new mysqli("localhost", "root" , "", "bazazcms");
//ręcznie
//$q = "SELECT * FROM user WHERE email = '$email'";
//$db->query("SELECT * FROM user WHERE email = '$email");
//echo $q;

//auto
$q = $db->prepare("SELECT * FROM user email = ? LIMIT 1");
$q->bind_param("s", $email);
$q->execute();
$result = $q->get_result();

$userRow = $result->fetch_assoc();


//inny rodzaj polaczenia 
//$d = mysqli_connect("localhost", "root" , "", "bazazcms");

//$passwd = "tajneHaslo";
//$hash = password_hash($passwd,PASSWORD_ARGON2I);
//echo $hash;

?>

<form action="index2.php" method="get">
    <label for="emailInput">Email:</label>
    <input type="email" name="email" id="emailInput">
    <label for="passwordInput">Hasło:</label>
    <input type="password" name="password" id="passwordInput">
    <input type="submit" value="Zaloguj">
</form>