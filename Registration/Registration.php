<?php
session_start();
include '../databaseconnection.php';


if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'manager') {

    echo "<script> alert('You are not authorized to access this page.'); window.location.href = '../Dashboard/dashboard.html'; </script>";
    exit;
}

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $firstname = $_POST['Firstname'] ?? '';
        $secondname = $_POST['secondname'] ?? '';
        $position = $_POST['position'] ?? '';
        $status = $_POST['status'] ?? '';

    
        $stmt = $conn->prepare("INSERT INTO team_membar(firstname, secondname, position, status) 
                                VALUES(:firstname, :secondname, :position, :status)");
        $stmt->bindParam(":firstname", $firstname, PDO::PARAM_STR);
        $stmt->bindParam(":secondname", $secondname, PDO::PARAM_STR);
        $stmt->bindParam(":position", $position, PDO::PARAM_STR);
        $stmt->bindParam(":status", $status, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo "<script>alert('Successfully added new member');</script>";
        } else {
            echo "<script>alert('Failed to add new member');</script>";
        }
    }
} catch (PDOException $e) {
    die("Something went wrong: " . $e->getMessage());
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
