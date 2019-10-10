<?php


$_POST["username"];
$_POST["password"];

$password = $_POST["username"];
$username = $_POST["password"];



$dbhost = "localhost";
$dbuser = "root";
$dbpass = "Admin123*";
$db = "login";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db);

$sql = "SELECT user,pass FROM users";

$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
    if ($username == $row["user"]) {
    echo "loginOK";
    if (password_verify($password, $row["pass"])) {
        echo '¡La contraseña es válida!';
    }}
        else {
            echo "LOGINKO";
        }


}


?>