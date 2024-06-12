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
        <h3>
            스포츠 게시판
        </h3>
        <div id="category_buttons">
            <button class="<?= isset($category) && $category == 0 ? 'selected' : '' ?>" onclick="location.href='board_list.php?category=0'" style="padding: 10px 20px; font-size: 16px; margin: 5px 5px 10px 5px; border: 1px solid #dddddd; background-color: <?= isset($category) && $category == 0 ? '#516e7f' : '#f1f1f1' ?>; color: <?= isset($category) && $category == 0 ? 'white' : 'black' ?>; transition: background-color 0.3s, color 0.3s, border-color 0.3s;">전체</button>
            <button class="<?= isset($category) && $category == 1 ? 'selected' : '' ?>" onclick="location.href='board_list.php?category=1'" style="padding: 10px 20px; font-size: 16px; margin: 5px 5px 10px 5px; border: 1px solid #dddddd; background-color: <?= isset($category) && $category == 1 ? '#516e7f' : '#f1f1f1' ?>; color: <?= isset($category) && $category == 1 ? 'white' : 'black' ?>; transition: background-color 0.3s, color 0.3s, border-color 0.3s;">야구</button>
            <button class="<?= isset($category) && $category == 2 ? 'selected' : '' ?>" onclick="location.href='board_list.php?category=2'" style="padding: 10px 20px; font-size: 16px; margin: 5px 5px 10px 5px; border: 1px solid #dddddd; background-color: <?= isset($category) && $category == 2 ? '#516e7f' : '#f1f1f1' ?>; color: <?= isset($category) && $category == 2 ? 'white' : 'black' ?>; transition: background-color 0.3s, color 0.3s, border-color 0.3s;">축구</button>
            <button class="<?= isset($category) && $category == 3 ? 'selected' : '' ?>" onclick="location.href='board_list.php?category=3'" style="padding: 10px 20px; font-size: 16px; margin: 5px 5px 10px 5px; border: 1px solid #dddddd; background-color: <?= isset($category) && $category == 3 ? '#516e7f' : '#f1f1f1' ?>; color: <?= isset($category) && $category == 3 ? 'white' : 'black' ?>; transition: background-color 0.3s, color 0.3s, border-color 0.3s;">농구</button>
            <button class="<?= isset($category) && $category == 4 ? 'selected' : '' ?>" onclick="location.href='board_list.php?category=4'" style="padding: 10px 20px; font-size: 16px; margin: 5px 5px 10px 5px; border: 1px solid #dddddd; background-color: <?= isset($category) && $category == 4 ? '#516e7f' : '#f1f1f1' ?>; color: <?= isset($category) && $category == 4 ? 'white' : 'black' ?>; transition: background-color 0.3s, color 0.3s, border-color 0.3s;">배구</button>
            <button class="<?= isset($category) && $category == 5 ? 'selected' : '' ?>" onclick="location.href='board_list.php?category=5'" style="padding: 10px 20px; font-size: 16px; margin: 5px 5px 10px 5px; border: 1px solid #dddddd; background-color: <?= isset($category) && $category == 5 ? '#516e7f' : '#f1f1f1' ?>; color: <?= isset($category) && $category == 5 ? 'white' : 'black' ?>; transition: background-color 0.3s, color 0.3s, border-color 0.3s;">e스포츠</button>
            <button class="<?= isset($category) && $category == 6 ? 'selected' : '' ?>" onclick="location.href='board_list.php?category=6'" style="padding: 10px 20px; font-size: 16px; margin: 5px 5px 10px 5px; border: 1px solid #dddddd; background-color: <?= isset($category) && $category == 6 ? '#516e7f' : '#f1f1f1' ?>; color: <?= isset($category) && $category == 6 ? 'white' : 'black' ?>; transition: background-color 0.3s, color 0.3s, border-color 0.3s;">기타</button>
        </div>
        <ul id="board_list">
            <li>
                <span class="col1">번호</span>
                <span class="col2">제목</span>
                <span class="col3">글쓴이</span>
                <span class="col4">첨부</span>
                <span class="col5">등록일</span>
                <span class="col6">조회</span>
            </li>
<?php
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = 1;
    }

    if (isset($_GET["category"])) {
        $category = $_GET["category"];
    } else {
        $category = 0;
    }

    $con = mysqli_connect("localhost", "user", "12345", "TermProject");

    if ($category == 0) {
        $sql = "SELECT * FROM board ORDER BY num DESC";
    } else {
        $sql = "SELECT * FROM board WHERE category=$category ORDER BY num DESC";
    }

    $result = mysqli_query($con, $sql);
    $total_record = mysqli_num_rows($result); // 전체 글 수

    $scale = 10;

    // 전체 페이지 수($total_page) 계산 
    if ($total_record % $scale == 0) {
        $total_page = floor($total_record / $scale);
    } else {
        $total_page = floor($total_record / $scale) + 1;
    }

    // 표시할 페이지($page)에 따라 $start 계산  
    $start = ($page - 1) * $scale;

    $number = $total_record - $start;

    for ($i = $start; $i < $start + $scale && $i < $total_record; $i++) {
        mysqli_data_seek($result, $i);
        // 가져올 레코드로 위치(포인터) 이동
        $row = mysqli_fetch_array($result);
        // 하나의 레코드 가져오기
        $num = $row["num"];
        $id = $row["id"];
        $name = $row["name"];
        $subject = $row["subject"];
        $regist_day = $row["regist_day"];
        $hit = $row["hit"];
        if ($row["file_name"]) {
            $file_image = "<img src='./img/file.gif'>";
        } else {
            $file_image = " ";
        }
?>
            <li>
                <span class="col1"><?=$number?></span>
                <span class="col2"><a href="board_view.php?num=<?=$num?>&page=<?=$page?>"><?=$subject?></a></span>
                <span class="col3"><?=$name?></span>
                <span class="col4"><?=$file_image?></span>
                <span class="col5"><?=$regist_day?></span>
                <span class="col6"><?=$hit?></span>
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
        echo "<li><a href='board_list.php?page=$new_page&category=$category'>◀ 이전</a> </li>";
    } else {
        echo "<li>&nbsp;</li>";
    }

    // 게시판 목록 하단에 페이지 링크 번호 출력
    for ($i = 1; $i <= $total_page; $i++) {
        if ($page == $i) { // 현재 페이지 번호 링크 안함
            echo "<li><b> $i </b></li>";
        } else {
            echo "<li><a href='board_list.php?page=$i&category=$category'> $i </a></li>";
        }
    }

    if ($total_page >= 2 && $page != $total_page) {
        $new_page = $page + 1;
        echo "<li> <a href='board_list.php?page=$new_page&category=$category'>다음 ▶</a> </li>";
    } else {
        echo "<li>&nbsp;</li>";
    }
?>
        </ul> <!-- page -->        
        <ul class="buttons">
            <li>
<?php 
    if ($userid) {
?>
                <button onclick="location.href='board_form.php'">글쓰기</button>
<?php
    } else {
?>
                <a href="javascript:alert('로그인 후 이용해 주세요!')"><button>글쓰기</button></a>
<?php
    }
?>
            </li>
        </ul>
    </div> <!-- board_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
