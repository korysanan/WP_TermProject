<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportsHub</title>
    <link rel="stylesheet" href="./css/mp.css">
    <link rel="stylesheet" type="text/css" href="./css/common.css">
</head>
<body>
<header>
    <?php include "header.php";?>
</header>  
<section>
    <div class="header">
        <img src="./img/baseballTeam/kbo.png" alt="KBO logo">
        <span>KBO리그</span>
    </div>
    <div class="subheader">6월 12일 (화) 승부예측</div>
    <div class="spacing"></div>
    <div id="schedule">
        <?php
        // 데이터베이스에서 예측 정보를 가져옴
        $userid = isset($userid) ? $userid : '';
        $predictions = array_fill(0, 5, 0);

        if ($userid) {
            $con = mysqli_connect("localhost", "user", "12345", "TermProject");
            $sql = "SELECT baseball_predict FROM predictions WHERE id='$userid'";
            $result = mysqli_query($con, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $predictions = explode(",", $row['baseball_predict']);
            }

            mysqli_close($con);
        }

        $matches = [
            ['time' => '18:30', 'team1' => '두산 베어스', 'team2' => '한화 이글스', 'logo1' => 'doosan.png', 'logo2' => 'hw.png'],
            ['time' => '18:30', 'team1' => 'SSG 렌더스', 'team2' => 'KIA 타이거즈', 'logo1' => 'ssg.png', 'logo2' => 'kia.png'],
            ['time' => '18:30', 'team1' => 'NC 다이노스', 'team2' => 'KT 위즈', 'logo1' => 'nc.png', 'logo2' => 'kt.png'],
            ['time' => '18:30', 'team1' => '삼성 라이온즈', 'team2' => 'LG 트윈스', 'logo1' => 'samsung.png', 'logo2' => 'lg.png'],
            ['time' => '18:30', 'team1' => '롯데 자이언츠', 'team2' => '키움 히어로즈', 'logo1' => 'lotte.png', 'logo2' => 'kiwoom.png'],
        ];

        foreach ($matches as $index => $match) {
            $selectedTeam = $predictions[$index];
            echo "<div class='match'>";
            echo "<div class='team " . ($selectedTeam == 1 ? 'selected' : '') . "' style='flex: 1;' data-match='{$index}' onclick='checkLoginAndSelectTeam(this)'>";
            echo "<img src='./img/baseballTeam/{$match['logo1']}' alt='{$match['team1']} logo'>";
            echo "{$match['team1']}</div>";
            echo "<div class='vs-container'><div class='vs'>VS</div></div>";
            echo "<div class='team " . ($selectedTeam == 2 ? 'selected' : '') . "' style='flex: 1;' data-match='{$index}' onclick='checkLoginAndSelectTeam(this)'>";
            echo "<img src='./img/baseballTeam/{$match['logo2']}' alt='{$match['team2']} logo'>";
            echo "{$match['team2']}</div>";
            echo "</div>";
        }
        ?>
    </div>

    <button id="save-predictions" onclick="savePredictions()">승부예측 저장</button>

    <script>
        function checkLoginAndSelectTeam(element) {
            var userid = '<?php echo isset($userid) ? $userid : ''; ?>';
            if (!userid) {
                alert('로그인 후 이용해 주세요!');
                return;
            }
            let matchIndex = element.getAttribute('data-match');
            let teams = document.querySelectorAll(`.team[data-match='${matchIndex}']`);
            teams.forEach(team => team.classList.remove('selected'));
            element.classList.add('selected');
        }

        function savePredictions() {
            var userid = '<?php echo isset($userid) ? $userid : ''; ?>';
            if (!userid) {
                alert('로그인 후 이용해 주세요!');
                return;
            }

            var predictions = {
                baseball: new Array(5).fill(0)
            };

            var selectedElements = document.querySelectorAll('.team.selected');
            selectedElements.forEach(function(element) {
                let matchIndex = parseInt(element.getAttribute('data-match'));
                predictions.baseball[matchIndex] = element.textContent.trim() === element.parentElement.children[0].textContent.trim() ? 1 : 2;
            });

            var formData = new FormData();
            formData.append('userid', userid);
            formData.append('predictions', JSON.stringify(predictions));

            fetch('mp_insert.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                console.log('Success:', data);
                alert('승부예측이 저장되었습니다.');
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        }
    </script>
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>