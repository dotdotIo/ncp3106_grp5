
<!DOCTYPE html>
<html lang="en">
<head>
  <title>ACCOUNT LOG IN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="log-style.css">

  <style>
    body, h2, h3, form, input, button, label {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<body class="img js-fullheight" style="background-image: url(images/2.gif);">
  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
          <h2 class="heading-section">ADMIN PORTAL</h2>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
          <div class="login-wrap p-0">
            <form>
              <div class="form-group">
                <input id="usrname" type="text" class="form-control" placeholder="Username" required>
              </div>
              <div class="form-group">
                <input id="password-field" type="password" class="form-control" placeholder="Password" required>
                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
              </div>
              <div class="form-group">
                  <!-- <button type="submit" class="form-control btn btn-primary submit px-3" onclick="checkPswd();">Login</button> -->
                  <input type="button" value="Login" onclick="checkPswd();" />
              </div>
              <div class="form-group d-md-flex">
                <div class="w-50">
                  <label class="checkbox-wrap checkbox-primary">Remember Me
                    <input type="checkbox" checked>
                    <span class="checkmark"></span>
                  </label>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script type="text/javascript">
    function checkPswd() {
        var confirmUser = "admin";
        var confirmPassword = "admin";
        var password = document.getElementById("password-field").value;
        var user = document.getElementById("usrname").value;
        if (password == confirmPassword && user == confirmUser) {
             window.location="dashboard.php";
        }
        else{
            alert("Username and Password do not match.");
        }
      }
  </script>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>