<?php
include "../databaseconnection.php";


try {
    $sql = $conn->query("SELECT * FROM team_membar");
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    if ($result) {
        echo json_encode($result);
    } else {
        echo json_encode(["message" => "No data found"]);
    }
} catch (PDOException $e) {
    die("Something went wrong: " . $e->getMessage());
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
              if (isset($_POST['id']) && !empty($_POST['id'])) {
            $id = $_POST["id"];
            $FirstName = $_POST['FirstName'] ?? '';
            $secondname = $_POST['secondname'] ?? '';
            $position = $_POST['position'] ?? '';
            $status = $_POST['status'] ?? '';

            $sql = $conn->prepare("SELECT * FROM team_membar WHERE id = :id");
            $sql->bindParam(":id", $id, PDO::PARAM_INT);
            $sql->execute();

            if ($sql->rowCount() > 0){
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
                    header("location: ./view.html");
                } else {
                    echo "<script>alert('Failed to update the information');</script>";
                }
            } else {
                // Insert new member
                $sql3 = $conn->prepare("INSERT INTO team_membar (FirstName, secondname, position, status) 
                                        VALUES (:FirstName, :secondname, :position, :status)");
                $sql3->bindParam(":FirstName", $FirstName, PDO::PARAM_STR);
                $sql3->bindParam(":secondname", $secondname, PDO::PARAM_STR);
                $sql3->bindParam(":position", $position, PDO::PARAM_STR);
                $sql3->bindParam(":status", $status, PDO::PARAM_STR);

                if ($sql3->execute()) {
                    header("Location: ./view.html");
                    exit;
                } else {
                    echo "<script>alert('Failed to add a new member');</script>";
                }
            }
        }

        // Handle delete request
        if (isset($_POST['delete_id']) && !empty($_POST['delete_id'])) {
            $id = $_POST['delete_id'];

            if (!$id) {
                echo json_encode(['success' => false, 'message' => 'ID is required']);
                exit;
            }

            $sql = $conn->prepare("DELETE FROM team_membar WHERE id = :id");
            $sql->bindParam(":id", $id, PDO::PARAM_INT);
            if ($sql->execute()) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to delete record']);
            }
        }
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
    }
}
?>
