<?php
$connection = pg_connect("host=localhost dbname=hrm user=hrmpadmin password=hradmin@111 port=5432") or die("cannot connect");
if ($_GET["type"] == "leavebalance") {
    $empid = $_GET["empid"];
    if ($result = pg_query($connection, "select employee_el_balance,employee_cl_balance,employee_sl_balance from Employees where employee_id = $empid")) {
        $row = pg_fetch_assoc($result);
        header("Content-type:application/json");
        echo (json_encode(['status' => 'success', 'balance' => $row]));
    } else {
        header("Content-type:application/json");
        $error = pg_last_error($connection);
        echo (json_encode(['status' => 'error', 'message' => $error]));
    }
    pg_free_result($result);
} else if ($_GET["type"] == "newleave") {
    $leaveid = 0;
    $eid = $_GET["eid"];
    $leavetype = $_GET["leavetype"];
    $sdate = $_GET["sdate"];
    $tdate = $_GET["tdate"];
    $applieddate = $_GET["applieddate"];
    $totaldays = $_GET["totaldays"];
    $reasons = $_GET["reasons"];
    $arr = explode("-", $sdate);
    $leaveid = $eid . $arr[1] . $arr[2];
    if ($result = pg_query($connection, "insert into Leave values($leaveid,'$leavetype','$sdate','$tdate',$totaldays,'$reasons','$applieddate',$eid)")) {
        $balanceof = "employee_" . $leavetype . "_balance";
        pg_query($connection, "update Employees set $balanceof = $balanceof - $totaldays where employee_id= $eid");
        header("Content-type:application/json");
        echo (json_encode(['status' => 'success', 'leaveid' => $leaveid]));
    } else {
        header("Content-type:application/json");
        $error = pg_last_error($connection);
        echo (json_encode(['status' => 'error', 'message' => $error]));
    }
    pg_free_result($result);
}
pg_close($connection);

//leave_id | leave_type | leave_start_date | leave_end_date | leave_total_days | leave_reason | leave_applied_date | fkemployee_id