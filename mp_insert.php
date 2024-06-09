<?php
session_start();
$userid = $_POST['userid'];
$predictions = json_decode($_POST['predictions'], true);

$con = mysqli_connect("localhost", "user", "12345", "TermProject");

// 기존 예측 정보 가져오기
$sql = "SELECT esports_predict, baseball_predict, soccer_predict FROM predictions WHERE id='$userid'";
$result = mysqli_query($con, $sql);
$existing_esports_predictions = array_fill(0, 10, 0);
$existing_baseball_predictions = array_fill(0, 5, 0);
$existing_soccer_predictions = array_fill(0, 3, 0);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if (!empty($row['esports_predict'])) {
        $existing_esports_predictions = explode(",", $row['esports_predict']);
    }
    if (!empty($row['baseball_predict'])) {
        $existing_baseball_predictions = explode(",", $row['baseball_predict']);
    }
    if (!empty($row['soccer_predict'])) {
        $existing_soccer_predictions = explode(",", $row['soccer_predict']);
    }
}

$new_esports_predictions = isset($predictions['esports']) ? $predictions['esports'] : $existing_esports_predictions;
$new_baseball_predictions = isset($predictions['baseball']) ? $predictions['baseball'] : $existing_baseball_predictions;
$new_soccer_predictions = isset($predictions['soccer']) ? $predictions['soccer'] : $existing_soccer_predictions;

$esports_predict = implode(",", $new_esports_predictions);
$baseball_predict = implode(",", $new_baseball_predictions);
$soccer_predict = implode(",", $new_soccer_predictions);

$sql = "INSERT INTO predictions (id, esports_predict, baseball_predict, soccer_predict) VALUES ('$userid', '$esports_predict', '$baseball_predict', '$soccer_predict')
        ON DUPLICATE KEY UPDATE esports_predict='$esports_predict', baseball_predict='$baseball_predict', soccer_predict='$soccer_predict'";
mysqli_query($con, $sql);

// 포인트 부여하기
$point_up = 0;

// eSports 예측 포인트 계산
if (isset($predictions['esports'])) {
    for ($i = 0; $i < 10; $i++) {
        if ($existing_esports_predictions[$i] == 0 && $new_esports_predictions[$i] != 0) {
            $point_up += 5;
        }
    }
}

// Baseball 예측 포인트 계산
if (isset($predictions['baseball'])) {
    for ($i = 0; $i < 5; $i++) {
        if ($existing_baseball_predictions[$i] == 0 && $new_baseball_predictions[$i] != 0) {
            $point_up += 5;
        }
    }
}

// Soccer 예측 포인트 계산
if (isset($predictions['soccer'])) {
    for ($i = 0; $i < 3; $i++) {
        if ($existing_soccer_predictions[$i] == 0 && $new_soccer_predictions[$i] != 0) {
            $point_up += 5;
        }
    }
}

if ($point_up > 0) {
    $sql = "SELECT point FROM members WHERE id='$userid'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $new_point = $row["point"] + $point_up;
    
    $sql = "UPDATE members SET point=$new_point WHERE id='$userid'";
    mysqli_query($con, $sql);
}

mysqli_close($con);

echo "예측 정보가 성공적으로 저장되었습니다.";
?>