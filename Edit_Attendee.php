<?php
include_once 'config.php';
$Event_ID = $Student_Num = $Time_In = $Time_Out = "";
$Event_ID_err = $Student_Num_err = $Time_In_err = $Time_Out_err = "";
if (count($_POST) > 0) {
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



    // If there are no validation errors, update the record
    if (empty($Event_ID_err) && empty($Student_Num_err) && empty($Time_In_err) && empty($Time_Out_err)) {
        if ($stmt = $mysqli->prepare("UPDATE event_creation SET Event_ID=?, Student_Num=?, Time_In=?, Time_Out=? WHERE Student_Num=?")) {
            $stmt->bind_param("issss", $param_Event_ID, $param_Student_Num, $param_Time_In, $param_Time_Out, $param_Student_Num);
            $param_Event_ID = $Event_ID;
            $param_Student_Num = $Student_Num;
            $param_Time_In = $Time_In;
            $param_Time_Out = $Time_Out;

         // Attempt to execute the prepared statement
         if ($stmt->execute()) {
            // Records created successfully. Redirect to landing page
            header("location: Attendee_Reg_display.php");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
            // header("location: student_reg_display.php");
        }
        }
    }
}
    

$result = mysqli_query($mysqli, "SELECT * FROM attendee_reg WHERE `attendee_reg`.`Student_Num`= '$Student_Num'");
// $row = mysqli_fetch_array($result); // Unused variable
?>  

<?php
include_once 'config.php';
// Fetch record for display (assuming it's needed elsewhere in your code)
$Student_Num = isset($_POST['Student_Num']) ? $_POST['Student_Num'] : '';
$result = mysqli_query($mysqli, "SELECT * FROM attendee_reg WHERE `attendee_reg`.`Student_Num`= '$Student_Num'");
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Attendee</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
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

<body class="img js-fullheight" style="background-image: url(images/8.png);">
<div class="container">
        <div class="container">
            <br>
            <a href="dashboard.php" class="previous">&laquo; Back</a>
          </a>
      </div>
    </div>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5" style ="color: white">Update Attendee</h2>
                    <p style ="color: white"></p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label style ="color: white">Event ID</label>
                            <input type="text" name="Event_ID" class="form-control <?php echo (!empty($Event_ID_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Event_ID; ?>">
                            <span class="invalid-feedback"><?php echo $Event_ID_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label style ="color: white">Student Number</label>
                            <input type="text" name="Student_Num" class="form-control <?php echo (!empty($Student_Num_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Student_Num; ?>">
                            <span class="invalid-feedback"><?php echo $Student_Num_err; ?></span>
                        </div>

                        <div class="form-group">
                            <label style ="color: white">Time In</label>
                            <input type="time" name="Time_In" class="form-control <?php echo (!empty($Time_In_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Time_In; ?>">
                            <span class="invalid-feedback"><?php echo $Time_In_err; ?></span>
                        </div>      
                        
                        <div class="form-group">
                            <label style ="color: white">Time Out</label>
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