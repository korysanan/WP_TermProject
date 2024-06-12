<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>SportsHub</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/member.css">
<script type="text/javascript" src="./js/member_modify.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script>
   var nameChecked = false;

   function check_input() {
      var password = document.member_form.pass.value;
      var passwordConfirm = document.member_form.pass_confirm.value;

      if (!password) {
          alert("비밀번호를 입력하세요!");
          document.member_form.pass.focus();
          return;
      }

      if (!passwordConfirm) {
          alert("비밀번호 확인을 입력하세요!");
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.name.value) {
          alert("닉네임을 입력하세요!");
          document.member_form.name.focus();
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

      if (!nameChecked) {
          alert("닉네임 중복 확인을 해주세요!");
          return;
      }

      document.member_form.submit();
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

   function set_name_checked(status) {
       nameChecked = status;
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

   function handleEmailSelectChange(select) {
       var customInput = document.querySelector('input[name="email2_custom"]');
       if (select.value === 'custom') {
           customInput.style.display = 'inline-block';
           select.style.display = 'none';
       } else {
           customInput.style.display = 'none';
           select.style.display = 'inline-block';
       }
   }
</script>
</head>
<body> 
	<header>
    	<?php include "header.php";?>
    </header>
<?php    
   	$con = mysqli_connect("localhost", "user", "12345", "TermProject");
    $sql    = "select * from members where id='$userid'";
    $result = mysqli_query($con, $sql);
    $row    = mysqli_fetch_array($result);

    $pass = $row["pass"];
    $name = $row["name"];

    $email = explode("@", $row["email"]);
    $email1 = $email[0];
    $email2 = $email[1];

    mysqli_close($con);
?>
	<section>
        <div id="main_content">
      		<div id="join_box">
          	<form name="member_form" method="post" action="member_modify.php?id=<?=$userid?>">
			    <h2>회원 정보수정</h2>
    		    	<div class="form-group">
				        <label for="id">아이디</label>
				        <div class="col2">
							<?=$userid?>
				        </div>                 
			       	</div>

			       	<div class="form-group">
				        <label for="pass">비밀번호</label>
				        <div class="col2">
							<input type="password" name="pass" id="pass" value="<?=$pass?>" onfocus="hidePasswordHint(this)" onblur="showPasswordHint(this)">
				        </div>                 
			       	</div>

			       	<div class="form-group">
				        <label for="pass_confirm">비밀번호 확인</label>
				        <div class="col2">
							<input type="password" name="pass_confirm" id="pass_confirm" value="<?=$pass?>">
				        </div>                 
			       	</div>

			       	<div class="form-group">
				        <label for="name">닉네임</label>
				        <div class="col2">
							<input type="text" name="name" value="<?=$name?>" oninput="nameChecked = false;">
                            <button type="button" class="custom-button" onclick="check_name()" style="margin-left: 10px;">중복 확인</button>
				        </div>                 
			       	</div>

			       	<div class="form-group email">
				        <label for="email">이메일</label>
				        <div class="col2">
                            <input type="text" name="email1" value="<?=$email1?>">@ 
                            <select name="email2" onchange="handleEmailSelectChange(this)">
                                <option value="gmail.com" <?=$email2 == 'gmail.com' ? 'selected' : ''?>>gmail.com</option>
                                <option value="naver.com" <?=$email2 == 'naver.com' ? 'selected' : ''?>>naver.com</option>
                                <option value="daum.net" <?=$email2 == 'daum.net' ? 'selected' : ''?>>daum.net</option>
                                <option value="hanmail.net" <?=$email2 == 'hanmail.net' ? 'selected' : ''?>>hanmail.net</option>
                                <option value="nate.com" <?=$email2 == 'nate.com' ? 'selected' : ''?>>nate.com</option>
                                <option value="custom" <?=$email2 != 'gmail.com' && $email2 != 'naver.com' && $email2 != 'daum.net' && $email2 != 'hanmail.net' && $email2 != 'nate.com' ? 'selected' : ''?>>직접 입력</option>
                            </select>
                            <input type="text" name="email2_custom" value="<?=$email2 != 'gmail.com' && $email2 != 'naver.com' && $email2 != 'daum.net' && $email2 != 'hanmail.net' && $email2 != 'nate.com' ? $email2 : ''?>" style="display: <?=$email2 != 'gmail.com' && $email2 != 'naver.com' && $email2 != 'daum.net' && $email2 != 'hanmail.net' && $email2 != 'nate.com' ? 'inline-block' : 'none'?>;" placeholder="직접 입력">
				        </div>                 
			       	</div>

			       	<div class="bottom_line"></div>
			       	<div class="buttons">
	                	<button type="button" class="signup-button" onclick="check_input()">저장하기</button>
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
