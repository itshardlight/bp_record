<?php
$host = "sql203.infinityfree.com"; // MySQL Hostname from your image
$user = "if0_39119744";           // MySQL Username from your image
$pass = "qEwy8xKFUFgKS";          // MySQL Password from your image
$db   = "if0_39119744_bpmeter";   // Your database name from your image

$conn = new mysqli($host, $user, $pass, $db);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from POST request
$date = $_POST['date'];
$timeOfDay = $_POST['timeOfDay'];
$systolic = $_POST['systolic'];
$diastolic = $_POST['diastolic'];

// Prepare the SQL statement to prevent SQL injection
$sql = "INSERT INTO bp_records (date, time_of_day, systolic, diastolic)
        VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
// "ssii" means: s=string, s=string, i=integer, i=integer
// This matches the data types of date, time_of_day, systolic, and diastolic
$stmt->bind_param("ssii", $date, $timeOfDay, $systolic, $diastolic);

// Execute the prepared statement
if ($stmt->execute()) {
    echo "success"; // Output success if data is inserted
} else {
    echo "error: " . $stmt->error; // Output error message if insertion fails
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>