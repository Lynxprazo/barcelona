<?php 
include "../databaseconnection.php";

try {
    
    $sql = $conn->query("SELECT * FROM team_membar");
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    if ($result) {
        echo json_encode($result);
    } else {
        echo json_encode(["message" => "No data found"]);
        exit;
    }
} catch (PDOException $e) {
    die("Something went wrong: " . $e->getMessage());
}


try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     
        $id = $_POST["id"] ?? "";
        if (empty($id)) {
            echo "<script>alert('ID is required');</script>";
            exit;
        }

       
        $sql = $conn->prepare("SELECT * FROM team_membar WHERE id = :id");
        $sql->bindParam(":id", $id, PDO::PARAM_INT);

        if ($sql->execute() && $sql->rowCount() > 0) {
           
            $FirstName = $_POST['FirstName'] ?? '';
            $secondname = $_POST['secondname'] ?? '';
            $position = $_POST['position'] ?? '';
            $status = $_POST['status'] ?? '';

            $sql2 = "UPDATE team_membar 
                     SET FirstName = :FirstName, 
                         secondname = :secondname, 
                         position = :position, 
                         status = :status 
                     WHERE id = :id";

            $stmt = $conn->prepare($sql2);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':FirstName', $FirstName, PDO::PARAM_STR);
            $stmt->bindParam(':secondname', $secondname, PDO::PARAM_STR);
            $stmt->bindParam(':position', $position, PDO::PARAM_STR);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);

            if ($stmt->execute()) {
                echo "<script>alert('Successfully updated the information');</script>";
            } else {
                echo "<script>alert('Failed to update the information');</script>";
            }
        } else {
            echo "<script>alert('Member not found');</script>";
        }
    }
} catch (PDOException $e) {
    die("Something went wrong: " . $e->getMessage());
}
?>
