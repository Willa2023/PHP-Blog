<?php
$conn = new mysqli("localhost", "root", "", "blog");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View By Type 🔖</title>
    <link rel="stylesheet" href="blog.css" type="text/css">
</head>

<body>
    <div id="navigation">
        <menu id="mainmenu">
            <h1 class="home">Fish Blog 🐠</h1>
            <p id="menuicon">
                <a href="home.php">Home |</a>
                <a href="create.php">Create Article |</a>
                <a href="type.php">View By Type</a>
            </p>
        </menu>
    </div>

    <div id="middlebar" class="typeblock">
        <div id="typeNews" class="eachtype">
            <p class="typeHeader">News</p>
            <ul>
            <?php
            $result = $conn->query("SELECT * FROM article WHERE type='news';");
            foreach ($result as $row) {
                ?>
                <li id="newsArticle" class="article-title" data-id="<?php echo $row['id'] ?>">
                    <?php echo $row['title'] ?>
                </li>
                <?php
            }?>
            </ul>
        </div>
        <div id="typeCulture" class="eachtype">
            <p class="typeHeader">Culture</p>
            <ul>
            <?php
            $result = $conn->query("SELECT * FROM article WHERE type='culture';");
            foreach ($result as $row) {
                ?>
                <li id="cultureArticle" class="article-title" data-id="<?php echo $row['id'] ?>">
                    <?php echo $row['title'] ?>
                </li>
                <?php
            }?>
            </ul>
        </div>
        <div id="typeSport" class="eachtype">
            <p class="typeHeader">Sport</p>
            <ul>
            <?php
            $result = $conn->query("SELECT * FROM article WHERE type='sport';");
            foreach ($result as $row) {
                ?>
                <li id="sportArticle" class="article-title" data-id="<?php echo $row['id'] ?>">
                    <?php echo $row['title'] ?>
                </li>
                <?php
            }?>
            </ul>
        </div>
        <div id="typeLifestyle" class="eachtype">
            <p class="typeHeader">Lifestyle</p>
            <ul>
            <?php
            $result = $conn->query("SELECT * FROM article WHERE type='lifestyle';");
            foreach ($result as $row) {
                ?>
                <li id="lifestyleArticle" class="article-title" data-id="<?php echo $row['id'] ?>">
                    <?php echo $row['title'] ?>
                </li>
                <?php
            }?>
            </ul>
        </div>


    </div>

    <div id="middlebottom">
    </div>

    <div id="middlebottom2">
    </div>

    <div id="footer">
        (C) 2023 This is the Fish Blog footer.
    </div>
</body>

<script type="module" src="blog.js"></script>

</html>