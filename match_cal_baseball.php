<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>SportsHub</title>
    <link rel="stylesheet" href="./css/match_cal.css">
    <link rel="stylesheet" type="text/css" href="./css/common.css">
</head>
<body>
<header>
    <?php include "header.php";?>
</header>  
<section>
    <div class="title">
        <img src="img/baseballTeam/kbo.png" alt="KBO Logo">
        <h2>KBO</h2>
    </div>
    <div class="date">
        <h3>2024.06.11 (화)</h3>
    </div>
    <table>
        <thead>
            <tr>
                <th>시간</th>
                <th>홈 팀</th>
                <th>원정 팀</th>
                <th>경기장</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $schedule = [
                ['18:30', '두산 베어스', './img/baseballTeam/doosan.png', '한화 이글스', './img/baseballTeam/hw.png', '잠실'],
                ['18:30', 'SSG 렌더스', './img/baseballTeam/ssg.png', 'KIA 타이거즈', './img/baseballTeam/kia.png', '문학'],
                ['18:30', 'NC 다이노스', './img/baseballTeam/nc.png', 'KT 위즈', './img/baseballTeam/kt.png', '창원'],
                ['18:30', '삼성 라이온즈', './img/baseballTeam/samsung.png', 'LG 트윈스', './img/baseballTeam/lg.png', '대구'],
                ['18:30', '롯데 자이언츠', './img/baseballTeam/lotte.png', '키움 히어로즈', './img/baseballTeam/kiwoom.png', '사직'],
            ];

            foreach ($schedule as $game) {
                echo "<tr>";
                echo "<td>{$game[0]}</td>";
                echo "<td><img class='team-logo' src='{$game[2]}' alt='{$game[1]}'> {$game[1]}</td>";
                echo "<td><img class='team-logo' src='{$game[4]}' alt='{$game[3]}'> {$game[3]}</td>";
                echo "<td>{$game[5]}</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <div class="date">
        <h3>2024.06.12 (수)</h3>
    </div>
    <table>
        <thead>
            <tr>
                <th>시간</th>
                <th>홈 팀</th>
                <th>원정 팀</th>
                <th>경기장</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $schedule = [
                ['18:30', '두산 베어스', './img/baseballTeam/doosan.png', '한화 이글스', './img/baseballTeam/hw.png', '잠실'],
                ['18:30', 'SSG 렌더스', './img/baseballTeam/ssg.png', 'KIA 타이거즈', './img/baseballTeam/kia.png', '문학'],
                ['18:30', 'NC 다이노스', './img/baseballTeam/nc.png', 'KT 위즈', './img/baseballTeam/kt.png', '창원'],
                ['18:30', '삼성 라이온즈', './img/baseballTeam/samsung.png', 'LG 트윈스', './img/baseballTeam/lg.png', '대구'],
                ['18:30', '롯데 자이언츠', './img/baseballTeam/lotte.png', '키움 히어로즈', './img/baseballTeam/kiwoom.png', '사직'],
            ];

            foreach ($schedule as $game) {
                echo "<tr>";
                echo "<td>{$game[0]}</td>";
                echo "<td><img class='team-logo' src='{$game[2]}' alt='{$game[1]}'> {$game[1]}</td>";
                echo "<td><img class='team-logo' src='{$game[4]}' alt='{$game[3]}'> {$game[3]}</td>";
                echo "<td>{$game[5]}</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <div class="date">
        <h3>2024.06.13 (목)</h3>
    </div>
    <table>
        <thead>
            <tr>
                <th>시간</th>
                <th>홈 팀</th>
                <th>원정 팀</th>
                <th>경기장</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $schedule = [
                ['18:30', '두산 베어스', './img/baseballTeam/doosan.png', '한화 이글스', './img/baseballTeam/hw.png', '잠실'],
                ['18:30', 'SSG 렌더스', './img/baseballTeam/ssg.png', 'KIA 타이거즈', './img/baseballTeam/kia.png', '문학'],
                ['18:30', 'NC 다이노스', './img/baseballTeam/nc.png', 'KT 위즈', './img/baseballTeam/kt.png', '창원'],
                ['18:30', '삼성 라이온즈', './img/baseballTeam/samsung.png', 'LG 트윈스', './img/baseballTeam/lg.png', '대구'],
                ['18:30', '롯데 자이언츠', './img/baseballTeam/lotte.png', '키움 히어로즈', './img/baseballTeam/kiwoom.png', '사직'],
            ];

            foreach ($schedule as $game) {
                echo "<tr>";
                echo "<td>{$game[0]}</td>";
                echo "<td><img class='team-logo' src='{$game[2]}' alt='{$game[1]}'> {$game[1]}</td>";
                echo "<td><img class='team-logo' src='{$game[4]}' alt='{$game[3]}'> {$game[3]}</td>";
                echo "<td>{$game[5]}</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <div class="date">
        <h3>2024.06.14 (금)</h3>
    </div>
    <table>
        <thead>
            <tr>
                <th>시간</th>
                <th>홈 팀</th>
                <th>원정 팀</th>
                <th>경기장</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $schedule = [
                ['18:30', 'KT 위즈', './img/baseballTeam/kt.png', 'KIA 타이거즈', './img/baseballTeam/kia.png', '수원'],
                ['18:30', 'LG 트윈스', './img/baseballTeam/lg.png', '롯데 자이언츠', './img/baseballTeam/lotte.png', '잠실'],
                ['18:30', '키움 히어로즈', './img/baseballTeam/kiwoom.png', '두산 베어스', './img/baseballTeam/doosan.png', '고척'],
                ['18:30', '한화 이글스', './img/baseballTeam/hw.png', 'SSG 렌더스', './img/baseballTeam/ssg.png', '대전'],
                ['18:30', '삼성 라이온즈', './img/baseballTeam/samsung.png', 'NC 다이노스', './img/baseballTeam/nc.png', '창원'],
            ];

            foreach ($schedule as $game) {
                echo "<tr>";
                echo "<td>{$game[0]}</td>";
                echo "<td><img class='team-logo' src='{$game[2]}' alt='{$game[1]}'> {$game[1]}</td>";
                echo "<td><img class='team-logo' src='{$game[4]}' alt='{$game[3]}'> {$game[3]}</td>";
                echo "<td>{$game[5]}</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <div class="date">
        <h3>2024.06.15 (토)</h3>
    </div>
    <table>
        <thead>
            <tr>
                <th>시간</th>
                <th>홈 팀</th>
                <th>원정 팀</th>
                <th>경기장</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $schedule = [
                ['17:00', 'KT 위즈', './img/baseballTeam/kt.png', 'KIA 타이거즈', './img/baseballTeam/kia.png', '수원'],
                ['17:00', 'LG 트윈스', './img/baseballTeam/lg.png', '롯데 자이언츠', './img/baseballTeam/lotte.png', '잠실'],
                ['17:00', '키움 히어로즈', './img/baseballTeam/kiwoom.png', '두산 베어스', './img/baseballTeam/doosan.png', '고척'],
                ['17:00', '한화 이글스', './img/baseballTeam/hw.png', 'SSG 렌더스', './img/baseballTeam/ssg.png', '대전'],
                ['17:00', '삼성 라이온즈', './img/baseballTeam/samsung.png', 'NC 다이노스', './img/baseballTeam/nc.png', '창원'],
            ];

            foreach ($schedule as $game) {
                echo "<tr>";
                echo "<td>{$game[0]}</td>";
                echo "<td><img class='team-logo' src='{$game[2]}' alt='{$game[1]}'> {$game[1]}</td>";
                echo "<td><img class='team-logo' src='{$game[4]}' alt='{$game[3]}'> {$game[3]}</td>";
                echo "<td>{$game[5]}</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <div class="date">
        <h3>2024.06.16 (일)</h3>
    </div>
    <table>
        <thead>
            <tr>
                <th>시간</th>
                <th>홈 팀</th>
                <th>원정 팀</th>
                <th>경기장</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $schedule = [
                ['14:00', '키움 히어로즈', './img/baseballTeam/kiwoom.png', '두산 베어스', './img/baseballTeam/doosan.png', '고척'],
                ['17:00', 'KT 위즈', './img/baseballTeam/kt.png', 'KIA 타이거즈', './img/baseballTeam/kia.png', '수원'],
                ['17:00', 'LG 트윈스', './img/baseballTeam/lg.png', '롯데 자이언츠', './img/baseballTeam/lotte.png', '잠실'],
                ['17:00', '한화 이글스', './img/baseballTeam/hw.png', 'SSG 렌더스', './img/baseballTeam/ssg.png', '대전'],
                ['17:00', '삼성 라이온즈', './img/baseballTeam/samsung.png', 'NC 다이노스', './img/baseballTeam/nc.png', '창원'],
            ];

            foreach ($schedule as $game) {
                echo "<tr>";
                echo "<td>{$game[0]}</td>";
                echo "<td><img class='team-logo' src='{$game[2]}' alt='{$game[1]}'> {$game[1]}</td>";
                echo "<td><img class='team-logo' src='{$game[4]}' alt='{$game[3]}'> {$game[3]}</td>";
                echo "<td>{$game[5]}</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
