<?php
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
$connection = pg_connect("host=localhost dbname=hrm user=hrmpadmin password=hradmin@111 port=5432") or die("cannot connect");
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
pg_close($connection);
