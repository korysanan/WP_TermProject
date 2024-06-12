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
        <img src="./img/lckTeam/lck.svg" alt="LCK logo">
        <span>LCK</span>
    </div>
    <div class="subheader">6월 2주차 승부예측</div>
    <div class="spacing"></div>
    <div id="schedule">
        <?php
        // 데이터베이스에서 예측 정보를 가져옴
        $userid = isset($userid) ? $userid : '';
        $predictions = array_fill(0, 10, 0);

        if ($userid) {
            $con = mysqli_connect("localhost", "user", "12345", "TermProject");
            $sql = "SELECT esports_predict FROM predictions WHERE id='$userid'";
            $result = mysqli_query($con, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $predictions = explode(",", $row['esports_predict']);
            }

            mysqli_close($con);
        }

        $matches = [
            ['date' => '06월 12일 (수)', 'time' => '17:00', 'team1' => 'Dlus KIA', 'team2' => '한화생명e스포츠', 'logo1' => 'dk.png', 'logo2' => 'hle.png'],
            ['date' => '06월 12일 (수)', 'time' => '19:30', 'team1' => '농심 레드포스', 'team2' => 'BNK 피어엑스', 'logo1' => 'ns.png', 'logo2' => 'fox.png'],
            ['date' => '06월 13일 (목)', 'time' => '17:00', 'team1' => 'KT 롤스터', 'team2' => '광동 프릭스', 'logo1' => 'kt.png', 'logo2' => 'kdf.png'],
            ['date' => '06월 13일 (목)', 'time' => '19:30', 'team1' => 'OK저축은행 브리온', 'team2' => 'DRX', 'logo1' => 'bro.png', 'logo2' => 'drx.png'],
            ['date' => '06월 14일 (금)', 'time' => '17:00', 'team1' => '젠지', 'team2' => 'BNK 피어엑스', 'logo1' => 'gen.png', 'logo2' => 'fox.png'],
            ['date' => '06월 14일 (금)', 'time' => '19:30', 'team1' => 'T1', 'team2' => '농심', 'logo1' => 't1.png', 'logo2' => 'ns.png'],
            ['date' => '06월 15일 (토)', 'time' => '15:00', 'team1' => 'OK저축은행', 'team2' => '광동 프릭스', 'logo1' => 'bro.png', 'logo2' => 'kdf.png'],
            ['date' => '06월 15일 (토)', 'time' => '17:30', 'team1' => 'KT 롤스터', 'team2' => 'Dplus KIA', 'logo1' => 'kt.png', 'logo2' => 'dk.png'],
            ['date' => '06월 16일 (일)', 'time' => '15:00', 'team1' => 'DRX', 'team2' => '한화생명e스포츠', 'logo1' => 'drx.png', 'logo2' => 'hle.png'],
            ['date' => '06월 16일 (일)', 'time' => '17:30', 'team1' => '젠지', 'team2' => 'T1', 'logo1' => 'gen.png', 'logo2' => 't1.png'],
        ];

        foreach ($matches as $index => $match) {
            $selectedTeam = $predictions[$index];
            echo "<div class='date-time'>{$match['date']} {$match['time']}</div>";
            echo "<div class='match'>";
            echo "<div class='team " . ($selectedTeam == 1 ? 'selected' : '') . "' style='flex: 1;' data-match='{$index}' onclick='checkLoginAndSelectTeam(this)'>";
            echo "<img src='./img/lckTeam/{$match['logo1']}' alt='{$match['team1']} logo'>";
            echo "{$match['team1']}</div>";
            echo "<div class='vs-container'><div class='vs'>VS</div></div>";
            echo "<div class='team " . ($selectedTeam == 2 ? 'selected' : '') . "' style='flex: 1;' data-match='{$index}' onclick='checkLoginAndSelectTeam(this)'>";
            echo "<img src='./img/lckTeam/{$match['logo2']}' alt='{$match['team2']} logo'>";
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
                esports: new Array(10).fill(0)
            };

            var selectedElements = document.querySelectorAll('.team.selected');
            selectedElements.forEach(function(element) {
                let matchIndex = parseInt(element.getAttribute('data-match'));
                predictions.esports[matchIndex] = element.textContent.trim() === element.parentElement.children[0].textContent.trim() ? 1 : 2;
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