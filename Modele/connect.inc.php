<?php
    $user = 'Pws2089';
    $pass = '402';
    try{
        $conn = new PDO("mysql:host=localhost;dbname=Pws2089", $user, $pass,
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (PDOException $e){
        echo "Erreur: ".$e->getMessage()."<br>";
    }
?>