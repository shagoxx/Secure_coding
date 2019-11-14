
<?php
require_once '../vendor/autoload.php';
$google2fa = new PragmaRX\Google2FA\Google2FA();

$google2faqr = new \PragmaRX\Google2FAQRCode\Google2FA();
$user="kevin";
$pass="hola";

$secret = $google2fa->generateSecretKey();

echo $secret;