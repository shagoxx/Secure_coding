<?php
require_once '../vendor/autoload.php';
$google2fa = new PragmaRX\Google2FA\Google2FA();

$claveuser = $_POST['secret'];
$secret = "WDR3T7WMMR7N22UP";


$valid = $google2fa->verifyKey($secret,$claveuser);

if ($valid)
{
    echo "valido";
}
?>
