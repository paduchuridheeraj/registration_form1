<?php
// Database config
$host = 'localhost';
$db = 'registration_db';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // hash password
$dob = $_POST['dob'];
$terms = isset($_POST['terms']) ? 'Yes' : 'No';

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO users (name, email, password, date_of_birth, accepted_terms) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $email, $password, $dob, $terms);

// Execute
if ($stmt->execute()) {
    echo "Registration successful!";
} else {
    echo "Error: " . $stmt->error;
}

// Close
$stmt->close();
$conn->close();
?>