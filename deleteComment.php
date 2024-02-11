<?php
$conn = new mysqli("localhost", "root", "", "blog");
$id = intval($_POST['id']);

$queryComments = $conn->prepare("DELETE FROM `comments` WHERE id = ?");
$queryComments->bind_param("i", $id);
$queryComments->execute();
$queryComments->close();

$conn->close();
?>