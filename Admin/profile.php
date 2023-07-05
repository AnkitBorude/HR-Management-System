<?php
session_start();
if (!isset($_SESSION['Logedin']) && !isset($_SESSION['username']) || $_SESSION['Logedin'] !== true) {
    header('HTTP/1.0 401 Unauthorized');
    echo '401 Unauthorized Access ';
    exit;
}
?>
<?php
$eid = $_GET["id"];
$connection = pg_connect("host=localhost dbname=hrm user=hrmpadmin password=hradmin@111 port=5432") or die("cannot connect");
$result = pg_query($connection, "select Employees.*,role_name,department_name,NOW()::date-employee_date_of_join as days,extract(year from age(employee_dob)) as year from Employees left join Role on Employees.fkrole_id=Role.role_id left join Department on Role.fkdepartment_id=Department.department_id where Employees.employee_id=$eid;");
$row = pg_fetch_row($result);
pg_free_result($result);
pg_close($connection);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Frontendfunn - Bootstrap 5 Admin Dashboard Template</title>
</head>

<body onload="viewdate()">
    <!-- top navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
            </button>
            <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold" href="#">Human Resource Management
                Software</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavBar" aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="container-sm text-end text-white text-wrap fs-6">
                Date:-<span id="date" class="fw-bold"> --/--/--</span>
                Time:-<span id="time" class="fw-bold"> --:--:--</span>
            </div>
            <div class="collapse navbar-collapse" id="topNavBar">

                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle ms-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-fill"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- top navigation bar -->
    <!-- offcanvas -->
    <div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar">
        <div class="offcanvas-body p-0">
            <img src="https://www.i-scoop.eu/wp-content/uploads/2019/11/HR-transformation.jpg.webp" class="img-thumbnail">
            <nav class="navbar-dark">
                <ul class="navbar-nav">
                    <li>
                        <div class="text-muted small fw-bold text-uppercase px-3 mb-3 mt-3">
                            CORE
                        </div>
                    </li>
                    <li>
                        <a href="dashboard.php" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <div class="text-muted small fw-bold text-uppercase px-3 mb-3 mt-3">
                            Interface
                        </div>
                    </li>

                    <li>
                        <a class="nav-link px-3 sidebar-link active" data-bs-toggle="collapse" href="#layouts">
                            <span class="me-2"><i class="bi bi-people"></i></i></span>
                            <span>Employee</span>
                            <span class="ms-auto">
                                <span class="right-icon">
                                    <i class="bi bi-chevron-down"></i>
                                </span>
                            </span>
                        </a>
                        <div class="collapse show" id="layouts">
                            <ul class="navbar-nav ps-3">
                                <li>
                                    <a href="employee.php" class="nav-link px-3 active">
                                        <span class="me-2"><i class="bi bi-file-person"></i></span>
                                        <span>Employee Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="newemployee.php" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-person-plus"></i></span>
                                        <span>Add Employee</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="deleteemployee.php" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-person-dash"></i></span>
                                        <span>Delete Employee</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#layouts2">
                            <span class="me-2"><i class="bi bi-people"></i></i></span>
                            <span>Attendance</span>
                            <span class="ms-auto">
                                <span class="right-icon">
                                    <i class="bi bi-chevron-down"></i>
                                </span>
                            </span>
                        </a>
                        <div class="collapse" id="layouts2">
                            <ul class="navbar-nav ps-3">
                                <li>
                                    <a href="dailyattendance.php" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-file-person"></i></span>
                                        <span>Daily Attendance</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="attendanceprofile.php" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-person-plus"></i></span>
                                        <span>Attendance Report</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#leave">
                            <span class="me-2"><i class="bi bi-people"></i></i></span>
                            <span>Leave</span>
                            <span class="ms-auto">
                                <span class="right-icon">
                                    <i class="bi bi-chevron-down"></i>
                                </span>
                            </span>
                        </a>
                        <div class="collapse" id="leave">
                            <ul class="navbar-nav ps-3">
                                <li>
                                    <a href="leaveprofile.php" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-file-person"></i></span>
                                        <span>Leave Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="leaverequest.php" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-person-plus"></i></span>
                                        <span>Leave Requistions</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#role">
                            <span class="me-2"><i class="bi bi-people"></i></i></span>
                            <span>Role & Department </span>
                            <span class="ms-auto">
                                <span class="right-icon">
                                    <i class="bi bi-chevron-down"></i>
                                </span>
                            </span>
                        </a>
                        <div class="collapse" id="role">
                            <ul class="navbar-nav ps-3">
                                <li>
                                    <a href="newrole.php" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-file-person"></i></span>
                                        <span>New Role</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="assignrole.php" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-person-plus"></i></span>
                                        <span>Assign & Free Role</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="my-4">
                        <hr class="dropdown-divider bg-light" />
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- offcanvas -->


    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <div class="card pt-3 mt-4" style="width: 10rem;">
                        <img src="images/profile.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-text">
                                <?php $array = explode(" ", $row[1]);
                                echo "<td> $array[0]  $array[2]</td>"; ?></h5>
                            <h6 class="card-text">
                                <?php if (is_null($row[17])) {
                                    echo "<td> Not Assigned</td>";
                                } else {
                                    echo "<td>$row[17]</td>";
                                } ?></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="card bg-primary-subtle mt-4">
                        <div class="card-header">
                            Personal Details
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">Full Name :-<span class="fw-bold">
                                        <?php echo $row[1] ?>
                                    </span></li>
                                <li class="list-group-item">Date OF Birth :- <span class="fw-bold">
                                        <?php echo $row[3] ?></span></li>
                                <li class="list-group-item">Age :- <span class="fw-bold">
                                        <?php echo $row[20] ?></span></li>
                                <li class="list-group-item">Gender :- <span class="fw-bold"> <?php echo $row[4] ?></span>
                                </li>
                                <li class="list-group-item">Email :- <span class="fw-bold"> <?php echo $row[2] ?></span>
                                </li>
                                <li class="list-group-item">Phone no:- <span class="fw-bold"><?php echo $row[5] ?></span></li>
                                <li class="list-group-item">City :- <span class="fw-bold"><?php echo $row[6] ?></span></li>
                                <li class="list-group-item">State :- <span class="fw-bold"><?php echo $row[7] ?></span>
                                </li>
                                <li class="list-group-item">Pincode :- <span class="fw-bold"><?php echo $row[8] ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card mt-4 mb-4">
                    <div class="card-header">
                        Employement
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">Date Of Joining :- <span class="fw-bold"><?php echo $row[9] ?></span></li>
                            <li class="list-group-item">Department :- <span class="fw-bold">
                                    <?php if (is_null($row[18])) {
                                        echo "<td> Not Assigned</td>";
                                    } else {
                                        echo "<td>$row[18]</td>";
                                    } ?></span> </li>
                            <li class="list-group-item">Total Days :- <span class="fw-bold"><?php echo $row[19] ?></span></li>
                        </ul>
                    </div>
                </div>
                <div class="card mt-4 mb-4">
                    <div class="card-header">
                        Bank and Tax Details
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">PAN No. :- <span class="fw-bold"><?php echo $row[10] ?>
                                </span></li>
                            <li class="list-group-item">A/C No. :- <span class="fw-bold"><?php echo $row[11] ?></span>
                            </li>
                            <li class="list-group-item">IFSC Code :- <span class="fw-bold"><?php echo $row[12] ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <a class="btn btn-primary mb-4" href="employee.php">Go Back</a>
            </div>
        </div>
        </div>
    </main>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./js/jquery-3.5.1.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap5.min.js"></script>
    <script src="./js/script.js"></script>
    <script src="./js/time.js"></script>
    <script>
        setInterval(updateClock, 1000 * 60);
    </script>
</body>

</html>