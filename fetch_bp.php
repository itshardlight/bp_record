<?php
$host = "sql203.infinityfree.com";
$user = "if0_39119744";
$pass = "qEwy8xKFUFgKS";
$db   = "if0_39119744_bpmeter";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die(json_encode([]));
}

$sql = "SELECT * FROM bp_records ORDER BY date DESC, id DESC";
$result = $conn->query($sql);

$records = [];
if ($result) {
  while ($row = $result->fetch_assoc()) {
    $records[] = $row;
  }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($records);
?>
