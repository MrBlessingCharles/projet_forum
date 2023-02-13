<?php

    $user = "root";
    $hote= "localhost";
    $pwd="";
    $bd = "forum";
try {
   if(session_status() == PHP_SESSION_NONE){
    session_start();
   }

    $bdd= new PDO('mysql: host='.$hote.'; dbname='.$bd.'', $user, $pwd);
    
    }catch (exception $e){
    die("echec de la connexion à la base de donnée ".$e->getMessage());
}


?>