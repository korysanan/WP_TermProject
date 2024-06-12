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
        <img src="./img/soccerTeam/Kleague.svg" alt="Kleague logo">
        <span>K리그</span>
    </div>
    <div class="subheader">6월 15일 (토) 승부예측</div>
    <div class="spacing"></div>
    <div id="schedule">
        <?php
        // 데이터베이스에서 예측 정보를 가져옴
        $userid = isset($userid) ? $userid : '';
        $predictions = array_fill(0, 3, 0);

        if ($userid) {
            $con = mysqli_connect("localhost", "user", "12345", "TermProject");
            $sql = "SELECT soccer_predict FROM predictions WHERE id='$userid'";
            $result = mysqli_query($con, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $predictions = explode(",", $row['soccer_predict']);
            }

            mysqli_close($con);
        }

        $matches = [
            ['time' => '18:00', 'team1' => '포항', 'team2' => '대전', 'logo1' => 'ph.png', 'logo2' => 'dj.png'],
            ['time' => '19:00', 'team1' => '광주', 'team2' => '김천', 'logo1' => 'kj.png', 'logo2' => 'kc.png'],
            ['time' => '20:00', 'team1' => '강원', 'team2' => '수원FC', 'logo1' => 'kw.png', 'logo2' => 'sw.png'],
        ];

        foreach ($matches as $index => $match) {
            $selectedTeam = $predictions[$index];
            echo "<div class='match'>";
            echo "<div class='team " . ($selectedTeam == 1 ? 'selected' : '') . "' style='flex: 1;' data-match='{$index}' onclick='checkLoginAndSelectTeam(this)'>";
            echo "<img src='./img/soccerTeam/{$match['logo1']}' alt='{$match['team1']} logo'>";
            echo "{$match['team1']}</div>";
            echo "<div class='vs-container'><div class='vs'>VS</div></div>";
            echo "<div class='team " . ($selectedTeam == 2 ? 'selected' : '') . "' style='flex: 1;' data-match='{$index}' onclick='checkLoginAndSelectTeam(this)'>";
            echo "<img src='./img/soccerTeam/{$match['logo2']}' alt='{$match['team2']} logo'>";
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
                soccer: new Array(3).fill(0)
            };

            var selectedElements = document.querySelectorAll('.team.selected');
            selectedElements.forEach(function(element) {
                let matchIndex = parseInt(element.getAttribute('data-match'));
                predictions.soccer[matchIndex] = element.textContent.trim() === element.parentElement.children[0].textContent.trim() ? 1 : 2;
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