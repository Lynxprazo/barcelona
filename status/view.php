<?php 
 include "../databaseconnection.php";
 try{
   $sql = $conn->query("SELECT * ")

 }catch(PDOException $e){
    die("Something went wrong".$e->getMessage());

 }


?>