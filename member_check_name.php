<!DOCTYPE html>
<head>
<meta charset="utf-8">
<style>
h3 {
   padding-left: 5px;
   border-left: solid 5px #FF0000;
}
#close {
   display: flex;
   justify-content: center;
   align-items: center;
   cursor: pointer;
}
#close img {
   width: 50px; /* 원하는 너비로 설정 */
   height: 50px; /* 원하는 높이로 설정 */
}
</style>
<script>
   function set_name_checked(status) {
       opener.set_name_checked(status);
       // self.close(); // 창을 닫지 않도록 주석 처리
   }
</script>
</head>
<body>
<h3>닉네임 중복체크</h3>
<p>
<?php
   $name = $_GET["name"];

   if(!$name) 
   {
      echo("<li>닉네임을 입력해 주세요!</li>");
   }
   else
   {
      $con = mysqli_connect("localhost", "user", "12345", "TermProject");

 
      $sql = "select * from members where name='$name'";
      $result = mysqli_query($con, $sql);

      $num_record = mysqli_num_rows($result);

      if ($num_record)
      {
         echo "<li>".$name." 닉네임이 중복됩니다.</li>";
         echo "<li>다른 닉네임을 사용해 주세요!</li>";
         echo "<script>set_name_checked(false);</script>";
      }
      else
      {
         echo "<li>".$name." 닉네임은 사용 가능합니다.</li>";
         echo "<script>set_name_checked(true);</script>";
      }
    
      mysqli_close($con);
   }
?>
</p>
<div id="close">
   <img src="./img/close.png" onclick="self.close()"> <!-- 직접 닫기 -->
</div>
</body>
</html>