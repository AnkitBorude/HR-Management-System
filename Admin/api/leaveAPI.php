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
    $leaveid = random_int(0, 1000000);
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
} else if ($_GET["type"] == "deleteleave") {
    $leaveid = $_GET["leaveid"];
    $leavetype = $_GET["leavetype"];
    $totaldays = $_GET["totaldays"];
    $eid = $_GET["eid"];

    if ($result = pg_query($connection, "delete from Leave where leave_id=$leaveid")) {
        $balanceof = "employee_" . $leavetype . "_balance";
        pg_query($connection, "update Employees set $balanceof = $balanceof + $totaldays where employee_id= $eid");
        header("Content-type:application/json");
        echo (json_encode(['status' => 'success', 'message' => 'deleted']));
    } else {
        header("Content-type:application/json");
        $error = pg_last_error($connection);
        echo (json_encode(['status' => 'error', 'message' => $error]));
    }
    pg_free_result($result);
} else if ($_GET["type"] == "rangedata") {
    $fromdate = $_GET["from"];
    $todate = $_GET["to"];
    if ($result = pg_query($connection, "select employee_full_name,leave_id,role_name,leave_type,leave_start_date,leave_end_date,leave_total_days,leave_applied_date,fkemployee_id as emp_id from Leave inner join Employees on Leave.fkemployee_id=Employees.employee_id left join Role on Employees.fkrole_id=Role.role_id where leave_start_date>= '$fromdate' and leave_end_date<='$todate' and leave_status = 'A' order by leave_applied_date;")) {
        $array = [];
        while ($row = pg_fetch_assoc($result)) {
            $array[] = $row;
        }
        header("Content-type:application/json");
        echo (json_encode(['status' => 'success', 'data' => $array]));
    }
    pg_free_result($result);
} else if ($_GET["type"] == "leavedata") {
    $date = $_GET["date"];
    $tommorrow = $_GET["tommorrow"];
    if ($result = pg_query($connection, "select employee_full_name as ename,role_name as role,leave_type,leave_reason,leave_applied_date,fkemployee_id as emp_id from Leave right join Employees on Leave.fkemployee_id=Employees.employee_id left join Role on Employees.fkrole_id=Role.role_id where '$date' >= leave_start_date and '$date'<=leave_end_date and leave_status='A';")) {
        $array = [];
        while ($row = pg_fetch_assoc($result)) {
            $array[] = $row;
        }
        $result = pg_query($connection, "select count(*) from Leave right join Employees on Leave.fkemployee_id=Employees.employee_id left join Role on Employees.fkrole_id=Role.role_id where '$date' >= leave_start_date and '$date'<=leave_end_date and leave_status='A'");
        $todaytotal = pg_fetch_row($result);

        $result = pg_query($connection, "select count(*) from Leave where '$tommorrow' >= leave_start_date and '$tommorrow'<=leave_end_date and leave_status='A'");
        $tommorrowtot = pg_fetch_row($result);

        $result = pg_query($connection, "select count(*) from Leave where '$date' >= leave_start_date and '$date'<=leave_end_date and leave_type='cl' where leave_status='A'");
        $cltotal = pg_fetch_row($result);

        $result = pg_query($connection, "select count(*) from Leave where '$date' >= leave_start_date and '$date'<=leave_end_date and leave_type='sl' where leave_status='A'");
        $sltotal = pg_fetch_row($result);

        $result = pg_query($connection, "select count(*) from Leave where '$date' >= leave_start_date and '$date'<=leave_end_date and leave_type='el' where leave_status='A'");
        $eltotal = pg_fetch_row($result);

        header("Content-type:application/json");
        echo (json_encode(['status' => 'success', 'data' => $array, 'todaytotal' => $todaytotal[0], 'tommorrowtotal' => $tommorrowtot[0], 'cltotal' => $cltotal[0], 'eltotal' => $eltotal[0], 'sltotal' => $sltotal[0]]));
    }
    pg_free_result($result);
} else if ($_GET["type"] == "todaysleavedata") {
    $date = $_GET["date"];
    if ($result = pg_query($connection, "select count(*) from Leave where '$date' >= leave_start_date and '$date'<=leave_end_date and leave_status='A'")) {
        $row = pg_fetch_row($result);
        header("Content-type:application/json");
        echo (json_encode(['status' => 'success', 'data' => $row[0]]));
    } else {
        header("Content-type:application/json");
        $error = pg_last_error($connection);
        echo (json_encode(['status' => 'error', 'message' => $error]));
    }
    pg_free_result($result);
} else if ($_GET["type"] == "creditbalance") {
    $el = $_GET["el"];
    $cl = $_GET["cl"];
    $sl = $_GET["sl"];
    if ($result = pg_query($connection, "update Employees set employee_el_balance=employee_el_balance+$el,employee_sl_balance=employee_sl_balance+$sl,employee_cl_balance=employee_cl_balance+$cl")) {
        $row = pg_fetch_row($result);
        header("Content-type:application/json");
        echo (json_encode(['status' => 'success', 'data' => $row[0]]));
    } else {
        header("Content-type:application/json");
        $error = pg_last_error($connection);
        echo (json_encode(['status' => 'error', 'message' => $error]));
    }
    pg_free_result($result);
} else if ($_GET["type"] == "rejectleave") {
    $leaveid = $_GET["leaveid"];
    $leavetype = $_GET["leavetype"];
    $totaldays = $_GET["totaldays"];
    $eid = $_GET["eid"];

    if ($result = pg_query($connection, "update Leave set leave_status='R' where leave_id=$leaveid")) {
        $balanceof = "employee_" . $leavetype . "_balance";
        pg_query($connection, "update Employees set $balanceof = $balanceof + $totaldays where employee_id= $eid");
        header("Content-type:application/json");
        echo (json_encode(['status' => 'success', 'message' => 'rejected']));
    } else {
        header("Content-type:application/json");
        $error = pg_last_error($connection);
        echo (json_encode(['status' => 'error', 'message' => $error]));
    }
    pg_free_result($result);
} else if ($_GET["type"] == "approveleave") {
    $leaveid = $_GET["leaveid"];
    if ($result = pg_query($connection, "update Leave set leave_status='A' where leave_id=$leaveid")) {
        header("Content-type:application/json");
        echo (json_encode(['status' => 'success', 'message' => 'approved']));
    } else {
        header("Content-type:application/json");
        $error = pg_last_error($connection);
        echo (json_encode(['status' => 'error', 'message' => $error]));
    }
    pg_free_result($result);
}

pg_close($connection);
