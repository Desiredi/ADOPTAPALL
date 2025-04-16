<?php
// Start session
session_start();

// Include database connection
include 'db_connect.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Gather form data
    $name = trim($_POST["name"]);
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $birthday = $_POST["birthday"];
    $address = trim($_POST["address"]);
    $password = $_POST["password"];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $termsAccepted = isset($_POST["terms"]);

    // Validation checks
    $errors = [];

    // Check for valid email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Check for password strength (using regex)
    $passwordPattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
    if (!preg_match($passwordPattern, $password)) {
        $errors[] = "Password must contain at least one uppercase letter, one lowercase letter, one digit, and one special character, with a minimum length of 8 characters.";
    }

    // Check for minimum password length
    if (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters long.";
    }

    // Check if terms are accepted
    if (!$termsAccepted) {
        $errors[] = "You must accept the terms and conditions.";
    }

    // Check for existing username or email
    $checkStmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $checkStmt->bind_param("ss", $username, $email);
    $checkStmt->execute();
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
        $errors[] = "Username or email already exists.";
    }
    $checkStmt->close();

    // If no errors, proceed with registration
    if (empty($errors)) {
        // Insert user data into the database
        $sql = "INSERT INTO users (name, username, email, birthday, address, password) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $name, $username, $email, $birthday, $address, $hashedPassword);
        
        if ($stmt->execute()) {
            // Automatically log in the user after registration
            $_SESSION['user_id'] = $stmt->insert_id;
            header("Location: ../register_success.php"); // Redirect to home page
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        // If there are errors, display them
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
}

// Close connection
$conn->close();
?>
