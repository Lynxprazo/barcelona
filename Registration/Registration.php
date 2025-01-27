<?php
include '../databaseconnection.php';
try {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $firstname = $_POST['Firstname'] ?? '';
        $secondname = $_POST['secondname'] ?? '';
        $position = $_POST['position'] ?? '';
        $status = $_POST['status'] ?? '';


        $stmt = $conn->prepare("INSERT INTO team_membar(firstname,secondname,position,status) values(:firstname, :secondname,:position, :status)");
        $stmt->bindParam(":firstname",$firstname,PDO::PARAM_STR);
        $stmt->bindParam(":secondname",$secondname,PDO::PARAM_STR);
        $stmt->bindParam(":position",$position,PDO::PARAM_STR);
        $stmt->bindParam(":status",$status,PDO::PARAM_STR);

        if($stmt->execute()){
            echo "<script> alert('successfly add new member')</script>";

        }else{
            die("<script> alert('failed add new member')</script>");
        }
    }

    

}catch(PDOException $e){
    die("Something went wrong". $e->getMessage());
}





try {
    $stmt = $conn->query("SELECT * FROM team_membar ORDER BY id DESC LIMIT 1");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
    
        echo json_encode($result);
    } else {
        
        echo json_encode(["message" => "No data found"]);
    }
} catch (PDOException $e) {
    die("Something went wrong: " . $e->getMessage());
}



?>