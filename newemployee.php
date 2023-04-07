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
      <div class="row">
        <h3 class="fw-bold fs-2">New Employee Details</h3>
        <div class="alert alert-warning" role="alert">
          All fields all compulsory Avoid Duplicate Entries.
          Fill fields carefully and Recheck before submission.
        </div>
        <div id="liveAlertPlaceholder"></div>
      </div>

      <div class="row border-top border-5 pt-4">
        <div class="co=l-md-12">
          <form class="row g-3 needs-validation mb-5" id="empform">
            <div class=" col-md-4">
              <label for="fname" class="form-label">Full name</label>
              <input type="text" name="fname" class="form-control" id="fname" required />
            </div>
            <div class="col-md-4">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required />
            </div>

            <div class="col-md-2">
              <label for="dob" class="form-label">Date Of Birth</label>
              <input type="date" class="form-control" id="dob" name="dob" />
            </div>

            <div class="col-md-4">
              <label for="gender" class="form-label">Gender</label>
              <select class="form-select" id="state" name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
            </div>
            <div class="col-md-4">
              <label for="phoneno" class="form-label">Phone no.</label>
              <input type="text" class="form-control" id="phoneno" name="phoneno" required />
            </div>
            <div class="col-md-4">
              <label for="city" class="form-label">City</label>
              <input type="text" class="form-control" id="city" name="city" required />
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label">State</label>
              <select class="form-select" id="state" name="state" required>
                <option value="Andhra Pradesh">Andhra Pradesh</option>
                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                <option value="Assam">Assam</option>
                <option value="Bihar">Bihar</option>
                <option value="Chandigarh">Chandigarh</option>
                <option value="Chhattisgarh">Chhattisgarh</option>
                <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                <option value="Daman and Diu">Daman and Diu</option>
                <option value="Delhi">Delhi</option>
                <option value="Lakshadweep">Lakshadweep</option>
                <option value="Puducherry">Puducherry</option>
                <option value="Goa">Goa</option>
                <option value="Gujarat">Gujarat</option>
                <option value="Haryana">Haryana</option>
                <option value="Himachal Pradesh">Himachal Pradesh</option>
                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                <option value="Jharkhand">Jharkhand</option>
                <option value="Karnataka">Karnataka</option>
                <option value="Kerala">Kerala</option>
                <option value="Madhya Pradesh">Madhya Pradesh</option>
                <option value="Maharashtra">Maharashtra</option>
                <option value="Manipur">Manipur</option>
                <option value="Meghalaya">Meghalaya</option>
                <option value="Mizoram">Mizoram</option>
                <option value="Nagaland">Nagaland</option>
                <option value="Odisha">Odisha</option>
                <option value="Punjab">Punjab</option>
                <option value="Rajasthan">Rajasthan</option>
                <option value="Sikkim">Sikkim</option>
                <option value="Tamil Nadu">Tamil Nadu</option>
                <option value="Telangana">Telangana</option>
                <option value="Tripura">Tripura</option>
                <option value="Uttar Pradesh">Uttar Pradesh</option>
                <option value="Uttarakhand">Uttarakhand</option>
                <option value="West Bengal">West Bengal</option>
              </select>
            </div>

            <div class="col-md-2">
              <label for="pincode" class="form-label">Pincode</label>
              <input type="text" class="form-control" id="pincode" name="pincode" required />
            </div>
            <div class="col-md-2">
              <label for="inputEmail4" class="form-label">Date Of Joining</label>
              <input type="date" class="form-control" id="sdate" name="doj" />
            </div>

            <div class="col-md-3">
              <label for="panno" class="form-label">PAN No.</label>
              <input type="text" class="form-control" id="panno" name="panno" required />
              <div class="invalid-feedback">Please provide PAN No.</div>
            </div>

            <div class="col-md-4">
              <label for="bankac" class="form-label">Bank A/C</label>
              <input type="text" class="form-control" id="bankac" name="bankac" required />
              <div class="invalid-feedback">Please provide a/c no..</div>
            </div>

            <div class="col-md-2">
              <label for="ifsccode" class="form-label">IFSC Code</label>
              <input type="text" class="form-control" id="ifsccode" name="ifsccode" required />
              <div class="invalid-feedback">Please provide ifsc no..</div>
            </div>

            <div class="col-10">
              <button class="btn btn-success" type="submit" name="submit" onclick="event.preventDefault(),submitform()">Submit
                form</button>
            </div>

            <div class=" col-2">
              <button class="btn btn-primary" type="reset">Reset</button>
            </div>
          </form>
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
    var form = document.getElementById("empform");
    var formdata = new FormData(form);
    async function submitform() {
      fData = new FormData(form);
      let response = await fetch(
        '<?php echo dirname($_SERVER['PHP_SELF']) . "/api/empform.php" ?>', {
          method: 'POST',
          body: fData,
        });
      let result = await response.json()
      if (result.status == "success") {
        alertme("Details Added Successfully", "success");
      } else {
        alertme("Error email or Phone no. already Exists", "danger");
      }
      console.log(result);
    }
  </script>
</body>

</html>