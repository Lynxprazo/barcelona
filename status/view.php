<?php 
 include "../databaseconnection.php";
 try{
    $sql = $conn->query("SELECT * FROM team_membar");
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    if($result){
      echo json_encode($result);
   }else{
      echo json_encode(["message"=>"no data is found"]);
      exit;
   }

 }catch(PDOException $e){
    die("Something went wrong".$e->getMessage());

 }
// Remove  and Update the  the detail of member of Team 

try{
   

}catch(PDOException $e){
  die("Something went Wrong".$e->getMessage());
}

?>