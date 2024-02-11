<?php
$conn = new mysqli("localhost", "root", "", "blog");
$id = intval($_POST['id']);

$queryComments = $conn->prepare("DELETE FROM `comments` WHERE article_id = ?");
$queryComments->bind_param("i", $id);
$queryComments->execute();
$queryComments->close();

$queryArticle = $conn->prepare("DELETE FROM `article` WHERE id = ?");
$queryArticle->bind_param("i", $id);
$queryArticle->execute();
$queryArticle->close();

$conn->close();
?>
