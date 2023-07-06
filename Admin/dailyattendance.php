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
</head>

<body onload="viewdate(),getTodaysLeaves(),getTodaysData()">
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
            <a class="nav-link px-3 sidebar-link active" data-bs-toggle="collapse" href="#layouts2">
              <span class="me-2"><i class="bi bi-card-checklist"></i></i></span>
              <span>Attendance</span>
              <span class="ms-auto">
                <span class="right-icon">
                  <i class="bi bi-chevron-down"></i>
                </span>
              </span>
            </a>
            <div class="collapse show" id="layouts2">
              <ul class="navbar-nav ps-3">
                <li>
                  <a href="dailyattendance.php" class="nav-link px-3 active">
                    <span class="me-2"><i class="bi bi-list-check"></i></span>
                    <span>Daily Attendance</span>
                  </a>
                </li>
                <li>
                  <a href="attendanceprofile.php" class="nav-link px-3">
                    <span class="me-2"><i class="bi bi-file-text"></i></span>
                    <span>Attendance Report</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li>
            <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#leave">
              <span class="me-2"><i class="bi  bi-journal-medical"></i></i></span>
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
                    <span class="me-2"><i class="bi bi bi-calendar-check"></i></span>
                    <span>Leave Profile</span>
                  </a>
                </li>
                <li>
                  <a href="leaverequest.php" class="nav-link px-3">
                    <span class="me-2"><i class="bi  bi-calendar-plus"></i></span>
                    <span>Leave Requistions</span>
                  </a>
                </li>
                <li>
                  <a href="pendingleave.php" class="nav-link px-3">
                    <span class="me-2"><i class="bi bi-person-plus"></i></span>
                    <span>Pending Leave </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>

          <li>
            <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#role">
              <span class="me-2"><i class="bi bi-person-gear"></i></span>
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
                    <span class="me-2"><i class="bi bi-plus-circle"></i></span>
                    <span>New Role</span>
                  </a>
                </li>
                <li>
                  <a href="assignrole.php" class="nav-link px-3">
                    <span class="me-2"><i class="bi bi-people"></i></span>
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
        <div class="col-md-6">
          <h3 class="fw-bold fs-2">Daily Attendance Book</h3>
          <div class="alert alert-info" role="alert">
            Working Time :- 10 AM - 17 PM
          </div>
          <div class="alert alert-warning" role="alert">
            <ol class="list-group list-group-numbered list-group-flush">
              <li class="list-group-item" style="background-color: inherit;">Sign In after 10AM would be counted as Late.</li>
              <li class="list-group-item" style="background-color: inherit;"> Sign out before 17PM would be counted as Half Day.</li>
              <li class="list-group-item" style="background-color: inherit;"> Sign out window is between 17 PM and 17:30 PM.</li>
              <li class="list-group-item" style="background-color: inherit;">Sign out after given time window would be counted as overtime otherwise absentee would be considered.</li>
            </ol>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card text-white h-100 text-center" style="background-color:#1BCFB4;">
            <h5 class="card-header">Scanner</h5>
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" role="switch" id="scannermode">
              <label class="form-check-label" for="scannermode" id="modelabel">Sign In Mode</label>
            </div>
            <div class="card-body py-5" id="reader">
              <!-- <div id="reader" class="card"> -->
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-2">
        <div class="col-md-12 mb-3">
          <div class="card">
            <div class="card-header">
              <span><i class="bi bi-table me-2"></i></span> Attendance Book
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="example" class="table table-striped data-table" style="width: 100%">
                  <thead>
                    <tr>
                      <th>EID</th>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Sign In</th>
                      <th>Sign Out</th>
                      <th>Remark</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $connection = pg_connect("host=localhost dbname=hrm user=hrmpadmin password=hradmin@111 port=5432") or die("cannot connect");
                    $result = pg_query($connection, " select employee_id,employee_full_name,role_name from Employees left join Role on Employees.fkrole_id=Role.role_id");
                    while ($row = pg_fetch_row($result)) {
                      echo "<tr id='$row[0]'>";
                      echo "<td> $row[0]</td>";
                      $array = explode(" ", $row[1]);
                      echo "<td> $array[0]  $array[2]</td>";
                      if (is_null($row[2])) {
                        echo "<td> Not Assigned</td>";
                      } else {
                        echo "<td>$row[2]</td>";
                      }
                      echo "<td><span><button class='btn btn-primary' name='$row[0]'
                                            onclick='signin(this.name)'>Sign
                                            In</button></span></td>";
                      echo " <td><span><button class='btn btn-success' name='$row[0]' id=''
                                            onclick='signout(this.name,this.id)' disabled>Sign
                                            Out</button></span></td>";
                      echo " <td><span class='badge text-light bg-danger'>Absent</span>
                                            </td>";
                      echo "</tr>";
                    }
                    pg_free_result($result);
                    pg_close($connection);
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>EID</th>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Sign In</th>
                      <th>Sign Out</th>
                      <th>Remark</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
      <div id="liveToast" class="toast bg-primary text-white" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
          <strong class="me-auto">Notification</strong>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" id="toastbody">
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
  <script src="./js/attendance.js"></script>
  <script src="./js/qrcode.js"></script>
  <script>
    setInterval(updateClock, 1000 * 60); //update the clock after 1 min interval
    var html5QrcodeScanner = new Html5QrcodeScanner(
      "reader", {
        fps: 12,
        qrbox: 200,
        rememberLastUsedCamera: true,
        supportedScanTypes: [Html5QrcodeScanType.SCAN_TYPE_CAMERA]
      });
    html5QrcodeScanner.render(onScanSuccess);
    let mode = document.getElementById("scannermode");
    var label = document.getElementById("modelabel");
    mode.addEventListener('change', (event) => {
      if (event.currentTarget.checked) {
        label.innerHTML = "Sign Out Mode"
      } else {
        label.innerHTML = "Sign In Mode"
      }
    })
  </script>
</body>

</html>