<?php
//requested handled only sign in sign out daydata
$connection = pg_connect("host=localhost dbname=hrm user=hrmpadmin password=hradmin@111 port=5432") or die("cannot connect");
if ($_GET["type"] == "signin") {
    $empid = $_GET["empid"];
    $date = $_GET["date"];
    $signintime = $_GET["signintime"];
    $isLate = $_GET["islate"];

    $today = date("md");
    $attendid = "$today" . "$empid";
    if ($result = pg_query($connection, "insert into Attendance (attendance_id,attendance_date,attendance_sign_in,attendance_isLate,fkemployee_id) values($attendid,'$date','$signintime',$isLate,$empid)")) {
        header("Content-type:application/json");
        echo (json_encode(['status' => 'success', 'attendid' => $attendid, 'message' => 'signed in successfully']));
    } else {
        header("Content-type:application/json");
        $error = pg_last_error($connection);
        echo (json_encode(['status' => 'error', 'message' => $error]));
    }
    pg_free_result($result);
} else if ($_GET["type"] == "signout") {
    $attendid = $_GET["attendid"];
    $isHalfday = $_GET["isHalfday"];
    $signouttime = $_GET["signouttime"];
    $isPresent = $_GET["isPresent"];
    $isOvertime = $_GET["isOvertime"];
    $totalot = $_GET["totalot"];
    if ($result = pg_query($connection, "update Attendance set attendance_sign_out='$signouttime',attendance_isHalfday=$isHalfday,attendance_isOvertime=$isOvertime,attendance_isPresent=$isPresent,attendace_totalovertime=$totalot where attendance_id=$attendid")) {
        header("Content-type:application/json");
        echo (json_encode(['status' => 'success', 'message' => 'attendance marked successfully']));
    } else {
        header("Content-type:application/json");
        $error = pg_last_error($connection);
        echo (json_encode(['status' => 'error', 'message' => $error]));
    }
    pg_free_result($result);
} else if ($_GET["type"] == "daydata") {
    $date = $_GET["date"];
    if ($result = pg_query($connection, "select fkemployee_id,attendance_id,attendance_sign_in,attendance_sign_out from Attendance where attendance_date = '$date'")) {
        $array = [];
        while ($row = pg_fetch_assoc($result)) {
            $array[] = $row;
        }
        header("Content-type:application/json");
        echo (json_encode(['status' => 'success', 'data' => $array]));
    } else {
        header("Content-type:application/json");
        $error = pg_last_error($connection);
        echo (json_encode(['status' => 'error', 'message' => $error]));
    }
    pg_free_result($result);
}
pg_close($connection);