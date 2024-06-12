<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>SportsHub</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/market.css">
<script>
  function check_input() {
      if (!document.board_form.subject.value) {
          alert("제목을 입력하세요!");
          document.board_form.subject.focus();
          return;
      }
      if (!document.board_form.content.value) {
          alert("내용을 입력하세요!");    
          document.board_form.content.focus();
          return;
      }
      if (!document.board_form.price.value) {
          alert("가격을 입력하세요!");
          document.board_form.price.focus();
          return;
      }
      document.board_form.submit();
   }

   function prependCategory() {
       var categorySelect = document.getElementById("category");
       var category = categorySelect.options[categorySelect.selectedIndex].text;
       var subject = document.getElementById("subject");
       if (categorySelect.value != "0") {
           subject.value = "[" + category + "] " + subject.value;
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
            장터 > 글 쓰기
        </h3>
        <form name="board_form" method="post" action="market_insert.php" enctype="multipart/form-data">
            <ul id="board_form">
                <li>
                    <span class="col1">이름 : </span>
                    <span class="col2"><?=$username?></span>
                </li>      
                <li>
                    <span class="col1">카테고리 : </span>
                    <span class="col2">
                        <select id="category" name="category">
                            <option value="0">카테고리 선택</option>
                            <option value="1">야구</option>
                            <option value="2">축구</option>
                            <option value="3">농구</option>
                            <option value="4">배구</option>
                            <option value="5">e스포츠</option>
                            <option value="6">기타</option>
                        </select>
                    </span>
                </li>
                <li>
                    <span class="col1">가격(₩) : </span>
                    <span class="col2"><input id="price" name="price" type="number" min="0" step="1"></span>
                </li>
                <li>
                    <span class="col1">제목 : </span>
                    <span class="col2"><input id="subject" name="subject" type="text"></span>
                </li>          
                <li id="text_area">    
                    <span class="col1">내용 : </span>
                    <span class="col2">
                        <textarea name="content"></textarea>
                    </span>
                </li>
                <li>
                    <span class="col1"> 첨부 파일</span>
                    <span class="col2"><input type="file" name="upfile"></span>
                </li>
            </ul>
            <ul class="buttons">
                <li><button type="button" onclick="prependCategory(); check_input()">완료</button></li>
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