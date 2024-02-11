<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Article 📝</title>
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

    <div id="middlebar">
        <div id="addArticle">
            <form action="addArticle.php" method="post">
                <p>
                    <input class="titleborder" type="text" name="title" placeholder="Enter Title">
                </p>
                <p>
                    <input class="authorborder" type="text" name="author" placeholder="Enter Author">
                </p>
                <p class="typeborder">
                    Choose Article Type:
                    <select class="typeSelector" name="ArticleType">
                        <option value="news">news</option>
                        <option value="culture">culture</option>
                        <option value="sport">sport</option>
                        <option value="lifestyle">lifestyle</option>
                    </select>
                </p>

                <p>
                    <textarea class="contentborder" name="content" id="content" rows="35" cols="140" placeholder="Enter Content"></textarea>
                </p>
                <p>
                    <button id="createArticle">Create New Article</button>
                </p>
                
            </form>
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
<footer>

</footer>
<script type="module" src="blog.js"></script>

</html>