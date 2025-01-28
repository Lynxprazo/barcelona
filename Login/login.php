<?php
session_start();
require "../databaseconnection.php";
try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['Email'] ?? '';
        $password = $_POST['password'] ?? '';


        if (empty($email) || empty($password)) {
            echo "Please fill all the input values";
            exit;
        }


        $sql = $conn->prepare("SELECT * FROM techdirector WHERE email = :email");
        $sql->bindParam(":email", $email, PDO::PARAM_STR);
        $sql->execute();

        $techname = $sql->fetch(PDO::FETCH_ASSOC);
        if ($techname && password_verify($password, $techname['password'])) {
            $_SESSION['user_id'] = $techname['id']; 
            $_SESSION['user_type'] = "manager"; 
            echo '<script>alert("Successfully logged in")</script>';
            header('Location: ../Registration/Registration.html');
            exit;
        } else {
            echo '<script> alert("Invalid email or password.") </script>';
        }
    }
} catch (PDOException $e) {
    echo "Something went wrong: " . $e->getMessage();
}
?>
