<?php
    try{   
       $con=new PDO("mysql:host=localhost;dbname=gestion_de_stage","root","Aa1122334455");
    }
    catch(PDOException $e){
        die("Impossible de se connecter à la base de donnée:" . $e->getMessage());
    }
?>