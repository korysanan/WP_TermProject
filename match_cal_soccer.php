<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Soccer Schedule</title>
    <link rel="stylesheet" href="./css/match_cal.css">
    <link rel="stylesheet" type="text/css" href="./css/common.css">
</head>
<body>
<header>
    <?php include "header.php";?>
</header>  
<section>
    <div class="title">
        <img src="img/soccerTeam/Kleague.svg" alt="KBO Logo">
        <h2>K LEAGUE</h2>
    </div>
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
                ['18:00', '포항', './img/soccerTeam/ph.png', '대전', './img/soccerTeam/dj.png', '포항 스틸야드'],
                ['19:00', '광주', './img/soccerTeam/kj.png', '김천', './img/soccerTeam/kc.png', '광주 전용'],
                ['20:00', '강원', './img/soccerTeam/kw.png', '수원FC', './img/soccerTeam/sw.png', '춘천 송암'],
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
                ['18:00', '울산', './img/soccerTeam/us.png', '서울', './img/soccerTeam/so.png', '울산 문수'],
                ['18:00', '전북', './img/soccerTeam/jb.png', '인천', './img/soccerTeam/ic.png', '전주 월드컵'],
                ['19:00', '대구', './img/soccerTeam/dg.png', '제주', './img/soccerTeam/jj.png', 'DGB대구은행파크'],
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
        <h3>2024.06.22 (토)</h3>
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
                ['18:00', '대구', './img/soccerTeam/dg.png', '전북', './img/soccerTeam/jb.png', 'DGB대구은행파크'],
                ['19:00', '대전', './img/soccerTeam/dj.png', '광주', './img/soccerTeam/kj.png', '대전 월드컵'],
                ['19:00', '강원', './img/soccerTeam/kw.png', '김천', './img/soccerTeam/kc.png', '강릉 종합'],
                ['20:00', '서울', './img/soccerTeam/so.png', '수원FC', './img/soccerTeam/sw.png', '서울 월드컵'],
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
        <h3>2024.06.23 (일)</h3>
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
                ['18:00', '인천', './img/soccerTeam/ic.png', '포항', './img/soccerTeam/ph.png', '인천 전용'],
                ['19:00', '제주', './img/soccerTeam/jj.png', '울산', './img/soccerTeam/us.png', '제주 월드컵'],
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