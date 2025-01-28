<?php
include "../databaseconnection.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        if (isset($_POST['id']) && isset($_POST['FirstName']) && isset($_POST['secondname']) && !empty($_POST['id'])) {
            $id = $_POST['id'];
            $FirstName = $_POST['FirstName'];
            $secondname = $_POST['secondname'];

            $sql = $conn->prepare("SELECT * FROM team_membar WHERE id = :id");
            $sql->bindParam(":id", $id, PDO::PARAM_STR);
            if ($sql->execute() && $sql->rowCount() > 0) {
                $result2 = $sql->fetch(PDO::FETCH_ASSOC);

                // Check if FirstName and secondname match
                if ($result2['FirstName'] === $FirstName && $result2['secondname'] === $secondname) {
                    header("Location:../dashboard/dashboard.html");
                    exit;
                } else {
                    echo '<script>alert("Incorrect Id number, first name, or second name.")</script>';
                    header("Location:./login.html");
                    exit;
                }
            } else {
                echo '<script>alert("No member found with this ID.")</script>';
                header("Location:./login.html");
                exit;
            }
        }
    } catch (PDOException $e) {
        die("Something went wrong: " . $e->getMessage());
    }
}
?>