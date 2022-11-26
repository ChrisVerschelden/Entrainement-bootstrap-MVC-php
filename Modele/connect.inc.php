<?php
    $user = 'projetMVC';
    $pass = 'projetMVC402';
    try{
        $conn = new PDO("mysql:host=localhost;dbname=dbMVC", $user, $pass,
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (PDOException $e){
        echo "Erreur: ".$e->getMessage()."<br>";
    }
?>