<?php
$connection = pg_connect("host=localhost dbname=hrm user=hrmpadmin password=hradmin@111 port=5432") or die("cannot connect");
if (isset($_POST["fname"])) {
        $fullname = $_POST["fname"];
        $email = $_POST["email"];
        $dob = $_POST["dob"];
        $gender = $_POST["gender"];
        $phoneno = $_POST["phoneno"];
        $city = $_POST["city"];
        $state = $_POST["state"];
        $pincode = $_POST["pincode"];
        $doj = $_POST["doj"];
        $panno = $_POST["panno"];
        $bankac = $_POST["bankac"];
        $ifsc = $_POST["ifsccode"];
        $eid = (int) (substr($phoneno, 2, 4)); //deriving eid pk from phone no.
        if ($result = pg_query($connection, "insert into Employees values($eid,'$fullname','$email','$dob','$gender','$phoneno','$city','$state','$pincode','$doj','$panno','$bankac','$ifsc',12,0,12)")) {
                header("Content-type:application/json");
                echo (json_encode(['status' => 'success', 'message' => 'added']));
        } else {
                header("Content-type:application/json");
                $error = pg_last_error($connection);
                echo (json_encode(['status' => 'error', 'message' => $error]));
        }
        pg_free_result($result);
} else if (isset($_GET)) {
        $delid = $_GET["deleteid"];
        if ($result = pg_query($connection, "update Role set role_current_holding = role_current_holding-1 where role_id = (select fkrole_id from Employees where employee_id=$delid);update Employees set fkrole_id=null where employee_id=$delid;delete from Employees where employee_id=$delid")) {
                header("Content-type:application/json");//problem is arrising due the other tables are referencing employee table therefore
                                                        //cascade delete is recomended would be solved later as it requires changing table constraint of each table referencing to
                                                        //employee table to on delete cascade so that all data would be automatically deleted when employee id deletes
                echo (json_encode(['status' => 'success', 'message' => 'deleted']));
        } else {
                header("Content-type:application/json");
                $error = pg_last_error($connection);
                echo (json_encode(['status' => 'error', 'message' => $error]));
        }
        pg_free_result($result);
}
pg_close($connection);
