<?php
$conn = new mysqli("localhost", "root", "", "blog");
$article_id = intval($_POST['article_id']);
$comment = $_POST['comment'];

$query = $conn->prepare("INSERT INTO `comments`(`article_id`, `comment_text`) VALUES (?, ?);");
$query->bind_param("is", $article_id, $comment);
$query->execute();
$query->close();
$conn->close();

header('Location: display.php?id=' . $article_id);
?>



