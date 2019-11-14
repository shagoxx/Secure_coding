  
<?php
session_start();
    if(isset($_SESSION["inicio"])){
         echo "bienvenido".$_SESSION["inicio"];
    }
    else {
        header('Location: ../index.html');
    }
?>