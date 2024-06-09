<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>스포츠 선택</title>
    <link rel="stylesheet" href="./css/mp_select.css">
    <link rel="stylesheet" type="text/css" href="./css/common.css">
</head>
<body>
<header>
    <?php include "header.php";?>
</header>  
<section>
<h1>
    승부 예측
</h1>
    <div class="board-container">
        <?php
        $boards = [
            ["title" => "야구", "image" => "./img/baseball.png", "link" => "mp_baseball.php"],
            ["title" => "축구", "image" => "./img/soccer.png", "link" => "mp_soccer.php"],
            ["title" => "농구", "image" => "./img/basketball.png", "link" => "mp_basketball.php"],
            ["title" => "배구", "image" => "./img/volleyball.png", "link" => "mp_volleyball.php"],
            ["title" => "E스포츠", "image" => "./img/esports.png", "link" => "mp_esports.php"],
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
