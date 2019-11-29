# Secure_coding
Buenas Bienvenidos.
<?php

$user = $_POST['user'];
$pass = $_POST['pass'];

$hash = password_hash($pass, PASSWORD_DEFAULT);
if (password_verify($pass, $hash)) {
    echo '¡La contraseña es válida!';
} else {
    echo 'La contraseña no es válida.';
}

if (isset($_POST['secretcaptcha'])){
 echo $_POST['secretcaptcha'];
}





?>
