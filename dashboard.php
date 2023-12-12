<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
 

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="dash-style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
     body, h2, h3, button {
      font-family: 'Poppins', sans-serif;
    }
    .btn-info {
        background-color:#28a745; /* Green color */
        border-color: #36a550; /* Green color for the border */
      }
      a {
        text-decoration: none;
        display: inline-block;
        padding: 8px 16px;
        }

        a:hover {
        background-color: #ddd;
        color: red;
        }

        .previous {
        background-color: #f1f1f1;
        color: black;
        }
  </style>
</head>
<body class="img js-fullheight" style="background-image: url(images/2.gif);"> 
<div class="container">
        <div class="container">
            <br>
            <a href="login.php" class="glyphicon glyphicon-log-out" style= "color: white;"> LOG OUT</a>
          </a>
      </div>
 

  <section class="ftco-section">
    <div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section" style= "color: white;">Dashboard</h2>
				</div>
			</div>
      <div class="row justify-content-center">
        <div class="col-md-4">
          <div class="wrap">
            <div class="img" style="background-image: url(images/3.jpg);"></div>
            <div class="login-wrap p-2 p-md-4 text-center">
              <div class="d-flex">
                <div class="w-100">
                  <h3 class="mb-2">Student Registration</h3>
                </div>
              </div>
              <div class="form-group">
              <a href="Student_Reg_Display.php">
                <button type="submit" class="form-control btn btn-primary rounded submit px-2">Student Registration</button>
              </a>
              </div>
              <div class="form-group d-md-flex">
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="wrap">
            <div class="img" style="background-image: url(images/4.jpg);"></div>
            <div class="login-wrap p-2 p-md-4 text-center">
              <div class="d-flex">
                <div class="w-100">
                  <h3 class="mb-2">Event Display</h3>
                </div>
              </div>
              <div class="form-group">
              <a href="Event_Display.php">
                <button type="submit" class="form-control btn btn-primary rounded submit px-2">Events</button>
              </a>
              </div>
              <div class="form-group d-md-flex">
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="wrap">
            <div class="img" style="background-image: url(images/5.jpg);"></div>
            <div class="login-wrap p-2 p-md-4 text-center">
              <div class="d-flex">
                <div class="w-100">
                  <h3 class="mb-2">Attendee Registration</h3>
                </div>
              </div>
              <div class="form-group">
              <a href="Attendee_Reg_Display.php">
                <button type="submit" class="form-control btn btn-primary rounded submit px-2">Attendees</button>
               </a>
              </div>
              <div class="form-group d-md-flex">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
