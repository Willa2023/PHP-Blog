<?php date_default_timezone_set('Pacific/Auckland'); ?>
<?php
$conn = new mysqli("localhost", "root", "", "blog");

$mode = 'chooseSubmit';
if (isset($_REQUEST['mode']))
    $mode = $_REQUEST['mode'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fish Blog 🐠</title>
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
        <div id="middlebarTop" class="orderButton">
        <a href="?mode=chooseSubmit"><button id="submitChoose" class="modeButton" >List by Choose</button></a>
        <a href="?mode=searchSubmit"><button id="submitSearch" class="modeButton" >List by Search</button></a>
        </div>


        <div id="middlebarCenter">

            <?php
            if ($mode == 'chooseSubmit') {

                $order = 'title';
                if (isset($_REQUEST['chooseArticleOrder']))
                    $order = $_REQUEST['chooseArticleOrder'];

                $type = 'all';
                if (isset($_REQUEST['chooseArticleType']))
                    $type = $_REQUEST['chooseArticleType'];
                ?>

                <form method="get" class="chooseForm">
                    <span class="orderborder" id="chooseOrder">
                        Choose Order By
                        <select id="chooseOrder" class="orderSelector" name="chooseArticleOrder">
                            <?php
                            $orderOptions = [
                                'title' => 'Title',
                                'author' => 'Author',
                                'createTime' => 'Create time',
                                'updateTime' => 'Last updated',
                            ];

                            foreach ($orderOptions as $value => $valueText) {
                                ?>
                                <option value="<?= $value ?>" <?php if ($order == $value) {
                                      echo 'selected';
                                  } ?>>
                                    <?= $valueText ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>

                    </span>

                    <span class="typeborder" id="chooseType">
                        Choose Article Type:
                        <select id="chooseType" class="typeSelector" name="chooseArticleType">
                            <?php
                            $typeOptions = [
                                'all' => "ALL",
                                'news' => 'NEWS',
                                'culture' => 'CULTURE',
                                'sport' => 'SPORT',
                                'lifestyle' => 'LIFESTYLE',
                            ];

                            foreach ($typeOptions as $value => $valueText) {
                                ?>
                                <option value="<?= $value ?>" <?php if ($type == $value) {
                                      echo 'selected';
                                  } ?>>
                                    <?= $valueText ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                    </span>

                    <input type="submit" value="Submit" class="inputButton" />
                </form>

                <?php
                if ($order == 'updateTime' && $type == 'all') {
                    $query = $conn->prepare("SELECT * FROM article ORDER BY updateTime DESC;");
                } elseif ($order == 'updateTime' && $type != 'all') {
                    $query = $conn->prepare("SELECT * FROM article WHERE type=? ORDER BY updateTime DESC ;");
                    $query->bind_param("s", $type);
                } elseif ($order != 'updateTime' && $type == 'all') {
                    $query = $conn->prepare("SELECT * FROM article ORDER BY $order ;");
                } elseif ($order != 'updateTime' && $type != 'all') {
                    $query = $conn->prepare("SELECT * FROM article WHERE type=? ORDER BY $order ;");
                    $query->bind_param("s", $type);
                }

                $query->execute();
                $result = $query->get_result(); ?>

                <table class="article-list">
                    <tr class="tablehead">
                        <th>Title</th>
                        <th>Author</th>
                        <th>Create Time</th>
                        <th>Last update Time</th>
                    </tr>
                    <?php
                    foreach ($result as $row) {
                        ?>
                        <tr class="article-title" data-id="<?php echo $row['id'] ?>">
                            <td class="tdtitle">
                                <?php echo $row['title'] ?>
                            </td>

                            <td class="tdauthor">
                                <?php echo $row['author'] ?>
                            </td>
                            <td class="tdtime">
                                <?php echo $row['createTime'] ?>
                            </td>
                            <td class="tdtime">
                                <?php echo $row['updateTime'] ?>
                            </td>
                        </tr>

                        <?php

                    } ?>
                </table>
                <?php
            } elseif ($mode == 'searchSubmit') {
                $searchType = '';
                if (isset($_REQUEST['searchType']))
                    $searchType = $_REQUEST['searchType'];

                $searchText = '';
                if (isset($_REQUEST['searchText']))
                    $searchText = $_REQUEST['searchText'];
                ?>

                <form method="get" class="chooseSearch">
                    <span class="searchborder">
                        <span class="searchText">Search Type</span>
                        <select class="searchTypeSelector" name="searchType">
                            <?php
                            $searchTypeOptions = [
                                'title' => 'Title',
                                'author' => 'Author',
                                'id' => 'ID',
                            ];

                            foreach ($searchTypeOptions as $value => $valueText) {
                                ?>
                                <option value="<?= $value ?>" <?php if ($searchType == $value) {
                                      echo 'selected';
                                  } ?>>
                                    <?= $valueText ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                    </span>
                    <input type="hidden" value="searchSubmit" name="mode" />
                    <input type="text" id="searchText" name="searchText" class="searchInput" />
                    <a href="?mode=searchSubmit"><input id="searchicon" type="submit" value=" 🔍 " class="inputButton" /></a>
                </form>

                <?php

                $query = '';
                if ($searchType == 'title' && $searchText != '') {
                    $searchText = '%' . $searchText . '%';
                    $query = $conn->prepare("SELECT * FROM article WHERE title LIKE ? ;");
                    $query->bind_param("s", $searchText);
                } elseif ($searchType == 'author' && $searchText != '') {
                    $searchText = '%' . $searchText . '%';
                    $query = $conn->prepare("SELECT * FROM article WHERE author LIKE ? ;");
                    $query->bind_param("s", $searchText);
                } elseif ($searchType == 'id' && $searchText != '') {
                    $searchId = intval($searchText);
                    if ((string) $searchId === $searchText) {
                        $query = $conn->prepare("SELECT * FROM article WHERE id = ? ;");
                        $query->bind_param("i", $searchId);
                    }
                }


                $resultSearch = '';

                if ($query != '') {
                    $query->execute();
                    $resultSearch = $query->get_result();
                }

                ?>

                <?php
                if ($resultSearch && mysqli_num_rows($resultSearch) > 0) { ?>
                    <table class="article-list">
                        <tr class="tablehead">
                            <th>Title</th>
                            <th>Author</th>
                            <th>Create Time</th>
                            <th>Last update Time</th>
                        </tr>
                        <?php
                        foreach ($resultSearch as $row) {
                            ?>
                            <tr class="article-title" data-id="<?php echo $row['id'] ?>">
                                <td class="tdtitle">
                                    <?php echo $row['title'] ?>
                                </td>

                                <td class="tdauthor">
                                    <?php echo $row['author'] ?>
                                </td>
                                <td class="tdtime">
                                    <?php echo $row['createTime'] ?>
                                </td>
                                <td class="tdtime">
                                    <?php echo $row['updateTime'] ?>
                                </td>
                            </tr>

                            <?php

                        } ?>


                    </table>

                <?php } elseif($searchText != '' &&  mysqli_num_rows($resultSearch) == 0) { ?>
                    <p id="noResult">😿 Sorry, no related result</p>
                <?php } else {

                }
                
            } ?>
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