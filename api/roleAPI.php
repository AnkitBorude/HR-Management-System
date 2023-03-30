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
}
pg_close($connection);