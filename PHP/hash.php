<?php 
require ("../vendor/autoload.php");
//Step 1: Enter you google account credentials
$g_client = new Google_Client();
$g_client->setClientId("521178512935-10f72os7i4tnf82a8dldkkj56jhq887e.apps.googleusercontent.com");
$g_client->setClientSecret("veOgq6GuA9prZuRsUrfB9hvK");
$g_client->setRedirectUri("https://codesecure.tk/Secure_coding/PHP/hash.php");
$g_client->setScopes("email");
//Step 2 : Create the url
$auth_url = $g_client->createAuthUrl();
echo "<a href='$auth_url'>Login Through Google </a>";
//Step 3 : Get the authorization  code
$code = isset($_GET['code']) ? $_GET['code'] : NULL;
//Step 4: Get access token
if(isset($code)) {
    try {
        $token = $g_client->fetchAccessTokenWithAuthCode($code);
        $g_client->setAccessToken($token);
    }catch (Exception $e){
        echo $e->getMessage();
    }
    try {
        $pay_load = $g_client->verifyIdToken();
        
    }catch (Exception $e) {
        echo $e->getMessage();
    }

} else{
    $pay_load = null;
}
if(isset($pay_load)){
    
}

