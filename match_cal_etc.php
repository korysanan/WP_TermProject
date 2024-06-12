<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportsHub</title>
    <link rel="stylesheet" type="text/css" href="./css/match_cal_etc.css">
    <link rel="stylesheet" type="text/css" href="./css/common.css">
</head>
<body>
<header>
    <?php include "header.php";?>
</header>  
<section>
<h1>
    골프
</h1>
<table>
    <thead>
        <tr>
            <th>Date</th>
            <th>Tournament</th>
            <th>Location</th>
            <th>Prize Money</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $tournaments = [
            ["06.13 - 06.16", "KGA DB그룹 제38회 한국여자오픈 골프선수권대회", "레인보우힐스", "₩1,200,000,000"],
            ["06.13 - 06.16", "하나은행 인비테이셔널", "남춘천 CC", "₩1,300,000,000"],
            ["06.13 - 06.17", "U.S. 오픈", "파인허스트 리조트 & CC", "-"],
            ["06.13 - 06.17", "마이어 LPGA 클래식 포 심플리 기브", "블라이더필드 CC", "$3,000,000"],
            ["06.20 - 06.23", "KGA 코오롱 제66회 한국오픈", "우정힐스 CC", "₩1,400,000,000"],
            ["06.20 - 06.23", "BC카드·한경 레이디스컵 2024", "포천힐스", "₩1,400,000,000"],
            ["06.20 - 06.24", "KPMG 위민스 PGA 챔피언십", "사울라 리버 컨트리 클럽", "$10,000,000"],
            ["06.20 - 06.24", "트래블러스 챔피언십", "TPC 리버 하이랜즈", "$20,000,000"],
        ];

        foreach ($tournaments as $tournament) {
            echo "<tr>";
            echo "<td>{$tournament[0]}</td>";
            echo "<td>{$tournament[1]}</td>";
            echo "<td>{$tournament[2]}</td>";
            echo "<td>{$tournament[3]}</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
<h1>
    바둑
</h1>
<table>
    <thead>
        <tr>
            <th>Date</th>
            <th>Tournament</th>
            <th>Location</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $tournaments = [
            ["06.11 19:00", "18기 지지옥션배 소년 대 소녀 유망주 연승대항전", "바둑TV 스튜디오"],
            ["06.12 10:00", "제5회 월드 바둑 챔피언십 16강전", "바둑TV 스튜디오"],
            ["06.12 14:30", "제5회 월드 바둑 챔피언십 8강전", "바둑TV 스튜디오"],
            ["06.13 10:00", "제5회 월드 바둑 챔피언십 준결승", "바둑TV 스튜디오"],
            ["06.13 14:30", "제5회 월드 바둑 챔피언십 결승전", "바둑TV 스튜디오"],
            ["06.13 23:00", "제17기 YES24배 고교동문전", "바둑TV 스튜디오"],
        ];

        foreach ($tournaments as $tournament) {
            echo "<tr>";
            echo "<td>{$tournament[0]}</td>";
            echo "<td>{$tournament[1]}</td>";
            echo "<td>{$tournament[2]}</td>";
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
