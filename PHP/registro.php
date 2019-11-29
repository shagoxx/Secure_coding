<?php
/*---------------------------------LIBRERIAS NECESARIAS PARA 2FA----------------------------------------------*/
require 'sql.php';
require_once '../vendor/autoload.php';
$google2faqr = new PragmaRX\Google2FAQRCode\Google2FA();
/*---------------------------------------------------------------------------------------------------------*/

/*-----------------------------------GENERO EL PATH PARA LA IMAGEN----------------------------------------------------------------------*/
$secret = $google2faqr->generateSecretKey();
$inlineUrl = $google2faqr->getQRCodeInline(
    $pass,
    $user,
    $secret
);

/*---------------------------------------------------------------------------------------------------------*/



$user = $_POST['user'];
$pass = $_POST['pass'];
$fa2 = $_POST['secret'];

$hash = password_hash($pass, PASSWORD_DEFAULT);

if ($fa2 == on)
{

echo "<img src=".$inlineUrl.">";
$sql = "INSERT INTO users (user,pass,secret) VALUES ('$user','$hash','$secret')";
$result = $conn->query($sql);
}
else {
    $sql = "INSERT INTO users (user,pass) VALUES ('$user','$hash')";
    $result = $conn->query($sql);
}
?>