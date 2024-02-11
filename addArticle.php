<?php
$conn = new mysqli("localhost", "root", "", "blog");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $content = $_POST['content'];
    $type = $_POST['ArticleType'];

    $query = $conn->prepare("INSERT INTO `article`(`title`, `author`, `content`, `type`) VALUES (?,?,?,?);");
    $query->bind_param("ssss", $title, $author, $content, $type);
    $query->execute();
    $query->close();
    $conn->close();

    header('Location: home.php');
}
?>