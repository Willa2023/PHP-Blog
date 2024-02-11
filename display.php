<?php date_default_timezone_set('Pacific/Auckland'); ?>
<?php
$conn = new mysqli("localhost", "root", "", "blog");
$id = intval($_GET['id']);

$query = $conn->prepare("SELECT * FROM `article` WHERE id = ?");
$query->bind_param("i", $id);
$query->execute();
$result = $query->get_result();
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display 📖</title>
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

    <div id="middlebar" class="display">
        <div id="contentDiv">
            <div><textarea id="titleText" cols="55" readonly><?php echo $row['title']; ?></textarea>
            </div>
            <div><textarea id="authorText" readonly><?php echo $row['author']; ?></textarea>
            </div>
            <hr id="articleLine">
            <p>
                <span id="info">&nbsp;Article ID: </span><span id="idText">
                    <?php echo $row['id']; ?>
                </span>
                &ensp;&ensp;
                <span id="info">Type: </span><span id="idText">
                    <?php echo $row['type']; ?>
                </span>
                &ensp;&ensp;
                <span id="info">
                    Create Time: </span><span id="createTimeText">
                    <?php echo $row['createTime']; ?>
                </span>
                &ensp;&ensp;
                <span id="info">
                    Last Update Time: </span><span id="updateTimeText">
                    <?php echo $row['updateTime']; ?>
                </span>
            </p>
            <div><textarea id="contentText" cols="120" readonly><?php echo $row['content']; ?></textarea>
            </div>
            <p>
                <button id="editArticle">
                    Edit
                </button>
                <button id="saveArticle">
                    Save
                </button>
                <button id="deleteArticle">
                    Delete
                </button>
            </p>
            <hr id="articleLine">
        </div>
    </div>

    <div id="middlebottom">

        <div>
            <p id="commentArea">Comment Area</p>
            <ol>
                <?php
                $commentResult = $conn->query("SELECT comments.id AS comment_id, comments.time AS comment_time, comments.comment_text AS comment_text
            FROM article
            LEFT JOIN comments ON article.id = comments.article_id
            WHERE article.id = $id;");

                foreach ($commentResult as $row) {
                    if ($row['comment_text'] !== null) {
                        ?>
                        <li class="commentItem" id="commentItem">
                            <p>
                                <span class="commentPrompt" id="commentPrompt">ID: 
                                    <span class="commentID" id="commentID"><?php echo $row['comment_id'] ?></span>
                                </span>
                                &ensp;&ensp;
                                <span class="commentTime" id="commentTime"><?php echo $row['comment_time'] ?></span>
                                <span class="deleteCommentSpan" id="deleteCommentSpan"><button class="deleteComment" id="deleteComment">Delete</button><span>
                            </p>
                            <p><?php echo $row['comment_text'] ?></p>
                        </li>
                        <?php
                    }
                }
                ?>
            </ol>
        </div>
    </div>

    <div id="middlebottom2">            
            <form action="comment.php" method="post">
                <input type="hidden" name="article_id" value=<?php echo $id ?>>
                <p id="newcomment">New Comment</p>
                <textarea id="commentTextarea" name="comment" rows="6" cols="40"></textarea>
                <p id="commentButton"><button type="submit" id="submitComment">Submit</button></p>
            </form>
    </div>

    <div id="footer">
		(C) 2023 This is the Fish Blog footer.
    </div>

</body>

<script type="module" src="blog.js"></script>

</html>