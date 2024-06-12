<?php
$page = isset($_GET["page"]) ? $_GET["page"] : 1;
$mode = $_GET["mode"];
?>
<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>SportsHub</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/message.css">
</head>
<body> 
<header>
    <?php include "header.php"; ?>
</header>  
<section>
    <div id="message_box">
        <h3>
        <?php
            if ($mode == "send")
                echo "송신 쪽지함";
            else
                echo "수신 쪽지함";
        ?>
        </h3>
        <div>
            <ul id="message">
                <li>
                    <span class="col1">번호</span>
                    <span class="col2">제목</span>
                    <span class="col3">
                    <?php
                        echo ($mode == "send") ? "받은이" : "보낸이";
                    ?>
                    </span>
                    <span class="col4">등록일</span>
                </li>
                <?php
                $con = mysqli_connect("localhost", "user", "12345", "TermProject");

                $sql = ($mode == "send") 
                        ? "select * from message where send_id='$userid' order by num desc" 
                        : "select * from message where rv_id='$userid' order by num desc";

                $result = mysqli_query($con, $sql);
                $total_record = mysqli_num_rows($result); // 전체 글 수

                $scale = 10;

                // 전체 페이지 수($total_page) 계산 
                $total_page = ($total_record % $scale == 0) 
                                ? floor($total_record / $scale) 
                                : floor($total_record / $scale) + 1; 

                // 표시할 페이지($page)에 따라 $start 계산  
                $start = ($page - 1) * $scale;      

                $number = $total_record - $start;

                for ($i = $start; $i < $start + $scale && $i < $total_record; $i++) {
                    mysqli_data_seek($result, $i);
                    $row = mysqli_fetch_array($result);
                    $num = $row["num"];
                    $subject = $row["subject"];
                    $regist_day = $row["regist_day"];
                    $msg_id = ($mode == "send") ? $row["rv_id"] : $row["send_id"];

                    $result2 = mysqli_query($con, "select name from members where id='$msg_id'");
                    $record = mysqli_fetch_array($result2);
                    $msg_name = $record["name"];	  
                ?>
                <li>
                    <span class="col1"><?=$number?></span>
                    <span class="col2"><a href="message_view.php?mode=<?=$mode?>&num=<?=$num?>"><?=$subject?></a></span>
                    <span class="col3"><?=$msg_name?>(<?=$msg_id?>)</span>
                    <span class="col4"><?=$regist_day?></span>
                </li>	
                <?php
                    $number--;
                }
                mysqli_close($con);
                ?>
            </ul>
            <ul id="page_num"> 	
                <?php
                if ($total_page >= 2 && $page >= 2) {
                    $new_page = $page - 1;
                    echo "<li><a href='message_box.php?mode=$mode&page=$new_page'>◀ 이전</a></li>";
                } else {
                    echo "<li>&nbsp;</li>";
                }

                for ($i = 1; $i <= $total_page; $i++) {
                    if ($page == $i) {
                        echo "<li><b> $i </b></li>";
                    } else {
                        echo "<li><a href='message_box.php?mode=$mode&page=$i'> $i </a></li>";
                    }
                }

                if ($total_page >= 2 && $page != $total_page) {
                    $new_page = $page + 1;
                    echo "<li><a href='message_box.php?mode=$mode&page=$new_page'>다음 ▶</a></li>";
                } else {
                    echo "<li>&nbsp;</li>";
                }
                ?>
            </ul> <!-- page -->	    	
            <ul class="buttons">
                <?php if ($mode != 'rv'): ?>
                    <li><button onclick="location.href='message_box.php?mode=rv'">수신 쪽지함</button></li>
                <?php endif; ?>
                <?php if ($mode != 'send'): ?>
                    <li><button onclick="location.href='message_box.php?mode=send'">송신 쪽지함</button></li>
                <?php endif; ?>
                <li><button onclick="location.href='message_form.php'">쪽지 보내기</button></li>
            </ul>
        </div> <!-- message_box -->
    </section> 
    <footer>
        <?php include "footer.php"; ?>
    </footer>
</body>
</html>
