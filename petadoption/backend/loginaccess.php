<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    if ($stmt) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION['user_id'] = $row['id'];
                $stmt->close();
                $conn->close();
                header("Location: /petadoption/home.php");
                exit;
            } else {
                $_SESSION['error'] = "Invalid username or password";
            }
        } else {
            $_SESSION['error'] = "Invalid username or password";
        }
        $stmt->close();
    } else {
        $_SESSION['error'] = "Database error: " . $conn->error;
    }
    $conn->close();
    header("Location: ../login.php");
    exit;
}
?>
