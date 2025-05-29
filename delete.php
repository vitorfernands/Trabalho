<?php
include 'database.php';

$id = $_GET['id'];
$sql = "DELETE FROM reservas WHERE id = $id";
$conn->query($sql);

header("Location: index.php");
exit;
?>
