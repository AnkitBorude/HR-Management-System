<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Employee Login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

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
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0" style="background-color:#189AB4;">
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">

                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <form method="post" action=<?php echo "$_SERVER[PHP_SELF]"; ?>>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <a href="index.html" class="">
                                    <h3 class="text-primary">Employee</h3>
                                </a>
                                <h3>Sign In</h3>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="floatingInput" name="uname" placeholder="name@example.com">
                                <label for="floatingInput">UserID</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" name="pass" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <?php
                            $connection = pg_connect("host=localhost dbname=hrm user=hrmpadmin password=hradmin@111 port=5432") or die("cannot connect");
                            if (isset($_POST['submit'])) {
                                $username = $_POST['uname'];
                                $pass = $_POST['pass'];
                                $result = pg_query($connection, " select password from Employees where employee_id= '$username'");
                                $row = pg_fetch_row($result);
                                if ($pass == $row[0]) {
                                    session_start();
                                    pg_free_result($result);
                                    pg_close($connection);
                                    $_SESSION['username'] = $username;
                                    $_SESSION['Logedin'] = true;
                                    header("Location:dashboard.php");
                                } else {
                                    echo  '<div class="alert alert-danger">
    <p><strong>Alert</strong></p>
    Username or password wrong! Please try again!.
    </div>';
                                }
                            }
                            ?>
                            <button type="submit" name="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>