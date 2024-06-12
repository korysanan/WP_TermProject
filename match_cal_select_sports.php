<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportsHub</title>
    <link rel="stylesheet" href="./css/sports_select.css">
    <link rel="stylesheet" type="text/css" href="./css/common.css">
</head>
<body>
<header>
    <?php include "header.php";?>
</header>  
<section>
<h1>
    경기일정
</h1>
    <div class="board-container">
        <?php
        $boards = [
            ["title" => "야구", "image" => "./img/baseball.png", "link" => "match_cal_baseball.php"],
            ["title" => "축구", "image" => "./img/soccer.png", "link" => "match_cal_soccer.php"],
            ["title" => "농구", "image" => "./img/basketball.png", "link" => "match_cal_basketball.php"],
            ["title" => "배구", "image" => "./img/volleyball.png", "link" => "match_cal_volleyball.php"],
            ["title" => "E스포츠", "image" => "./img/esports.png", "link" => "match_cal_esports.php"],
            ["title" => "기타", "image" => "./img/etc.png", "link" => "match_cal_etc.php"]
        ];

        foreach ($boards as $board) {
            echo '<div class="board">';
            echo '<a href="' . $board["link"] . '">';
            echo '<img src="' . $board["image"] . '" alt="' . $board["title"] . '">';
            echo '<h2>' . $board["title"] . '</h2>';
            echo '</a>';
            echo '</div>';
        }
        ?>
    </div>

    <script src="./js/sports_select.js"></script>
    </section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
