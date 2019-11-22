<?php
require_once '../vendor/autoload.php';
$google2faqr = new PragmaRX\Google2FAQRCode\Google2FA();
$user="kevin";
$pass="hola";
 
$secret = $google2faqr->generateSecretKey();



$inlineUrl = $google2faqr->getQRCodeInline(
    $pass,
    $user,
    $secret
);
echo "<img src=".$inlineUrl.">";

echo $secret;



?>