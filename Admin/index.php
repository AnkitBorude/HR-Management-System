<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Login</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
  <section class="vh-100" style="background-color: #9A616D;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <?php
            session_start();
            $usernamecred = "hradmin";
            $passwordcred = "pass@123";
            if (isset($_POST['submit'])) {
              $username = $_POST['uname'];
              $pass = $_POST['pass'];
              if ($username == $usernamecred && $pass == $passwordcred) {
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
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" src="https://plopdo.com/wp-content/uploads/2021/09/coverpic.jpg" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">

                  <form method="post" action=<?php echo "$_SERVER[PHP_SELF]"; ?>>

                    <div class="d-flex align-items-center mb-3 pb-1">
                      <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                      <span class="h1 fw-bold mb-0">Human Resource Management</span>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign in</h5>

                    <div class="form-outline mb-4">
                      <input type="text" id="form2Example17" class="form-control form-control-lg" name="uname" />
                      <label class="form-label" for="form2Example17">UserName</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="password" id="form2Example27" class="form-control form-control-lg" name="pass" />
                      <label class="form-label" for="form2Example27">Password</label>
                    </div>
                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-lg btn-block" name="submit" type="submit">Login</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>