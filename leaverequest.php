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
            <!---page content here-->
            <div class="row">
                <h3 class="fw-bold fs-2">Leave Form</h3>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="row g-3 needs-validation mb-5" id="lform">
                                <div class="col-md-4">
                                    <label for="name" class="form-label">Employee name</label>
                                    <select class="form-select" id="ename" onchange=" selectedid(),setMaximumdate()" required>
                                        <option id=0>Choose</option>
                                        <?php
                                        $connection = pg_connect("host=localhost dbname=hrm user=hrmpadmin password=hradmin@111 port=5432") or die("cannot connect");
                                        $result = pg_query($connection, "select employee_id,employee_full_name from Employees");
                                        while ($row = pg_fetch_row($result)) {
                                            echo "<option id='$row[0]'>";
                                            $array = explode(" ", $row[1]);
                                            echo "<td> $array[0]  $array[2]</option>";
                                        }
                                        pg_free_result($result);
                                        pg_close($connection);
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">Please select a valid</div>
                                </div>
                                <div class="col-md-3">
                                    <label for="leavetypet" class="form-label">Type Of Leave</label>
                                    <select class="form-select" id="leavetype" onchange="setMaximumdate()" required>
                                        <option id="el">Earned Leave(EL)</option>
                                        <option id="cl">Casual Leave(CL)</option>
                                        <option id="sl">Sick Leave(SL)</option>
                                    </select>
                                    <div class=" invalid-feedback">Please select a valid
                                    </div>
                                </div>
                                <div class="col-md-2 mt-2">
                                    <label for="sdate" class="form-label">From</label>s
                                    <input type="date" class="form-control" id="sdate" onchange="setMaximumdate()" required />
                                </div>
                                <div class="col-md-2 mt-2">
                                    <label for="tdate" class="form-label">To</label>
                                    <input type="date" class="form-control" id="tdate" onchange="getDaysDifference()" required />
                                </div>
                                <div class=" col-md-2 mt-2">
                                    <label for="totaldays" class="form-label">Total Days</label>
                                    <input type="number" class="form-control" id="totaldays" max="30" required disabled />
                                </div>
                                <div class="col-md-8">
                                    <label for="reasons" class="form-label">Reasons</label>
                                    <textarea class="form-control" id="reasons" rows="3" required></textarea>
                                </div>
                                <div class="col-3 mt-4">
                                    <button class="btn btn-success" type="submit" onclick="event.preventDefault(), addRecordleave()">Apply</button>
                                </div>

                                <div class="col-1 mt-4">
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row mt-2">
                        <h3 class="fw-bold fs-4">Balance</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mt-3" id="cards">
                            <div class="card text-dark text-center bg-info" style="width:4rem;height:5rem">
                                <h5 class="card-header">EL</h5>
                                <div class="card-body">
                                    <div class="card-text fw-bold" id="elbalance">0</div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-md-4 mt-3" id="cards">
                            <div class="card text-dark text-center bg-success" style="width:4rem;height:5rem">
                                <h5 class="card-header">CL</h5>
                                <div class="card-body">
                                    <div class="card-text fw-bold" id="clbalance">0</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mt-3" id="cards">
                            <div class="card text-dark text-center bg-primary" style="width:4rem;height:5rem">
                                <h5 class="card-header">SL</h5>
                                <div class="card-body">
                                    <div class="card-text fw-bold" id="slbalance">0</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <h3 class="fw-bold fs-3">Recent Leave Applications</h3>
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
                                            <th>Employee Name</th>
                                            <th>Leave Type</th>
                                            <th>Start date</th>
                                            <th>End date</th>
                                            <th>Total Days</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody id="leavetablebody">
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Employee Id</th>
                                            <th>Employee Name</th>
                                            <th>Leave Type</th>
                                            <th>Start date</th>
                                            <th>End date</th>
                                            <th>Total Days</th>
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
        document.getElementById('sdate').valueAsDate = new Date(); //setting todays date as default value
        document.getElementById('sdate').setAttribute("min", getDBdate(new Date()));
        document.getElementById('tdate').setAttribute("min", getDBdate(new Date()));

        function getDaysDifference() {
            var date1 = new Date(document.getElementById("sdate").value);
            var date2 = new Date(document.getElementById("tdate").value);
            var diff;
            if (date1 < date2) {
                diff = new Date(date2 - date1);
            } else {
                diff = new Date(date1 - date2);
            }
            var days = diff.getDate();
            document.getElementById('totaldays').value = days;
        }

        async function addRecordleave() {
            let eid = document.getElementById("ename").selectedOptions[0].id;
            let leaveid = 0;
            let ename = document.getElementById("ename").value;
            let leavetype = document.getElementById("leavetype").selectedOptions[0].id;
            let sdate = document.getElementById("sdate").value;
            let tdate = document.getElementById("tdate").value;
            let totaldays = document.getElementById("totaldays").value;
            let reasons = document.getElementById("reasons").value;
            let applieddate = getDBdate(new Date());
            let dataresponse = await fetch("/HR-Management-System/api/leaveAPI.php?type=newleave&eid=" + eid +
                "&leavetype=" + leavetype + "&sdate=" + sdate + "&tdate=" + tdate + "&applieddate=" + applieddate + "&totaldays=" + totaldays + "&reasons=" + reasons);
            let resjson = await dataresponse.json();
            if (resjson.status == "success") {
                leaveid = resjson.leaveid;
                updateLeaveTable(leaveid, eid, ename, leavetype, sdate, tdate, totaldays);

            }

        }

        function updateLeaveTable(...args) {
            let tablebody = document.getElementById("leavetablebody");
            const trow = document.createElement("tr");
            trow.setAttribute("id", args[0]); //embedding leave id
            for (let i = 1; i < args.length + 1; i++) {
                const tdata = document.createElement("td");
                if (i < args.length) {
                    let data = document.createTextNode(args[i]);
                    tdata.appendChild(data);
                } else {
                    let dbutton = document.createElement("button");
                    dbutton.setAttribute("class", "btn btn-danger");
                    dbutton.setAttribute("onclick", "cancelLeave(this.parentNode.parentNode.id)")
                    const text = document.createTextNode("Cancel");
                    dbutton.appendChild(text);
                    tdata.appendChild(dbutton);
                }
                trow.appendChild(tdata);
                tablebody.appendChild(trow);
            }
            let balance = document.getElementById(args[3] + "balance");
            let oldvalue = parseInt(balance.innerHTML);
            balance.innerHTML = oldvalue - parseInt(args[6]);
        }

        async function cancelLeave(id) {
            console.log(id);
            let tablebody = document.getElementById("leavetablebody");
            let rowtobedeleted = document.getElementById(id);
            tablebody.removeChild(rowtobedeleted);
        }

        async function selectedid() {
            console.log("selected");
            let eid = document.getElementById("ename").selectedOptions[0].id;
            console.log(eid);
            let dataresp = await fetch("/HR-Management-System/api/leaveAPI.php?type=leavebalance&empid=" + eid);
            let resultAsjson = await dataresp.json();
            let elbalance = document.getElementById("elbalance");
            let clbalance = document.getElementById("clbalance");
            let slbalance = document.getElementById("slbalance");
            elbalance.innerHTML = resultAsjson.balance.employee_el_balance;
            clbalance.innerHTML = resultAsjson.balance.employee_cl_balance;
            slbalance.innerHTML = resultAsjson.balance.employee_sl_balance;
        }

        function setMaximumdate() {
            let stype = document.getElementById("leavetype").selectedOptions[0].id;
            let balance = document.getElementById(stype + "balance").innerHTML;
            let sdate = document.getElementById('sdate');
            let startdate = new Date(sdate.value);
            const dateCopy = new Date(startdate);
            dateCopy.setDate(startdate.getDate() + parseInt(balance) - 1);
            let fdate = document.getElementById("tdate");
            fdate.setAttribute("max", getDBdate(dateCopy));
        }
    </script>
</body>

</html>