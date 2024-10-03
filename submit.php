<?php
// Database credentials
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$date = $_POST['date'];
$time = $_POST['time'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO users (first_name, last_name, date, time) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $first_name, $last_name, $date, $time);

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>
