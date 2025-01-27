<?php
require "../databaseconnection.php";
// line of code to insert data to the database 
try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['Email'] ?? '';
        $password = $_POST['password'] ?? '';

        // Validate the form
        if (empty($email) || empty($password)) {
            echo "Please fill all the input values";
            exit;
        }

        // Fetch the email from the database
        $sql = $conn->prepare("SELECT * FROM techdirector WHERE email = :email");
        $sql->bindParam(":email", $email, PDO::PARAM_STR);
        $sql->execute();

        // Fetch the tech manager's name and password from the database
        $techname = $sql->fetch(PDO::FETCH_ASSOC);
        if ($techname && password_verify($password, $techname['password'])) {
            echo '<script>alert("Successfully logged in")</script>';
            header('Location: ../Registration/Registration.html');

        } else {
            echo '<script> alert("Invalid email or password.") </script>';
        }
    }
} catch (PDOException $e) {
    echo "Something went wrong: " . $e->getMessage();
}


