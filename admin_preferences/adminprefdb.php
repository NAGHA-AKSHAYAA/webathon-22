<?php
$conn = new mysqli("localhost","root","","preferences");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
