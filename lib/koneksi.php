<?php
    try{
        $db = new PDO("mysql:host=localhost;dbname=crudpwpb","root","");
    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>