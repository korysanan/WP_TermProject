<?php
    $num = $_GET["num"];
    $page = $_GET["page"];

    $subject = $_POST["subject"];
    $content = $_POST["content"];
    $price = $_POST["price"];
    $category = $_POST["category"];

    $subject = htmlspecialchars($subject, ENT_QUOTES);
    $content = htmlspecialchars($content, ENT_QUOTES);
    $price = htmlspecialchars($price, ENT_QUOTES);

    $upload_dir = './data/';

    $upfile_name = $_FILES["upfile"]["name"];
    $upfile_tmp_name = $_FILES["upfile"]["tmp_name"];
    $upfile_type = $_FILES["upfile"]["type"];
    $upfile_size = $_FILES["upfile"]["size"];
    $upfile_error = $_FILES["upfile"]["error"];

    $con = mysqli_connect("localhost", "user", "12345", "TermProject");

    if ($upfile_name && !$upfile_error) {
        $file = explode(".", $upfile_name);
        $file_name = $file[0];
        $file_ext = $file[1];

        $new_file_name = date("Y_m_d_H_i_s");
        $new_file_name = $new_file_name;
        $copied_file_name = $new_file_name . "." . $file_ext;
        $uploaded_file = $upload_dir . $copied_file_name;

        if ($upfile_size > 1000000) {
            echo("
                <script>
                alert('업로드 파일 크기가 지정된 용량(1MB)을 초과합니다! 파일 크기를 체크해주세요!');
                history.go(-1)
                </script>
            ");
            exit;
        }

        if (!move_uploaded_file($upfile_tmp_name, $uploaded_file)) {
            echo("
                <script>
                alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
                history.go(-1)
                </script>
            ");
            exit;
        }

        $sql = "UPDATE market SET subject='$subject', content='$content', price='$price', category='$category', 
                file_name='$upfile_name', file_type='$upfile_type', file_copied='$copied_file_name' 
                WHERE num=$num";
    } else {
        $sql = "UPDATE market SET subject='$subject', content='$content', price='$price', category='$category' WHERE num=$num";
    }

    mysqli_query($con, $sql);

    mysqli_close($con);     

    echo "
          <script>
              location.href = 'market_list.php?page=$page';
          </script>
      ";
?>
