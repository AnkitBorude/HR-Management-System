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
        <div class="row">
          <h3 class="hw-3">Attendance Report</h3>
        </div>

        <form class="row g-3 justify-content-center row-cols-auto h-25">
          <div class="col-md-6">
            <label for="fromdate" class="form-label">From</label>
            <input type="date" class="form-control" id="fromdate" />
          </div>

          <div class="col-md-6">
            <label for="todate" class="form-label">To</label>
            <input type="date" class="form-control" id="todate" />
          </div>

          <div class="col-md-2">
            <button class="btn btn-success" type="submit" onclick="event.preventDefault(),getData()">Submit</button>
          </div>
          <div class="col-md-2">
            <button class="btn btn-primary" type="reset">Reset</button>
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
                        <th>EID</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Sign In</th>
                        <th>Sign Out</th>
                        <th>date</th>
                        <th>Remark</th>
                      </tr>
                    </thead>
                    <tbody id="datatable">

                    </tbody>
                    <tfoot>
                      <tr>
                        <th>EID</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Sign In</th>
                        <th>Sign Out</th>
                        <th>date</th>
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
  <script>
    setInterval(updateClock, 1000 * 60);
    async function getData() {
      var sdate = document.getElementById("fromdate").value;
      var fdate = document.getElementById("todate").value;
      let dataresp = await fetch("/HR-Management-System/api/attendanceAPI.php?type=rangedata&from=" + sdate +
        "&to=" + fdate);
      let resultAsjson = await dataresp.json();
      let tablebody = document.getElementById("datatable");
      removeAllChildNodes(tablebody);
      for (let i = 0; i < resultAsjson.data.length; i++) {
        await createrow(resultAsjson.data[i]);
      }
    }

    function removeAllChildNodes(parent) { //function to remove all childs of given parent element
      while (parent.firstChild) {
        parent.removeChild(parent.firstChild);
      }
    }

    function createrow(jsonrow) {
      var dtsiobject;
      var dtsoobject;
      var isSignined = false;
      var isSignouted = false;
      let tablebody = document.getElementById("datatable");
      let tablerow = document.createElement("tr");

      let td = document.createElement("td");
      let idtextdata = document.createTextNode(jsonrow.employee_id);
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
      if (jsonrow.attendance_sign_in != null) {
        var sidate = dtsiobject = new Date(jsonrow.attendance_date + "T" + jsonrow.attendance_sign_in);
        let idtextdata4 = document.createTextNode(getUserformatTime(sidate));
        isSignined = true;
        td4.appendChild(idtextdata4);

      } else {
        let idtextdata4 = document.createTextNode("Absent");
        td4.appendChild(idtextdata4);
      }

      let td5 = document.createElement("td");
      if (jsonrow.attendance_sign_out != null) {
        var sodate = dtsoobject = new Date(jsonrow.attendance_date + "T" + jsonrow.attendance_sign_out);
        let idtextdata5 = document.createTextNode(getUserformatTime(sodate));
        td5.appendChild(idtextdata5);
        isSignouted = true;
      } else {
        let idtextdata5 = document.createTextNode("Absent");
        td5.appendChild(idtextdata5);
      }

      let td6 = document.createElement("td");
      if (jsonrow.attendance_date != null) {
        date = new Date(jsonrow.attendance_date); //constructing date object directly from json data
        let idtextdata6 = document.createTextNode(date.toLocaleDateString());
        td6.appendChild(idtextdata6);
      } else {
        let idtextdata6 = document.createTextNode("Absent");
        td6.appendChild(idtextdata6);
      }
      let td7 = document.createElement("td");
      const spantaghalfda = document.createElement("span");
      spantaghalfda.setAttribute("class", "badge text-dark bg-danger");
      const halfda = document.createTextNode("Absent");
      spantaghalfda.appendChild(halfda);
      td7.appendChild(spantaghalfda);
      td7.setAttribute("id", jsonrow.employee_id + "" +
        jsonrow.attendance_date);
      tablerow.appendChild(td);
      tablerow.appendChild(td2);
      tablerow.appendChild(td3);
      tablerow.appendChild(td4);
      tablerow.appendChild(td5);
      tablerow.appendChild(td6);
      tablerow.appendChild(td7);
      tablebody.append(tablerow);
      if (isSignined == true) {
        addsiremarktotable(document.getElementById(jsonrow.employee_id + "" + jsonrow.attendance_date), dtsiobject);
      }
      if (isSignouted == true) {
        addsoremarktotable(document.getElementById(jsonrow.employee_id + "" +
          jsonrow.attendance_date), dtsoobject);
      }
    }


    function addsiremarktotable(remark, datetimeobj) {
      var tdate = new Date();
      tdate.setHours(10, 00); //office time of start 10 AM
      if ((datetimeobj.getHours()) > tdate.getHours()) {
        removeRemark(remark);
        addRemarkbatch(remark, "signin");
        addRemarkbatch(remark, "late");
      } else if (datetimeobj.getHours() == tdate.getHours()) {
        if (datetimeobj.getMinutes() > tdate.getMinutes()) {
          removeRemark(remark);
          addRemarkbatch(remark, "signin");
          addRemarkbatch(remark, "late");

        } else {

          removeRemark(remark);
          addRemarkbatch(remark, "signin");
        }
      } else {

        removeRemark(remark);
        addRemarkbatch(remark, "signin");
      }
    }

    function addsoremarktotable(remark, datetimeobj) {

      var closingdate = new Date();
      closingdate.setHours(17, 00); //closing time of start 17 PM

      if (datetimeobj.getHours() < closingdate.getHours()) {

        removeRemark(remark);
        removeRemark(remark);
        addRemarkbatch(remark, "halfday");
      } else if (datetimeobj.getHours() == closingdate.getHours()) {
        if (datetimeobj.getMinutes() > closingdate.getMinutes() + 30) {
          removeRemark(remark);
          removeRemark(remark);
          addRemarkbatch(remark, "overtime");
          addRemarkbatch(remark, "present");

        } else {
          //removeRemark(remark);
          removeRemark(remark);
          addRemarkbatch(remark, "present");
        }
      } else {
        removeRemark(remark);
        removeRemark(remark);
        addRemarkbatch(remark, "overtime");
        addRemarkbatch(remark, "present");
      }
    }
  </script>
</body>

</html>