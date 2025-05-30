<?php
$correct_id = "admin";
$correct_pass = "1234";

$user = $_POST['username'];
$pass = $_POST['password'];

if ($user === $correct_id && $pass === $correct_pass) {
    header("Location: dashboard.html");
    exit();
} else {
    echo "<h2 style='text-align:center; margin-top: 20%; color: red;'>Invalid ID or Password.</h2>";
}
?>
