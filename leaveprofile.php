<?php
session_start();
if (!isset($_SESSION['Logedin']) && !isset($_SESSION['username']) || $_SESSION['Logedin'] !== true) {
    header('HTTP/1.0 401 Unauthorized');
    echo '401 Unauthorized Access ';
    exit;
}
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
    <style>
        #cards {
            width: 12rem;
            height: 12rem;
        }
    </style>
</head>

<body onload="viewdate(),getTodaysLeaves()">
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
                                    <a href="employee.php" class="nav-link px-3">
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
                        <a class="nav-link px-3 sidebar-link active" data-bs-toggle="collapse" href="#leave">
                            <span class="me-2"><i class="bi bi-people"></i></i></span>
                            <span>Leave</span>
                            <span class="ms-auto">
                                <span class="right-icon">
                                    <i class="bi bi-chevron-down"></i>
                                </span>
                            </span>
                        </a>
                        <div class="collapse show" id="leave">
                            <ul class="navbar-nav ps-3">
                                <li>
                                    <a href="leaveprofile.php" class="nav-link px-3 active">
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
            <!---page content here-->
            <div class="row">
                <div class="col-md-3 mb-5 mt-5" id="cards">
                    <div class="card text-white h-100 text-center" style="background-color:  #003f5c;
                  ;">
                        <h5 class="card-header">Today On Leave</h5>
                        <div class="card-body">
                            <div class="card-text fs-2 fw-bold " id="tdol">0</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-5 mt-5" id="cards">
                    <div class="card text-white h-100 text-center" style="background-color:  #58508d;">
                        <h5 class="card-header">Tommorrow On Leave</h5>
                        <div class="card-body">
                            <div class="card-text fs-2 fw-bold" id="tmol">0</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-5 mt-5" id="cards">
                    <div class="card text-white h-100 text-center" style="background-color:#bc5090;">
                        <h5 class="card-header">Sick Leave Today</h5>
                        <div class="card-body">
                            <div class="card-text fs-2 fw-bold" id="slt">0</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-5 mt-5" id="cards">
                    <div class="card text-white h-100 text-center" style="background-color:  #ff6361;">
                        <h5 class="card-header">Casual Leave Today</h5>
                        <div class="card-body">
                            <div class="card-text fs-2 fw-bold" id="clt">0</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-5 mt-5" id="cards">
                    <div class="card text-white h-100 text-center" style="background-color:  #ffa600">
                        <h5 class="card-header">Privilege Leave Today</h5>
                        <div class="card-body">
                            <div class="card-text fs-2 fw-bold" id="elt">0</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <h3 class="hw-3">Leave Report or Cancel Leave</h3>
                </div>
                <div class="alert alert-info mt-2 mb-2" role="alert">
                    Enter from - to date range to get future/past Leave Reports.<br>
                    Past Leaves or current Leaves Cannot be Cancelled
                </div>
                <form class="row g-3 justify-content-center row-cols-auto h-25">
                    <div class=" col-md-2 input-group">
                        <input type="date" class="form-control" placeholder="Choose a Date" aria-label="Choose Date" id="sdate">
                        <input type="date" class="form-control" placeholder="Choose a Date" aria-label="Choose Date" id="tdate">
                        <button class="btn btn-outline-primary" type="submit" onclick="event.preventDefault(),search()">Search</button>
                        <button class="btn btn-outline-secondary" type="reset">reset</button>
                    </div>
                </form>

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
                                                <th>Employee Id</th>
                                                <th>Employee Name</th>
                                                <th>Role Name</th>
                                                <th>Leave Type</th>
                                                <th>Start date</th>
                                                <th>End date</th>
                                                <th>Total Days</th>
                                                <th>Cancel</th>
                                            </tr>
                                        </thead>
                                        <tbody id="leavetablebody">
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Employee Id</th>
                                                <th>Employee Name</th>
                                                <th>Role Name</th>
                                                <th>Leave Type</th>
                                                <th>Start date</th>
                                                <th>End date</th>
                                                <th>Total Days</th>
                                                <th>Cancel</th>
                                            </tr>
                                        </tfoot>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <h3 class="hw-3"> Todays Leave</h3>
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
                                                <th>Employee Id</th>
                                                <th>Name</th>
                                                <th>POsition</th>
                                                <th>Type</th>
                                                <th>Specified Reasons</th>
                                            </tr>
                                        </thead>
                                        <tbody id="leavetablebodytoday">

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Employee Id</th>
                                                <th>Name</th>
                                                <th>POsition</th>
                                                <th>Type</th>
                                                <th>Specified Reasons</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <h3 class="hw-3"> Leave Balance</h3>
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
                                                <th>Employee Id</th>
                                                <th>Name</th>
                                                <th>Total EL </th>
                                                <TH>Total CL</TH>
                                                <th>Total SL</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $connection = pg_connect("host=localhost dbname=hrm user=hrmpadmin password=hradmin@111 port=5432") or die("cannot connect");
                                            $result = pg_query($connection, "select employee_id,employee_full_name,employee_el_balance,employee_cl_balance,employee_sl_balance from Employees;");
                                            while ($row = pg_fetch_row($result)) {
                                                echo "<tr>";
                                                echo "<td> $row[0]</td>";
                                                $array = explode(" ", $row[1]);
                                                echo "<td> $array[0]  $array[2]</td>";
                                                echo "<td>$row[2]</td>";
                                                echo "<td> $row[3]</td>";
                                                echo "<td> $row[4]</td>";
                                                echo "</tr>";
                                            }
                                            pg_free_result($result);
                                            pg_close($connection);
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Employee Id</th>
                                                <th>Name</th>
                                                <th>Total EL </th>
                                                <TH>Total CL</TH>
                                                <th>Total SL</th>
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
        async function search() {
            var sdate = document.getElementById("sdate").value;
            var fdate = document.getElementById("tdate").value;
            let dataresp = await fetch("/HR-Management-System/api/leaveAPI.php?type=rangedata&from=" + sdate +
                "&to=" + fdate);
            let resultAsjson = await dataresp.json();
            for (let i = 0; i < resultAsjson.data.length; i++) {
                updateLeaveTable(resultAsjson.data[i]);
            }
        }

        function updateLeaveTable(jsonrow) {
            let tablebody = document.getElementById("leavetablebody");
            const tablerow = document.createElement("tr");
            tablerow.setAttribute("id", jsonrow.leave_id); //embedding leave id

            let td = document.createElement("td");
            let idtextdata = document.createTextNode(jsonrow.emp_id);
            td.appendChild(idtextdata);

            let td2 = document.createElement("td");
            let idtextdata2 = document.createTextNode(jsonrow.employee_full_name);
            td2.appendChild(idtextdata2);

            let td3 = document.createElement("td");
            if (jsonrow.role_name != null) {
                let idtextdata3 = document.createTextNode(jsonrow.role_name);
                td3.appendChild(idtextdata3);
            } else {
                let idtextdata3 = document.createTextNode("Not Assigned");
                td3.appendChild(idtextdata3);
            }
            let td4 = document.createElement("td");
            let idtextdata4 = document.createTextNode(jsonrow.leave_type);
            td4.appendChild(idtextdata4);

            let td5 = document.createElement("td");
            let date1 = new Date(jsonrow.leave_start_date); //constructing date object directly from json data
            let idtextdata5 = document.createTextNode(date1.toLocaleDateString());
            td5.appendChild(idtextdata5);

            let td6 = document.createElement("td");
            let date2 = new Date(jsonrow.leave_end_date); //constructing date object directly from json data
            let idtextdata6 = document.createTextNode(date2.toLocaleDateString());
            td6.appendChild(idtextdata6);

            let td7 = document.createElement("td");
            let idtextdata7 = document.createTextNode(jsonrow.leave_total_days);
            td7.appendChild(idtextdata7);

            let dt = new Date(jsonrow.leave_start_date);
            let td8 = document.createElement("td");
            if (dt > new Date()) { //user would not be able to delete the levae if it currently under taken

                let dbutton = document.createElement("button");
                dbutton.setAttribute("class", "btn btn-danger");
                dbutton.setAttribute("onclick", "cancelLeave(this.parentNode.parentNode.id)")
                const text = document.createTextNode("Cancel");
                dbutton.appendChild(text);
                td8.appendChild(dbutton);
            } else {
                let txt = document.createTextNode("Cannot Cancel");
                td8.setAttribute("color", "red");
                td8.appendChild(txt);
            }
            tablerow.appendChild(td);
            tablerow.appendChild(td2);
            tablerow.appendChild(td3);
            tablerow.appendChild(td4);
            tablerow.appendChild(td5);
            tablerow.appendChild(td6);
            tablerow.appendChild(td7);
            tablerow.appendChild(td8);
            tablebody.append(tablerow);
        }
        async function getTodaysLeaves() {
            let today = getDBdate(new Date());
            let tommorrow = getDBdate(addDaystoDate(new Date(), 1)); //tommorrows date
            let dataresp = await fetch("/HR-Management-System/api/leaveAPI.php?type=leavedata&date=" + today + "&tommorrow=" + tommorrow);
            let resultAsjson = await dataresp.json();
            let tablebody = document.getElementById("leavetablebodytoday");
            for (let i = 0; i < resultAsjson.data.length; i++) {
                const tablerow = document.createElement("tr");

                let td = document.createElement("td");
                let idtextdata = document.createTextNode(resultAsjson.data[i].emp_id);
                td.appendChild(idtextdata);

                let td1 = document.createElement("td");
                let idtextdata1 = document.createTextNode(resultAsjson.data[i].ename);
                td1.appendChild(idtextdata1);

                let td2 = document.createElement("td");
                if (resultAsjson.data[i].role != null) {
                    let idtextdata2 = document.createTextNode(resultAsjson.data[i].role);
                    td2.appendChild(idtextdata2);
                } else {
                    let idtextdata2 = document.createTextNode("Not Assigned");
                    td2.appendChild(idtextdata2);
                }

                let td3 = document.createElement("td");
                let idtextdata3 = document.createTextNode(resultAsjson.data[i].leave_type);
                td3.appendChild(idtextdata3);

                let td4 = document.createElement("td");
                let idtextdata4 = document.createTextNode(resultAsjson.data[i].leave_reason);
                td4.appendChild(idtextdata4);

                tablerow.appendChild(td);
                tablerow.appendChild(td1);
                tablerow.appendChild(td2);
                tablerow.appendChild(td3);
                tablerow.appendChild(td4);
                tablebody.append(tablerow);
            }
            document.getElementById("tdol").innerHTML = resultAsjson.todaytotal;
            document.getElementById("tmol").innerHTML = resultAsjson.tommorrowtotal;
            document.getElementById("slt").innerHTML = resultAsjson.sltotal;
            document.getElementById("elt").innerHTML = resultAsjson.eltotal;
            document.getElementById("clt").innerHTML = resultAsjson.cltotal;
        }

        async function cancelLeave(id) {
            let tablerow = document.getElementById(id);
            let tablebody = document.getElementById("leavetablebody");
            let leavetype = tablerow.getElementsByTagName("td")[3].innerHTML;
            let totaldays = parseInt(tablerow.getElementsByTagName("td")[6].innerHTML);
            let eid = parseInt(tablerow.getElementsByTagName("td")[0].innerHTML);
            let dataresponse = await fetch("/HR-Management-System/api/leaveAPI.php?type=deleteleave&leaveid=" + id + "&leavetype=" + leavetype + "&totaldays=" + totaldays + "&eid=" + eid);
            let rowtobedeleted = document.getElementById(id);
            tablebody.removeChild(rowtobedeleted);
        }
    </script>
</body>

</html>