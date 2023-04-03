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
                        <a href="index.php" class="nav-link px-3 active">
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
            <!---page content here-->
            <div class="row">
                <h3 class="hw-3">Roles Assignment Management</h3>

            </div>

            <div class="row border-top border-5 mb-2">
                <div class="col-md-9">
                    <div class="row mt-5">
                        <div class="alert alert-info" role="alert">
                            Please select Employees you want to free or switch role and click the respective button
                        </div>
                        <div class="col-md-2 mb-2">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="GenerateRoles()">Assign</button>
                        </div>
                        <div class="col-md-2 mb-2">
                            <button class="btn btn-primary" onclick="freeRole(true)">Free</button>
                        </div>
                        <div class="col-md-1">
                            <button class="btn btn-primary" onclick="SwichRole()">Switch</button>
                        </div>
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
                                                    <th>Position/Role</th>
                                                    <th>Free/Switch</th>
                                                </tr>
                                            </thead>
                                            <tbody id="assignmentTable">
                                                <?php
                                                $connection = pg_connect("host=localhost dbname=hrm user=hrmpadmin password=hradmin@111 port=5432") or die("cannot connect");
                                                $result = pg_query($connection, "select employee_id,employee_full_name,role_id,role_name from Employees inner join Role on Employees.fkrole_id=Role.role_id");
                                                while ($row = pg_fetch_row($result)) {
                                                    $eid = "eid" . $row[0];
                                                    $rid = "rid" . $row[2];
                                                    echo "<tr id='$eid/$rid'>";
                                                    echo "<td>$row[0]</td>";
                                                    $array = explode(" ", $row[1]);
                                                    echo "<td> $array[0]  $array[2]</td>";
                                                    echo "<td>$row[3]</td>";
                                                    echo "  <td><input class='form-check-input' type='checkbox'></td>
                                                </tr>";
                                                }
                                                pg_free_result($result);
                                                pg_close($connection);
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Employee Id</th>
                                                    <th>Name</th>
                                                    <th>Position/Role</th>
                                                    <th>Free/Switch</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="row">
                        <p class="fs-4">Free Roles</p>
                    </div>
                    <div class="row pb-3">
                        <ul class="list-group list-group-flush" id="roles">
                            <?php
                            $connection = pg_connect("host=localhost dbname=hrm user=hrmpadmin password=hradmin@111 port=5432") or die("cannot connect");
                            $result = pg_query($connection, "select role_id,role_name,role_current_holding,role_max_holding from Role where role_current_holding != role_max_holding;");
                            while ($row = pg_fetch_row($result)) {
                                echo "<li id='$row[0]' class='list-group-item'>";
                                echo "$row[1]  ";
                                echo  "<span class='badge bg-primary rounded-pill'>";
                                $free = $row[3] - $row[2];
                                echo "$free";
                                echo "</span></li>";
                            }
                            pg_free_result($result);
                            pg_close($connection);
                            ?>
                        </ul>
                    </div>
                    <div class="row border-top border-5 pt-3">
                        <p class="fs-4">Free Employees</p>
                    </div>
                    <div class="row">
                        <ul class="list-group list-group-flush" id="freeEmp">
                            <?php
                            $connection = pg_connect("host=localhost dbname=hrm user=hrmpadmin password=hradmin@111 port=5432") or die("cannot connect");
                            $result = pg_query($connection, "select employee_id,employee_full_name from Employees where fkrole_id is null");
                            while ($row = pg_fetch_row($result)) {
                                echo "<li id='$row[0]' class='list-group-item'>";
                                $array = explode(" ", $row[1]);
                                echo "$array[0]  $array[2]</li>";
                            }
                            pg_free_result($result);
                            pg_close($connection);
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Assign</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="SelectableEmp" class="form-label">Select Employee</label>
                    <select class="form-select" id="SelectableEmp">
                        <option selected>Open this select menu</option>
                    </select>
                    <label for="SelectableRole" class="form-label mt-2">Select Role</label>
                    <select class="form-select" id="SelectableRole">
                        <option selected>Open this select menu</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal" onclick="AssignRole(true)">Assign</button>
                </div>
            </div>
        </div>
    </div>

    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./js/jquery-3.5.1.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap5.min.js"></script>
    <script src="./js/script.js"></script>
    <script src="./js/time.js"></script>
    <script>
        setInterval(updateClock, 1000 * 60);

        function GenerateRoles() { //copies the value of roles and employees into modal form
            let froles = document.getElementById("roles"); //here the options of select element has
            //id of its own id
            let femp = document.getElementById("freeEmp");

            let freeRoleslist = froles.getElementsByTagName("li");
            let freeEmployeelist = femp.getElementsByTagName("li");

            let SelectableEmp = document.getElementById("SelectableEmp");
            let SelectableRole = document.getElementById("SelectableRole");
            removeAllChildNodes(SelectableEmp);
            removeAllChildNodes(SelectableRole); //removing all childs
            for (let i = 0; i < freeRoleslist.length; i++) {
                let option = document.createElement("option");
                option.setAttribute("id", "rid" + freeRoleslist[i].id);
                let text = document.createTextNode(freeRoleslist[i].firstChild.nodeValue);
                option.appendChild(text);
                SelectableRole.appendChild(option);
            }
            for (let i = 0; i < freeEmployeelist.length; i++) {
                let option = document.createElement("option");
                let text = document.createTextNode(freeEmployeelist[i].firstChild.nodeValue);
                option.setAttribute("id", "eid" + freeEmployeelist[i].id); //suffix of eid for modal
                option.appendChild(text);
                SelectableEmp.appendChild(option);
            }
        }

        function removeAllChildNodes(parent) { //function to remove all childs of given parent element
            while (parent.firstChild) {
                parent.removeChild(parent.firstChild);
            }
        }

        async function AssignRole(flag, eid, rid) //assigning role 
        {
            if (flag == true) {
                let emp = document.getElementById("SelectableEmp").selectedOptions; //passing selected elements collection
                let role = document.getElementById("SelectableRole").selectedOptions;
                let dataresponse = await fetch("/HR-Management-System/api/roleAPI.php?type=assignrole&roleid=" + role[0].id.slice(3) +
                    "&empid=" + emp[0].id.slice(3));
                let resjson = await dataresponse.json();
                if (resjson.status == "success") {

                    addRecordtoTable(emp, role); //updating table
                    deleteFromfreeRoles(role);
                    deleteFromfreeEmployees(emp);
                }
            } else if (flag == false) {
                let dataresponse = await fetch("/HR-Management-System/api/roleAPI.php?type=assignrole&roleid=" + rid +
                    "&empid=" + eid);
                let resjson = await dataresponse.json();
                if (resjson.status == "success") {
                    console.log("success");
                }
            }
        }
        async function freeRole(flag, eid, rid) {
            if (flag == true) {
                let tablebody = document.getElementById("assignmentTable");
                let allcheckboxes = document.getElementsByTagName("input");
                let j = 0;
                let CheckedCheckboxarray = [];
                for (let i = 0; i < allcheckboxes.length; i++) {
                    if (allcheckboxes[i].checked == true) {
                        console.log("checked");
                        CheckedCheckboxarray[j] = allcheckboxes[i];
                        j++;
                    }
                }
                for (let i = 0; i < CheckedCheckboxarray.length; i++) {
                    let tablerow = CheckedCheckboxarray[i].parentNode.parentNode;
                    let ids = tablerow.id.split("/");
                    let eid = ids[0].slice(3);
                    let rid = ids[1].slice(3);
                    let dataresponse = await fetch("/HR-Management-System/api/roleAPI.php?type=freerole&roleid=" + rid +
                        "&empid=" + eid);
                    let resjson = await dataresponse.json();
                    if (resjson.status == "success") {
                        console.log("success");
                        let ename = tablerow.getElementsByTagName("td")[1].innerText;
                        let rname = tablerow.getElementsByTagName("td")[2].innerText;
                        addTofreeEmployees(eid, ename);
                        addTofreeRoles(rid, rname);
                        //console.log(tablerow);
                        deletefromRecordTable(tablerow);
                    }
                }
            } else if (flag == false) {
                let dataresponse = await fetch("/HR-Management-System/api/roleAPI.php?type=freerole&roleid=" + rid +
                    "&empid=" + eid);
                let resjson = await dataresponse.json();
                if (resjson.status == "success") {
                    console.log("success");
                }
            }
        }

        function SwichRole() {

            let tablebody = document.getElementById("assignmentTable");
            let allcheckboxes = document.getElementsByTagName("input");
            let j = 0;
            let CheckedCheckboxarray = [];
            for (let i = 0; i < allcheckboxes.length; i++) {
                if (allcheckboxes[i].checked == true) {
                    console.log("checked");
                    CheckedCheckboxarray[j] = allcheckboxes[i];
                    j++;
                }
            }
            if (CheckedCheckboxarray.length > 2 || CheckedCheckboxarray.length < 2) {
                alert("Please choose 2 employees to switch roles between");
                return false;
            }
            let tablerow1 = CheckedCheckboxarray[0].parentNode.parentNode;
            let tablerow2 = CheckedCheckboxarray[1].parentNode.parentNode;
            let ids1 = tablerow1.id.split("/");
            let eid1 = ids1[0];
            let rid1 = ids1[1];
            freeRole(false, eid1.slice(3), rid1.slice(3));
            let ids2 = tablerow2.id.split("/");
            let eid2 = ids2[0];
            let rid2 = ids2[1];
            freeRole(false, eid2.slice(3), rid2.slice(3));
            AssignRole(false, eid1.slice(3), rid2.slice(3));
            AssignRole(false, eid2.slice(3), rid1.slice(3));
            let newid1 = eid1 + "/" + rid2;
            let newid2 = eid2 + "/" + rid1;

            let rname1 = tablerow1.getElementsByTagName("td")[2].innerText;
            let rname2 = tablerow2.getElementsByTagName("td")[2].innerText;
            tablerow1.getElementsByTagName("td")[2].innerText = rname2;
            tablerow2.getElementsByTagName("td")[2].innerText = rname1;
            tablerow1.id = newid1;
            tablerow2.id = newid2;
            for (let i = 0; i < CheckedCheckboxarray.length; i++) { //unchecking all the checkboxes
                CheckedCheckboxarray[i].checked = false;
            }
            return true;
        }

        function addRecordtoTable(...args) //empid,enamae,role
        {
            let tablebody = document.getElementById("assignmentTable");
            let tablerow = document.createElement("tr");
            for (let i = 0; i < args.length; i++) { //looping through passed arguments
                if (i == 0) {
                    let td = document.createElement("td");
                    let idtextdata = document.createTextNode((args[i][0].id).slice(3)); //slicing empid
                    td.appendChild(idtextdata);
                    let td2 = document.createElement("td");
                    let nametextdata = document.createTextNode(args[i][0].value);
                    td2.appendChild(nametextdata);
                    tablerow.appendChild(td);
                    tablerow.appendChild(td2);
                } else {
                    let td = document.createElement("td");
                    let textdata = document.createTextNode(args[i][0].value);
                    td.appendChild(textdata);
                    tablerow.appendChild(td);
                }
                tablerow.setAttribute("id", args[0][0].id + "/" + args[1][0].id); //assigning employee id to table row
            }
            let td = document.createElement("td");
            let input = document.createElement("input");
            input.setAttribute("class", "form-check-input");
            input.setAttribute("type", "checkbox");
            td.appendChild(input);
            tablerow.appendChild(td);
            tablebody.appendChild(tablerow);
        }

        function addTofreeRoles(roleid, rolename) {

            let froles = document.getElementById("roles");
            let allrolesli = froles.getElementsByTagName("li");
            let flag = 1;
            for (let i = 0; i < allrolesli.length; i++) {
                if ((allrolesli[i].id) == roleid) {
                    let badge = allrolesli[i].getElementsByTagName("span");
                    let totalPositions = badge[0].innerText;
                    badge[0].innerText = ++totalPositions;
                    flag = 0;
                    break;
                }
            }
            if (flag == 1) {
                let li = document.createElement("li");
                li.setAttribute("id", roleid);
                li.setAttribute("class", "list-group-item");
                let textrolename = document.createTextNode(rolename);
                let span = document.createElement("span");
                span.setAttribute("class", "badge bg-primary rounded-pill");
                let totalrole = document.createTextNode("1");
                span.appendChild(totalrole);
                li.appendChild(textrolename);
                li.appendChild(span);
                froles.appendChild(li);
            }

        }

        function deleteFromfreeRoles(selectedOp) {
            let roleId = selectedOp[0].id.slice(3);
            let li = document.getElementById(roleId);
            let badge = li.getElementsByTagName("span");
            let totalPositions = badge[0].innerText;
            if (totalPositions < 2) {
                let parentul = li.parentNode;
                parentul.removeChild(li);
            } else {
                badge[0].innerText = --totalPositions;
            }

        }

        function addTofreeEmployees(eid, ename) {
            let femp = document.getElementById("freeEmp");
            let li = document.createElement("li");
            li.setAttribute("id", eid);
            li.setAttribute("class", "list-group-item");
            let textrolename = document.createTextNode(ename);
            li.appendChild(textrolename);
            femp.appendChild(li);
        }

        function deletefromRecordTable(row) {
            let tablebody = row.parentNode;
            tablebody.removeChild(row);
        }

        function deleteFromfreeEmployees(selectedOp) {
            let eId = selectedOp[0].id.slice(3);
            let li = document.getElementById(eId);
            let parentul = li.parentNode;
            parentul.removeChild(li);
        }
    </script>
</body>

</html>