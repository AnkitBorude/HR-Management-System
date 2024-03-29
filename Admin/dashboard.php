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

<body onload="viewdate(),updateCounts()">
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
            <a href="dashboard.php" class="nav-link px-3 active">
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
              <span class="me-2"><i class="bi bi-card-checklist"></i></i></span>
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
      <div class="row gy-5" style="margin-top: 1rem;">
        <div class="col-md-12">
          <h4 class="fw-bold fs-2">Dashboard</h4>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 mb-3">
          <div class="card text-white h-100 text-center" style="background-color:#9E58FF;">
            <h5 class="card-header">Total Employee</h5>
            <div class="card-body py-5">
              <div class="card-text fs-2 fw-bold" id="totalemployees">
                <?php
                $connection = pg_connect("host=localhost dbname=hrm user=hrmpadmin password=hradmin@111 port=5432") or die("cannot connect");
                $result = pg_query($connection, "select count(*) from Employees");
                $row = pg_fetch_row($result);
                if ($row[0] == null) {
                  echo "0";
                } else {
                  echo $row[0];
                }
                pg_free_result($result);
                ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card text-dark h-100 text-center" style="background-color:#FE9496;">
            <h5 class="card-header">Absent</h5>
            <div class="card-body py-5">
              <div class="card-text fs-2 fw-bold" id="absent">0</div>
              <div class="card-text fs-6 fw-light pt-3">On leave <span id="onleave">0</span></div>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card text-white h-100 text-center" style="background-color:#4BCBEB;">
            <h5 class="card-header">Roles Vacant</h5>
            <div class="card-body py-5">
              <div class="card-text fs-2 fw-bold">
                <?php
                $result = pg_query($connection, "select sum(role_current_holding),sum(role_max_holding) from Role");
                $row = pg_fetch_row($result);
                if ($row[1] == null) {
                  echo "0";
                } else {
                  $percentage = round(((($row[1] - $row[0]) / $row[1]) * 100));
                  echo $percentage . "%";
                }
                pg_free_result($result);
                ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card text-white h-100 text-center" style="background-color:#1BCFB4;">
            <h5 class="card-header">Total Overtime/Hr</h5>
            <div class="card-body py-5">
              <div class="card-text fs-2 fw-bold">
                <?php
                $result = pg_query($connection, "select sum(attendace_totalovertime) from attendance");
                $row = pg_fetch_row($result);
                if ($row[0] == null) {
                  echo "0";
                } else {
                  echo $row[0] . "Hrs.";
                }
                pg_free_result($result);
                ?>
              </div>
              <div class="card-text fs-6 fw-light pt-3">Highest O/T By <span style="text-decoration: underline;" class="text-dark">
                  <?php
                  $result = pg_query($connection, "select employee_full_name,sum(attendace_totalovertime) from attendance inner join Employees on attendance.fkemployee_id = Employees.employee_id group by employee_full_name;");
                  $name = " ";
                  $max = 0;
                  while ($row = pg_fetch_array($result)) {
                    if ($row[1] > $max) {
                      $max = $row[1];
                      $name = $row[0];
                    }
                  }
                  echo $name;
                  pg_free_result($result);
                  ?>
                </span></div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <div class="card h-100">
            <div class="card-header">
              <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
              Total Leaves in Week
            </div>
            <div class="card-body">
              <canvas id="myChart" style="width:100%;height:300px"></canvas>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <div class="card h-100">
            <div class="card-header">
              <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
              Department Wise Roles
            </div>
            <div class="card-body">
              <div class="chart" style="height: 300px; width:100%;" id="chartContainer"></div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 mb-3">
          <div class="card">
            <div class="card-header">
              <span><i class="bi bi-table me-2"></i></span> Employee Details
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="example" class="table table-striped data-table" style="width: 100%">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Date Of Join</th>
                      <th>Position</th>
                      <th>Phone No.</th>
                      <th>Email</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $result = pg_query($connection, " select employee_id,employee_full_name,role_name,employee_date_of_join,employee_phone_no,employee_email_id from Employees left join Role on Employees.fkrole_id=Role.role_id");
                    while ($row = pg_fetch_row($result)) {
                      echo "<tr>";
                      echo "<td> $row[0]</td>";
                      echo "<td> $row[1]</td>";
                      echo "<td> $row[3]</td>";
                      if (is_null($row[2])) {
                        echo "<td> Not Assigned</td>";
                      } else {
                        echo "<td>$row[2]</td>";
                      }
                      echo "<td> $row[4]</td>";
                      echo "<td><a href='mailto:$row[5]'>$row[5]</a></td>";
                    }
                    pg_free_result($result);

                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Date Of Join</th>
                      <th>Position</th>
                      <th>Phone No.</th>
                      <th>Email</th>
                    </tr>
                  </tfoot>
                </table>
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
  <script src="./js/attendance.js"></script>
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <script>
    setInterval(updateClock, 1000 * 60);
    async function updateCounts() {
      let absent = document.getElementById("absent");
      let onleave = document.getElementById("onleave");
      let totalemployees = document.getElementById("totalemployees");
      let today = getDBdate(new Date());
      let tommorrow = getDBdate(addDaystoDate(new Date(), 1)); //tommorrows date
      let dataresp = await fetch("/HR-Management-System/api/leaveAPI.php?type=leavedata&date=" + today + "&tommorrow=" + tommorrow);
      let resultAsjson1 = await dataresp.json();
      onleave.innerHTML = resultAsjson1.todaytotal;
      var tdate = getDBdate(new Date()); //todays date as db fromat
      let daydataresp = await fetch("/HR-Management-System/api/attendanceAPI.php?type=todaypresent&date=" + tdate);
      let resultAsjson2 = await daydataresp.json();
      let todayab = resultAsjson2.data;
      absent.innerHTML = parseInt(totalemployees.innerHTML) - parseInt(todayab);
    }
  </script>
  <?php
  $result = pg_query($connection, "select department_name,count(*) from role inner join Department on role.fkdepartment_id=Department.department_id group by department_name order by department_name;
");
  $array = array();
  while ($row = pg_fetch_array($result)) {
    array_push($array, array("label" => $row[0], "y" => $row[1]));
  }
  pg_free_result($result);
  pg_close($connection);

  $dataPoints = $array;
  ?>
  <script>
    window.onload = viewdate();
    window.onload = updateCounts();
    window.onload = nextweekleaves();

    function createpiechart() {
      var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        exportEnabled: true,
        data: [{
          type: "doughnut",
          showInLegend: "true",
          legendText: "{label}",
          indexLabelFontSize: 14,
          indexLabel: "{label} - #percent%",
          dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
      });
      chart.render();
    }
    window.onload =
      createpiechart();
    var xvalue = [];
    var yvalue = [];
    async function nextweekleaves() {
      var tdate = getDBdate(new Date());
      for (let i = 0; i <= 7; i++) {
        tdate = getDBdate(addDaystoDate(new Date(), i));
        let daydataresp = await fetch("/HR-Management-System/api/leaveAPI.php?type=todaysleavedata&date=" + tdate);
        let resultAsjson = await daydataresp.json();
        console.log(i);
        xvalue.push(tdate);
        yvalue.push(resultAsjson.data);
      }
      generatechart();
    }

    function removeAllChildNodes(parent) { //function to remove all childs of given parent element
      while (parent.firstChild) {
        parent.removeChild(parent.firstChild);
      }
    }
    var barColors = ["#1c0f30", "#31135e", "#491d8b", "#6929c4", "#8a3ffc", "#a56eff", "#d4bbff", "#be95ff"];

    function generatechart() {
      new Chart("myChart", {
        type: "bar",
        data: {
          labels: xvalue,
          datasets: [{
            backgroundColor: barColors,
            data: yvalue
          }]
        },
        options: {
          legend: {
            display: false
          },
          title: {
            display: true,
            text: "Leaves from " + xvalue[0] + " to " + xvalue[7]
          }
        }
      });
    }
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
  </script>
</body>

</html>