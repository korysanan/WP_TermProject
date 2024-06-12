<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>SportsHub</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/market.css">
<script>
  function check_input() {
      if (!document.market_form.subject.value) {
          alert("제목을 입력하세요!");
          document.market_form.subject.focus();
          return;
      }
      if (!document.market_form.content.value) {
          alert("내용을 입력하세요!");    
          document.market_form.content.focus();
          return;
      }
      if (!document.market_form.price.value) {
          alert("가격을 입력하세요!");
          document.market_form.price.focus();
          return;
      }
      document.market_form.submit();
  }

  function prependCategory() {
      var categorySelect = document.getElementById("category");
      var category = categorySelect.options[categorySelect.selectedIndex].text;
      var subject = document.getElementById("subject");
      var subjectValue = subject.value;

      var regex = /^\[.*?\]\s*/;
      subjectValue = subjectValue.replace(regex, "");

      if (categorySelect.value != "0") {
          subject.value = "[" + category + "] " + subjectValue;
      } else {
          subject.value = subjectValue;
      }
  }
</script>
</head>
<body> 
<header>
    <?php include "header.php";?>
</header>  
<section>
    <div id="board_box">
        <h3 id="board_title">
            장터 > 글 수정하기
        </h3>
<?php
    $num  = $_GET["num"];
    $page = $_GET["page"];
    
    $con = mysqli_connect("localhost", "user", "12345", "TermProject");
    $sql = "select * from market where num=$num";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $name       = $row["name"];
    $subject    = $row["subject"];
    $content    = $row["content"];
    $price      = $row["price"];
    $file_name  = $row["file_name"];
    $category   = $row["category"];
?>
        <form  name="market_form" method="post" action="market_modify.php?num=<?=$num?>&page=<?=$page?>" enctype="multipart/form-data">
             <ul id="board_form">
                <li>
                    <span class="col1">이름 : </span>
                    <span class="col2"><?=$name?></span>
                </li>      
                <li>
                    <span class="col1">카테고리 : </span>
                    <span class="col2">
                        <select id="category" name="category">
                            <option value="0">카테고리 선택</option>
                            <option value="1" <?= $category == 1 ? 'selected' : '' ?>>야구</option>
                            <option value="2" <?= $category == 2 ? 'selected' : '' ?>>축구</option>
                            <option value="3" <?= $category == 3 ? 'selected' : '' ?>>농구</option>
                            <option value="4" <?= $category == 4 ? 'selected' : '' ?>>배구</option>
                            <option value="5" <?= $category == 5 ? 'selected' : '' ?>>e스포츠</option>
                            <option value="6" <?= $category == 6 ? 'selected' : '' ?>>기타</option>
                        </select>
                    </span>
                </li>
                <li>
                    <span class="col1">가격(₩) : </span>
                    <span class="col2"><input id="price" name="price" type="number" min="0" step="1" value="<?=$price?>"></span>
                </li>
                <li>
                    <span class="col1">제목 : </span>
                    <span class="col2"><input id="subject" name="subject" type="text" value="<?=$subject?>"></span>
                </li>          
                <li id="text_area">    
                    <span class="col1">내용 : </span>
                    <span class="col2">
                        <textarea name="content"><?=$content?></textarea>
                    </span>
                </li>
                <li>
                    <span class="col1"> 첨부 파일 : </span>
                    <span class="col2"><?=$file_name?></span>
                </li>
            </ul>
            <ul class="buttons">
                <li><button type="button" onclick="prependCategory(); check_input()">수정하기</button></li>
                <li><button type="button" onclick="location.href='market_list.php'">목록</button></li>
            </ul>
        </form>
    </div> <!-- board_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>