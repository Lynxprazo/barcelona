<?php 
$host ="localhost";
$dbname = "teammanagement";
$password = "";
$username = "root";
try{

    $conn = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
    //   echo"SERVER CONNECTED successfuly";
    

    // create an Technical director  credential 

    // $Tpassword = "mwanga02@";
    // $Temail = "PaulSolm@gmail.com";

    // $hashedpassword = password_hash($Tpassword,PASSWORD_BCRYPT);

    // $sql = $conn->prepare("INSERT INTO   techdirector (email, password) values (:email, :password)");
    // $sql->bindParam(":email",$Temail,PDO::PARAM_STR); 
    // $sql->bindParam(":password",$hashedpassword,PDO::PARAM_STR); 
    // if($sql->execute()){
    //     echo "succsess add ";
    // }else{
    //     echo "make it easy please";
    // }




  
}catch(PDOException $e ){
    die("database failed to connect". $e->getmessage());
}


?>