<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>SportsHub</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
</head>
<body> 
<header>
    <?php include "header.php";?>
</header>  
<section>
    <div id="board_box">
<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";

    $num  = $_GET["num"];
    $page  = $_GET["page"];

    $con = mysqli_connect("localhost", "user", "12345", "TermProject");
    $sql = "select * from board where num=$num";
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

    $content = str_replace(" ", "&nbsp;", $content);
    $content = str_replace("\n", "<br>", $content);

    $new_hit = $hit + 1;
    $sql = "update board set hit=$new_hit where num=$num";   
    mysqli_query($con, $sql);
?>      
        <ul id="view_content">
            <li>
                <span class="col1"><b>제목 :</b> <?=$subject?></span>
                <span class="col2"><?=$name?> | <?=$regist_day?></span>
            </li>
            <li>
                <?php
                    if($file_name) {
                        $real_name = $file_copied;
                        $file_path = "./data/".$real_name;
                        $file_size = filesize($file_path);
                        
                        $is_image = in_array($file_type, ['image/jpeg', 'image/jpg', 'image/png']);
                        
                        if ($is_image) {
                            echo "<img src='$file_path' alt='$file_name' class='view_image'><br><br>";
                        }
                        
                        echo "▷ 첨부파일 : $file_name ($file_size Byte) &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href='download.php?num=$num&real_name=$real_name&file_name=$file_name&file_type=$file_type'>[저장]</a><br><br>";
                    }
                ?>
                <?=$content?>
            </li>      
        </ul>
        <ul class="buttons">
            <li><button onclick="location.href='board_list.php?page=<?=$page?>'">목록</button></li>
            <?php if ($userid == $board_id) { ?>
            <li><button onclick="location.href='board_modify_form.php?num=<?=$num?>&page=<?=$page?>'">수정</button></li>
            <li><button onclick="confirmDelete(<?=$num?>, <?=$page?>)">삭제</button></li>
            <?php } ?>
        </ul>
    </div> <!-- board_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>

<script>
function confirmDelete(num, page) {
    if (confirm("정말 삭제하시겠습니까?")) {
        location.href = 'board_delete.php?num=' + num + '&page=' + page;
    }
}
</script>
</body>
</html>
