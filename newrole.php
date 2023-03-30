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
                            <li><a class="dropdown-item" href="#">Log Out</a></li>
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
                        <a href="index.html" class="nav-link px-3 active">
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
                        <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#layouts">
                            <span class="me-2"><i class="bi bi-people"></i></i></span>
                            <span>Employee</span>
                            <span class="ms-auto">
                                <span class="right-icon">
                                    <i class="bi bi-chevron-down"></i>
                                </span>
                            </span>
                        </a>
                        <div class="collapse" id="layouts">
                            <ul class="navbar-nav ps-3">
                                <li>
                                    <a href="employee.html" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-file-person"></i></span>
                                        <span>Employee Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="newemployee.html" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-person-plus"></i></span>
                                        <span>Add Employee</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="editemployee.html" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-gear"></i></span>
                                        <span>Edit Employee</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="deleteemployee.html" class="nav-link px-3">
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
                                    <a href="#" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-file-person"></i></span>
                                        <span>Daily Attendance</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-person-plus"></i></span>
                                        <span>Attendance Report</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#layouts2">
                            <span class="me-2"><i class="bi bi-people"></i></i></span>
                            <span>Leave</span>
                            <span class="ms-auto">
                                <span class="right-icon">
                                    <i class="bi bi-chevron-down"></i>
                                </span>
                            </span>
                        </a>
                        <div class="collapse" id="layouts2">
                            <ul class="navbar-nav ps-3">
                                <li>
                                    <a href="#" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-file-person"></i></span>
                                        <span>Leave Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-person-plus"></i></span>
                                        <span>Leave Requistions</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-person-plus"></i></span>
                                        <span>Cancell Leave</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#layouts2">
                            <span class="me-2"><i class="bi bi-people"></i></i></span>
                            <span>Role & Department </span>
                            <span class="ms-auto">
                                <span class="right-icon">
                                    <i class="bi bi-chevron-down"></i>
                                </span>
                            </span>
                        </a>
                        <div class="collapse" id="layouts2">
                            <ul class="navbar-nav ps-3">
                                <li>
                                    <a href="#" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-file-person"></i></span>
                                        <span>New Role</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-person-plus"></i></span>
                                        <span>Assign & Free Role</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-person-plus"></i></span>
                                        <span>Department Profile</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-book-fill"></i></span>
                            <span>PayRoll</span>
                        </a>
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
            <div class="row mb-5 mt-5">
                <div class="col-md-8">
                    <h3 class="fw-bold fs-2">Create New Roles</h3>
                </div>
                <div class="col-md-4">
                    <h3 class="fw-bold fs-4"> Total Roles:- <span id="total" class="fs-3">0</span></h3>
                </div>
            </div>
            <form action="" class="row g-2">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="rolename">
                        <label for="role">Name Of Role/Position</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <select class="form-select" id="department">
                            <option value="0" selected>None</option>
                            <?php
                            $connection = pg_connect("host=localhost dbname=hrm user=hrmpadmin password=hradmin@111 port=5432") or die("cannot connect");
                            $result = pg_query($connection, "select department_id,department_name from Department");
                            while ($row = pg_fetch_row($result)) {
                                echo "<option value=$row[0]>";
                                echo "$row[1]";
                                echo "</option>";
                            }
                            pg_free_result($result);
                            pg_close($connection);
                            ?>
                        </select>
                        <label for="floatingSelectGrid">Name of Department</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="bsalary">
                        <label for="role">Base Salary</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="maxreq">
                        <label for="role">Max Requirement</label>

                    </div>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-success me-md-2" type="submit" onclick="event.preventDefault(),createNewRole()">Create</button>
                    <button class="btn btn-primary" type="reset">Reset</button>
                </div>
            </form>
            <div class="row mt-5">
                <h3 class="fw-bold fs-3">Current Roles</h3>
            </div>
            <div class="row mt-2">
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <span><i class="bi bi-table me-2"></i></span> Data Table
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped data-table" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>Role Name</th>
                                            <th>Department</th>
                                            <th>Base Salary</th>
                                            <th>Current Occupied</th>
                                            <th>Max Occupation</th>
                                            <th>Total Holding</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody id="roletablebody">
                                        <?php
                                        $connection = pg_connect("host=localhost dbname=hrm user=hrmpadmin password=hradmin@111 port=5432") or die("cannot connect");
                                        $result = pg_query($connection, "select role_id,role_name,department_id,department_name,role_base_salary,role_current_holding,role_max_holding from Role inner join Department on Role.fkdepartment_id =Department.department_id");
                                        while ($row = pg_fetch_row($result)) {
                                            echo "<tr id=$row[0]>";
                                            echo "<td>$row[1]</td>";
                                            echo "<td id=$row[2]>$row[3]</td>";
                                            echo "<td>$row[4]</td>";
                                            echo "<td>$row[5]</td>";
                                            echo "<td>$row[6]</td>";
                                            $percentage = round($row[5] / $row[6] * 100);//round figurring value of holding
                                            echo "<td>$percentage %</td>";
                                            echo "<td><button class='btn btn-danger' onclick='deleteRole(this.parentNode.parentNode.id)'>Cancel</button></td>";
                                        }
                                        pg_free_result($result);
                                        pg_close($connection);
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Role Name</th>
                                            <th>Department</th>
                                            <th>Base Salary</th>
                                            <th>Current Occupied</th>
                                            <th>Max Occupation</th>
                                            <th>Total Holding</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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
        var totalroles = 0;

        function createNewRole() {
            let rolename = document.getElementById("rolename").value;
            let department = document.getElementById("department").selectedOptions[0];
            let basesalary = document.getElementById("bsalary").value;
            let maxreq = document.getElementById("maxreq").value;
            totalroles = parseInt(maxreq) + totalroles;

            document.getElementById("total").innerHTML = totalroles;
            console.log(department.id);

            //space for ajax
            updateRoleTable(roleid, rolename, departmentName, basesalary, maxreq, currentHolding);
        }

        function deleteRole(buttonEvent) //role+id
        {
            let rowElement = buttonEvent.parentNode.parentNode;
            let mainAcBody = rowElement.parentNode;
            mainAcBody.removeChild(rowElement);
            totalroles--;
            document.getElementById("total").innerHTML = totalroles;
            //tracking parent from the button on which the event has been happened
        }

        function updateRoleTable(...args) {

        }
    </script>
</body>

</html>