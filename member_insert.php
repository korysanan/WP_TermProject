<?php
$id = $_POST["id"];
$pass = $_POST["pass"];
$name = $_POST["name"];
$email1 = $_POST["email1"];
$email2 = $_POST["email2"];

$email = $email1 . "@" . $email2;
$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

$con = mysqli_connect("localhost", "user", "12345", "TermProject");

$sql = "insert into members(id, pass, name, email, regist_day, level, point) ";
$sql .= "values('$id', '$pass', '$name', '$email', '$regist_day', 9, 0)";

if (mysqli_query($con, $sql)) {
    echo "
          <script>
              alert('회원가입이 성공적으로 완료되었습니다.');
              location.href = 'login_form.php';
          </script>
      ";
} else {
    echo "
          <script>
              alert('회원가입에 실패하였습니다. 다시 시도해 주세요.');
              window.history.back();
          </script>
      ";
}

mysqli_close($con);
?>