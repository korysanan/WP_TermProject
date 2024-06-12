<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";
    if (isset($_SESSION["userpoint"])) $userpoint = $_SESSION["userpoint"];
    else $userpoint = "";
?>		
<div id="top">
    <h3>
        <a href="index.php"><img src="./img/sports_icon.png" alt="Logo" style="vertical-align:middle; width:50px; height:50px;"> SportsHub</a>
    </h3>
    <ul id="top_menu">  
<?php
    if(!$userid) {
?>                
        <li><a href="member_form.php">회원 가입</a> </li>
        <li> | </li>
        <li><a href="login_form.php">로그인</a></li>
<?php
    } else {
        $logged = $username."님";
?>
        <li><?=$logged?> </li>
        <li> | </li>
        <li><a href="member_modify_form.php">정보 수정</a></li>
        <li> | </li>
        <li><a href="message_box.php?mode=rv">쪽지</a></li>
        <li> | </li>
        <li><a href="logout.php" id="logout-link">로그아웃</a> </li>
<?php
    }
?>
<?php
    if($userlevel==1) {
?>
        <li> | </li>
        <li><a href="admin.php">관리자 모드</a></li>
<?php
    }
?>
    </ul>
</div>
<div id="menu_bar">
    <ul>  
        <li><a href="board_list.php">스포츠 게시판</a></li>
        <li><a href="market_list.php">스포츠 장터</a></li>                                
        <li><a href="mp_select_sports.php">승부 예측</a></li>
        <li><a href="match_cal_select_sports.php">경기 일정</a></li>
    </ul>
</div>

<script>
    document.getElementById('logout-link').addEventListener('click', function(event) {
        if (!confirm('정말 로그아웃 하시겠습니까?')) {
            event.preventDefault();
        }
    });
</script>
