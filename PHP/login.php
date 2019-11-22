<?php
/*Para el captcha*/
require_once '../vendor/autoload.php';
$google2fa = new PragmaRX\Google2FA\Google2FA();

/*--------------------------------------*/

$token = $_POST['g-recaptcha-response']; //cogemos el token desde index html.

$secret = '6LfUfsEUAAAAALZX0saoSNykAjU1dvqlW30c8_Yh';
$peticionJson = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$token);
$respuestaGoogle = json_decode($peticionJson); //convierte la peticion en un json legible


if ($respuestaGoogle->score > 0.7 ){ //comprueba el score y si es un robot o no y hace el login


$password = $_POST["password"];
$username = $_POST["username"];



$dbhost = "localhost";
$dbuser = "kevin";
$dbpass = "Admin123*";
$db = "login";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db);

$sql = "SELECT user,pass FROM users WHERE user = '$username'";

$result = $conn->query($sql);

if($row = $result->fetch_assoc()) {

    if ($username == $row["user"]) {
     echo "Cuenta OK";
        if (password_verify($password, $row["pass"])) {
            echo '¡La contraseña es válida!';
            session_start();
            $_SESSION["inicio"]=$username;
           
        }
        else {
                    echo "contraseña INVALIDA";
        }
    }
}
else{ echo "la cuenta es invalida";}
}
// VERIFICACION 2FA

?>
