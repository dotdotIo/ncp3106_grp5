<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values


$Event_ID = $Student_Num = $Time_In = $Time_Out = $Payment = "";
$Event_ID_err = $Student_Num_err = $Time_In_err = $Time_Out_err = $Payment_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $input_Event_ID = trim($_POST["Event_ID"]);
    if (empty($input_Event_ID)) {
        $Event_ID_err = "Input An Event ID.";
    } else {
        $Event_ID = $input_Event_ID;
    }

    $input_Student_Num = trim($_POST["Student_Num"]);
    if (empty($input_Student_Num)) {
        $Student_Num_err = "Please enter Student_Num.";
    } else {
        $Student_Num = $input_Student_Num;
    }
  
    $input_Time_In = trim($_POST["Time_In"]);
    if (empty($input_Time_In)) {
        $Time_In_err = "Please enter Time_In.";
    } else {
        $Time_In = $input_Time_In;
    }

    $input_Time_Out = trim($_POST["Time_Out"]);
    if (empty($input_Time_Out)) {
        $Time_Out_err = "Please Time_Out.";
    } else {
        $Time_Out = $input_Time_Out;
    }

    $input_Payment = trim($_POST["Payment"]);
    if (empty($input_Payment)) {
        $Payment_err = "Payment.";
    } else {
        $Payment = $input_Payment;
    }

    // $Event_ID = $Student_Num = $Time_In = $Time_Out = $Payment
    // Check input errors before inserting in database
    if (empty($Event_ID_err) && empty($Student_Num_err) && empty($Time_In_err) && empty($Time_Out_err) && empty($Payment_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO attendee_reg (Event_ID , Student_Num, Time_In , Time_Out , Payment) VALUES (?, ?, ?, ?, ?)";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssss", $param_Event_ID , $param_Student_Num, $param_Time_In, $param_Time_Out ,$param_Payment);

            // Set parameters
            $param_Event_ID = $Event_ID ;
            $param_Student_Num = $Student_Num;
            $param_Time_In = $Time_In;
            $param_Time_Out = $Time_Out;
            $param_Payment = $Payment;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Records created successfully. Redirect to landing page
                header("location: Attendee_Reg_Display.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
                header("location: Attendee_Reg_Display.php");
            }
        }
       
        // Close statement
        $stmt->close();
    }

    // Close connection
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
<div class="container">
        <div class="container">
          <a href="login.html">
            <p style="    color: white;">.</p>
            <span class="glyphicon glyphicon-log-out"></span> Back
          </a>
      </div>
    </div>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add student record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Event ID</label>
                            <input type="text" name="Event_ID" class="form-control <?php echo (!empty($Event_ID_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Event_ID; ?>">
                            <span class="invalid-feedback"><?php echo $Event_ID_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Student_Num</label>
                            <input type="text" name="Student_Num" class="form-control <?php echo (!empty($Student_Num_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Student_Num; ?>">
                            <span class="invalid-feedback"><?php echo $Student_Num_err; ?></span>
                        </div>

                        <div class="form-group">
                            <label>Time_In</label>
                            <input type="time" name="Time_In" class="form-control <?php echo (!empty($Time_In_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Time_In; ?>">
                            <span class="invalid-feedback"><?php echo $Time_In_err; ?></span>
                        </div>      
                        
                        <div class="form-group">
                            <label>Time_Out</label>
                            <input type="time" name="Time_Out" class="form-control <?php echo (!empty($Time_Out_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Time_Out; ?>">
                            <span class="invalid-feedback"><?php echo $Time_Out_err; ?></span>
                        </div>    

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="Attendee_Reg_Display.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>