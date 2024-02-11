<?php
$conn = new mysqli("localhost", "root", "", "blog");

$title = $_POST['title'];
$author = $_POST['author'];
$content = $_POST['content'];

$updateTimeString = $_POST['updateTime'];
$updateTime = DateTime::createFromFormat('d/m/Y, h:i:s A', $updateTimeString);
$updateTimeFormatted = $updateTime->format('Y-m-d H:i:s');

$id = intval($_POST['id']);

$query = $conn->prepare("UPDATE article SET content = ?, author = ?, title = ?, updateTime = ? WHERE id = ?");
$query->bind_param("ssssi", $content, $author, $title, $updateTimeFormatted, $id);
$query->execute();
$query->close();
$conn->close();
?>

