<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>SportsHub</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/member.css">
<script>
   var idChecked = false;
   var nameChecked = false;

   function check_input() {
      var password = document.member_form.pass.value;
      var passwordConfirm = document.member_form.pass_confirm.value;

      if (!document.member_form.id.value) {
          alert("아이디를 입력하세요!");
          document.member_form.id.focus();
          return;
      }

      if (!password) {
          alert("비밀번호를 입력하세요!");
          document.member_form.pass.focus();
          return;
      }

      if (!passwordConfirm) {
          alert("비밀번호확인을 입력하세요!");
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.name.value) {
          alert("닉네임을 입력하세요!");
          document.member_form.name.focus();
          return;
      }

      if (!document.member_form.email1.value) {
          alert("이메일 주소를 입력하세요!");
          document.member_form.email1.focus();
          return;
      }

      if (!document.member_form.email2.value) {
          alert("이메일 주소를 입력하세요!");
          document.member_form.email2.focus();
          return;
      }

      if (password !== passwordConfirm) {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }

      if (!isValidPassword(password)) {
          alert("비밀번호는 최소 8자 이상이어야 하며, 대문자, 소문자, 숫자, 특수문자 중 최소 2개 이상의 조합을 포함해야 합니다.");
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }

      if (!idChecked) {
          alert("아이디 중복 확인을 해주세요!");
          return;
      }

      if (!nameChecked) {
          alert("닉네임 중복 확인을 해주세요!");
          return;
      }

      document.member_form.submit();
   }

   function check_id() {
     var id = document.member_form.id.value;
     if (!id) {
         alert("아이디를 입력하세요!");
         return;
     }
     window.open("member_check_id.php?id=" + id,
         "IDcheck",
          "left=700,top=300,width=350,height=200,scrollbars=no,resizable=yes");
   }

   function check_name() {
     var name = document.member_form.name.value;
     if (!name) {
         alert("닉네임을 입력하세요!");
         return;
     }
     window.open("member_check_name.php?name=" + name,
         "Namecheck",
          "left=700,top=300,width=350,height=200,scrollbars=no,resizable=yes");
   }

   function set_id_checked(status) {
       idChecked = status;
   }

   function set_name_checked(status) {
       nameChecked = status;
   }

   function togglePasswordVisibility(inputId, iconId) {
       var input = document.getElementById(inputId);
       var icon = document.getElementById(iconId);
       if (input.type === "password") {
           input.type = "text";
           icon.classList.remove('fa-eye');
           icon.classList.add('fa-eye-slash');
       } else {
           input.type = "password";
           icon.classList.remove('fa-eye-slash');
           icon.classList.add('fa-eye');
       }
   }

   function showPasswordHint(input) {
       if (input.value === "") {
           input.placeholder = "8자 이상, 대/소/특수 문자 및 숫자 2개이상 조합";
       }
   }

   function hidePasswordHint(input) {
       input.placeholder = "";
   }

   function isValidPassword(password) {
       var regex = /^(?=.*[a-zA-Z])(?=.*[\d\W]).{8,}$/;
       return regex.test(password);
   }
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<header>
    <?php include "header.php";?>
</header>
<section>
    <div id="main_content">
        <div id="join_box">
            <form name="member_form" method="post" action="member_insert.php">
                <h2>회원 가입</h2>
                <div class="form-group">
                    <label for="id">아이디</label>
                    <input type="text" name="id" oninput="idChecked = false;">
                    <div class="col3">
                        <button type="button" class="custom-button" onclick="check_id()">중복 확인</button>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pass">비밀번호</label>
                    <input type="password" name="pass" id="pass" placeholder="8자 이상, 대/소/특수 문자 및 숫자 2개이상 조합" onfocus="hidePasswordHint(this)" onblur="showPasswordHint(this)">
                    <i class="fas fa-eye" id="togglePass" onclick="togglePasswordVisibility('pass', 'togglePass')"></i>
                </div>
                <div class="form-group">
                    <label for="pass_confirm">비밀번호 확인</label>
                    <input type="password" name="pass_confirm" id="pass_confirm">
                    <i class="fas fa-eye" id="togglePassConfirm" onclick="togglePasswordVisibility('pass_confirm', 'togglePassConfirm')"></i>
                </div>
                <div class="form-group">
                    <label for="name">닉네임</label>
                    <input type="text" name="name" oninput="nameChecked = false;">
                    <div class="col3">
                        <button type="button" class="custom-button" onclick="check_name()">중복 확인</button>
                    </div>
                </div>
                <div class="form-group email">
                    <label for="email">이메일</label>
                    <input type="text" name="email1">
                    @
                    <select name="email2">
                        <option value="default" selected>선택하세요</option>
                        <option value="gmail.com">gmail.com</option>
                        <option value="naver.com">naver.com</option>
                        <option value="daum.net">daum.net</option>
                        <option value="hanmail.net">hanmail.net</option>
                        <option value="nate.com">nate.com</option>
                        <option value="custom">직접 입력</option>
                    </select>
                    <input type="text" name="email2_custom" style="display:none;" placeholder="직접 입력">
                </div>
                <div class="bottom_line"></div>
                <div class="buttons">
                    <button type="button" class="signup-button" onclick="check_input()">회원 가입</button>
                </div>
            </form>
        </div> <!-- join_box -->
    </div> <!-- main_content -->
</section>
<footer>
    <?php include "footer.php";?>
</footer>
<script>
    document.querySelector('select[name="email2"]').addEventListener('change', function() {
        var customInput = document.querySelector('input[name="email2_custom"]');
        if (this.value === 'custom') {
            customInput.style.display = 'inline-block';
            this.style.display = 'none';
        } else {
            customInput.style.display = 'none';
            this.style.display = 'inline-block';
        }
    });
</script>
</body>
</html>
