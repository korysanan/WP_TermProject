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
        <img src="img/lckTeam/lck.svg" alt="KBO Logo">
        <h2>LCK</h2>
    </div>
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
                ['17:00', 'Dplus KIA', './img/lckTeam/dk.png', '한화생명e스포츠', './img/lckTeam/hle.png', '서울LoL PARK'],
                ['19:30', '농심 레드포스', './img/lckTeam/ns.png', 'BNK 피어엑스', './img/lckTeam/fox.png', '서울LoL PARK'],
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
                ['17:00', 'KT 롤스터', './img/lckTeam/kt.png', '광동 프릭스', './img/lckTeam/kdf.png', '서울LoL PARK'],
                ['19:30', 'OK저축은행 브리온', './img/lckTeam/bro.png', 'DRX', './img/lckTeam/drx.png', '서울LoL PARK'],
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
                ['17:00', '젠지', './img/lckTeam/gen.png', 'BNK 피어엑스', './img/lckTeam/fox.png', '서울LoL PARK'],
                ['19:30', 'T1', './img/lckTeam/t1.png', '농심 레드포스', './img/lckTeam/ns.png', '서울LoL PARK'],
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
                ['15:00', 'OK저축은행 브리온', './img/lckTeam/bro.png', '광동 프릭스', './img/lckTeam/kdf.png', '서울LoL PARK'],
                ['17:30', 'KT 롤스터', './img/lckTeam/kt.png', 'Dplus KIA', './img/lckTeam/dk.png', '서울LoL PARK'],
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
                ['15:00', 'DRX', './img/lckTeam/drx.png', '한화생명e스포츠', './img/lckTeam/hle.png', '서울LoL PARK'],
                ['17:30', '젠지', './img/lckTeam/gen.png', 'T1', './img/lckTeam/t1.png', '서울LoL PARK'],
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