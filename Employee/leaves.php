<?php
session_start();
if (!isset($_SESSION['userid']) && $_SESSION['LogId'] !== true) {
    header('HTTP/1.0 401 Unauthorized');
    echo '401 Unauthorized Access ';
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <script src="js/time.js"></script>
</head>

<body onload="viewdate()">
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <?php
                        $employeeid = $_SESSION['userid'];
                        $connection = pg_connect("host=localhost dbname=hrm user=hrmpadmin password=hradmin@111 port=5432") or die("cannot connect");
                        $result = pg_query($connection, "select employee_id,employee_full_name,role_name,department_name,employee_cl_balance,employee_sl_balance,employee_el_balance from Employees left join Role on Employees.fkrole_id=Role.role_id left join department on role.fkdepartment_id=department.department_id where employee_id=$employeeid;");
                        $row = pg_fetch_row($result);
                        echo "<span id='empid'>$row[0]</span>";
                        $array = explode(" ", $row[1]);
                        echo " <h6 class='mb-0'>$array[0]  $array[2]</h6>";
                        if (is_null($row[2])) {
                            echo "<span> Not Assigned</span>";
                        } else {
                            echo "<span>$row[2]</span>";
                        }
                        pg_free_result($result);
                        pg_close($connection);
                        ?>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.html" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Elements</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="button.html" class="dropdown-item">Buttons</a>
                            <a href="typography.html" class="dropdown-item">Typography</a>
                            <a href="element.html" class="dropdown-item">Other Elements</a>
                        </div>
                    </div>
                    <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Widgets</a>
                    <a href="form.html" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Forms</a>
                    <a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
                    <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="signin.html" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item active">Blank Page</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item">
                        Time:-<span id="time" class="fw-bold"> </span>
                    </div>
                    <div class="nav-item px-2">
                        Date:-<span id="date" class="fw-bold"> </span>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">John Doe</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="#" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total CL</p>
                                <h6 class="mb-0" id="clbalance"><?php echo "$row[4]" ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total SL</p>
                                <h6 class="mb-0" id="slbalance"><?php echo "$row[5]" ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total EL</p>
                                <h6 class="mb-0" id="elbalance"><?php echo "$row[6]" ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-4">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Request Leave</h6>
                            <form id="lform">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="leavetype" onchange="setMaximumdate()" aria-label="Floating label select example" required>
                                        <option id="cl">CL(Casual Leave)</option>
                                        <option id="sl">SL(Sick Leave)</option>
                                        <option id="el">EL(Earned Leave)</option>
                                    </select>
                                    <label for="leavetype">select</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="sdate" onchange="setMaximumdate()" placeholder="Starting Date" required>
                                    <label for="sdate">From Date</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="tdate" placeholder="End Date" onchange="getDaysDifference()" required>
                                    <label for="tdate">To Date</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="totaldays" placeholder="Total Days" disabled>
                                    <label for="totaldays">TotalDays</label>
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Reason" id="reasons" style="height: 150px;" required></textarea>
                                    <label for="reason">Reason</label>
                                </div>
                                <div class="row mt-3">
                                    <div class="col justify-content-start">
                                        <input type="submit" class="btn btn-success" value="Apply" onclick="event.preventDefault(),addRecordleave()">
                                    </div>
                                    <div class="col justify-content-end">
                                        <input type="reset" class="btn btn-primary" value="reset">
                                    </div>
                                </div>
                            </form>
                            <div id="liveAlertPlaceholder"></div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-8">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Leave Request Status</h6>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Applied Date</th>
                                        <th scope="col">Leave Type</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">End Date</th>
                                        <th scope="col">Total Days</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Cancel</th>
                                    </tr>
                                </thead>
                                <tbody id="leavetablebody">
                                    <!--table content here-->
                                    <?php
                                    $connection = pg_connect("host=localhost dbname=hrm user=hrmpadmin password=hradmin@111 port=5432") or die("cannot connect");
                                    $result = pg_query($connection, "select leave_applied_date, leave_type,leave_start_date,leave_end_date,leave_total_days,leave_status,leave_id from Leave where fkemployee_id= $employeeid and leave_start_date >= CURRENT_DATE order by leave_applied_date;");
                                    while ($row = pg_fetch_row($result)) {
                                        echo "<tr id='$row[6]'>";
                                        echo "<td> $row[0]</td>";
                                        echo "<td>$row[1]</td>";
                                        echo "<td> $row[2]</td>";
                                        echo "<td> $row[3]</td>";
                                        echo "<td> $row[4]</td>";
                                        switch ($row[5]) {
                                            case 'A':
                                                echo "<td class='text-success'> Approved </td>";
                                                break;
                                            case 'R':
                                                echo "<td class='text-danger'> Rejected</td>";
                                                break;
                                            case 'P':
                                                echo "<td class='text-primary'> Pending</td>";
                                                break;
                                        }
                                        echo " <td><button class='btn btn-danger'
                                                    onclick='cancelLeave(this.parentNode.parentNode.id)'>Cancel
                                                    </button></td>";
                                        echo "</tr>";
                                    }
                                    pg_free_result($result);
                                    pg_close($connection);
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Blank End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="js/main.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

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

        function setMaximumdate() {
            let stype = document.getElementById("leavetype").selectedOptions[0].id;
            let balance = document.getElementById(stype + "balance").innerHTML;
            let sdate = document.getElementById('sdate');
            let startdate = new Date(sdate.value);
            const dateCopy = new Date(startdate);
            dateCopy.setDate(startdate.getDate() + parseInt(balance) - 1);
            let fdate = document.getElementById("tdate");
            fdate.value = '';
            document.getElementById('totaldays').value = 0;
            fdate.setAttribute("max", getDBdate(dateCopy));
        }
        async function addRecordleave() {
            let eid = document.getElementById("empid").innerHTML;
            let leaveid = 0;
            let leavetype = document.getElementById("leavetype").selectedOptions[0].id;
            let sdate = document.getElementById("sdate").value;
            let tdate = document.getElementById("tdate").value;
            let totaldays = document.getElementById("totaldays").value;
            let reasons = document.getElementById("reasons").value;
            let applieddate = getDBdate(new Date());
            let dataresponse = await fetch("/HR-Management-System/Admin/api/leaveAPI.php?type=newleave&eid=" + eid +
                "&leavetype=" + leavetype + "&sdate=" + sdate + "&tdate=" + tdate + "&applieddate=" + applieddate + "&totaldays=" + totaldays + "&reasons=" + reasons);
            let resjson = await dataresponse.json();
            if (resjson.status == "success") {
                leaveid = resjson.leaveid;
                updateLeaveTable(leaveid, applieddate, leavetype, sdate, tdate, totaldays, "pending");
                alertme("Leave Applied Successfully", "success");
            } else {
                alertme("Problem check log", "danger");
            }

        }

        function updateLeaveTable(...args) {
            let tablebody = document.getElementById("leavetablebody");
            const trow = document.createElement("tr");
            trow.setAttribute("id", args[0]); //embedding leave id
            for (let i = 1; i < args.length; i++) {
                const tdata = document.createElement("td");
                let data = document.createTextNode(args[i]);
                tdata.appendChild(data);
                trow.appendChild(tdata);
            }
            let dbutton2 = document.createElement("button");
            dbutton2.setAttribute("class", "btn btn-danger");
            dbutton2.setAttribute("onclick", "cancelLeave(this.parentNode.parentNode.id)")
            const text2 = document.createTextNode("cancel");
            dbutton2.appendChild(text2);
            const tdata2 = document.createElement("td");
            tdata2.appendChild(dbutton2);
            trow.appendChild(tdata2);

            tablebody.appendChild(trow);
            let balance = document.getElementById(args[2] + "balance");
            let oldvalue = parseInt(balance.innerHTML);
            balance.innerHTML = oldvalue - parseInt(args[5]);
        }
        async function cancelLeave(id) {
            let tablerow = document.getElementById(id);
            let tablebody = document.getElementById("leavetablebody");
            let leavetype = tablerow.getElementsByTagName("td")[1].innerHTML;
            let totaldays = parseInt(tablerow.getElementsByTagName("td")[4].innerHTML);
            let eid = document.getElementById("empid").innerHTML;
            let dataresponse = await fetch("/HR-Management-System/Admin/api/leaveAPI.php?type=deleteleave&leaveid=" + id + "&leavetype=" + leavetype + "&totaldays=" + totaldays + "&eid=" + eid);
            let resjson = await dataresponse.json();
            if (resjson.status == "success") {
                let rowtobedeleted = document.getElementById(id);
                tablebody.removeChild(rowtobedeleted);

            }
        }
        const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
        const alertme = (message, type) => {
            const wrapper = document.createElement('div')
            wrapper.innerHTML = [
                `<div class="alert alert-${type} alert-dismissible" role="alert">`,
                `   <div>${message}</div>`,
                '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
                '</div>'
            ].join('')

            alertPlaceholder.append(wrapper)
        }
    </script>
</body>

</html>