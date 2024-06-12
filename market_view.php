<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>SportsHub</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/market_view.css">
</head>
<body> 
<header>
    <?php include "header.php"; ?>
</header>  
<section>
    <div id="product_view_box">
<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";

    $num  = $_GET["num"];
    $page  = $_GET["page"];

    $con = mysqli_connect("localhost", "user", "12345", "TermProject");
    $sql = "select * from market where num=$num";
    $result = mysqli_query($con, $sql);

    $row = mysqli_fetch_array($result);
    $board_id = $row["id"];
    $name      = $row["name"];
    $regist_day = $row["regist_day"];
    $subject    = $row["subject"];
    $content    = $row["content"];
    $file_name    = $row["file_name"];
    $file_type    = $row["file_type"];
    $file_copied  = $row["file_copied"];
    $hit          = $row["hit"];
    $price        = $row["price"];

    $content = str_replace(" ", "&nbsp;", $content);
    $content = str_replace("\n", "<br>", $content);

    $new_hit = $hit + 1;
    $sql = "update market set hit=$new_hit where num=$num";   
    mysqli_query($con, $sql);
?>
        <div class="product_image">
            <?php
                if ($file_name) {
                    $real_name = $file_copied;
                    $file_path = "./data/" . $real_name;
                    echo "<img src='$file_path' alt='Product Image'>";
                }
            ?>
        </div>
        <div class="product_details">
            <h1><?=$subject?></h1>
            <div class="price"><?=number_format($price)?> 원</div>
            <div class="details">
                <span><?=$name?> | <?=$regist_day?></span>
                <p><?=$content?></p>
            </div>
            <ul class="buttons">
            <?php if ($userid && $userid != $board_id) { ?>
            <li><button onclick="location.href='payment.php?num=<?=$num?>&price=<?=$price?>&subject=<?=urlencode($subject)?>'">구입</button></li>
            <li><button onclick="location.href='message_form.php?to=<?=$board_id?>'">쪽지 보내기</button></li>
            <?php } ?>
            </ul>
        </div>
        <ul class="edit_buttons">
            <li><button onclick="location.href='market_list.php?page=<?=$page?>'">목록</button></li>
            <?php if ($userid == $board_id) { ?>
            <li><button onclick="location.href='market_modify_form.php?num=<?=$num?>&page=<?=$page?>'">수정</button></li>
            <li><button onclick="confirmDelete(<?=$num?>, <?=$page?>)">삭제</button></li>
            <?php } ?>
        </ul>
    </div> <!-- product_view_box -->
</section> 
<footer>
    <?php include "footer.php"; ?>
</footer>

<script>
function confirmDelete(num, page) {
    if (confirm("정말 삭제하시겠습니까?")) {
        location.href = 'market_delete.php?num=' + num + '&page=' + page;
    }
}
</script>
</body>
</html>
