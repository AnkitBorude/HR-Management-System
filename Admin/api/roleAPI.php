<?php
$connection = pg_connect("host=localhost dbname=hrm user=hrmpadmin password=hradmin@111 port=5432") or die("cannot connect");
if ($_GET["type"] == "newrole") {
    $rolename = $_GET["rolename"];
    $department = $_GET["department"];
    $basesalary = $_GET["basesalary"];
    $maxreq = $_GET["maxreq"];
    if ($result = pg_query($connection, "insert into Role(role_name,role_base_salary,role_current_holding,fkdepartment_id,role_max_holding) values('$rolename',$basesalary,0,$department,$maxreq) returning role_id")) {
        $row = pg_fetch_row($result);
        header("Content-type:application/json");
        echo (json_encode(['status' => 'success', 'role_id' => $row[0]]));
    } else {
        header("Content-type:application/json");
        $error = pg_last_error($connection);
        echo (json_encode(['status' => 'error', 'message' => $error]));
    }
    pg_free_result($result);
} else if ($_GET["type"] == "deleterole") {
    $roleid = $_GET["roleid"];
    if ($result = pg_query($connection, "update Employees set fkrole_id=null where fkrole_id=$roleid; delete from role where role_id=$roleid;")) {
        $row = pg_fetch_row($result);
        header("Content-type:application/json");
        echo (json_encode(['status' => 'success', 'message' => 'deleted']));
    } else {
        header("Content-type:application/json");
        $error = pg_last_error($connection);
        echo (json_encode(['status' => 'error', 'message' => $error]));
    }
    pg_free_result($result);
} else if ($_GET["type"] == "assignrole") {
    $roleid = $_GET["roleid"];
    $empid = $_GET["empid"];
    if ($result = pg_query($connection, "update Employees set fkrole_id=$roleid where employee_id=$empid;update Role set role_current_holding=role_current_holding +1 where role_id=$roleid;commit;")) { //trying without applying any mechanism to deal overflow
        $row = pg_fetch_row($result);
        header("Content-type:application/json");
        echo (json_encode(['status' => 'success', 'message' => 'assigned']));
    } else {
        header("Content-type:application/json");
        $error = pg_last_error($connection);
        echo (json_encode(['status' => 'error', 'message' => $error]));
    }
    pg_free_result($result);
} else if ($_GET["type"] == "freerole") {
    $roleid = $_GET["roleid"];
    $empid = $_GET["empid"];
    if ($result = pg_query($connection, "update Employees set fkrole_id = null where employee_id=$empid;update Role set role_current_holding=role_current_holding - 1 where role_id=$roleid;commit;")) {
        $row = pg_fetch_row($result);
        header("Content-type:application/json");
        echo (json_encode(['status' => 'success', 'message' => 'freed']));
    } else {
        header("Content-type:application/json");
        $error = pg_last_error($connection);
        echo (json_encode(['status' => 'error', 'message' => $error]));
    }
    pg_free_result($result);
}
pg_close($connection);
