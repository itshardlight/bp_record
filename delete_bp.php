<?php
$host = "sql203.infinityfree.com";
$user = "if0_39119744";
$pass = "qEwy8xKFUFgKS";
$db   = "if0_39119744_bpmeter";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  echo "error";
  exit;
}

$id = intval($_POST['id']);

$stmt = $conn->prepare("DELETE FROM bp_records WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
  echo "success";
} else {
  echo "error";
}

$stmt->close();
$conn->close();
?>
