<?php
include_once 'config.php';
$Event_ID = $Event_Name = $Event_Desc = $Event_Type = $Dates = $Time_Start = $Time_End = $Registration_Fee = "";
$Event_ID_err = $Event_Name_err = $Event_Desc_err = $Event_Type_err = $Dates_err = $Time_Start_err = $Time_End_err = $Registration_Fee_err = "";

if (count($_POST) > 0) {
    
    $input_Event_ID = trim($_POST["Event_ID"]);
    if (empty($input_Event_ID)) {
      $Event_ID_err = "Input An Event ID.";
    } else {
       $Event_ID = $input_Event_ID;
    }
  
    $input_Event_Name = trim($_POST["Event_Name"]);
    if (empty($input_Event_Name)) {
        $Event_Name_err = "Please enter Event Name.";
    } else {
        $Event_Name = $input_Event_Name;
    }
  
    $input_Event_Desc = trim($_POST["Event_Desc"]);
    if (empty($input_Event_Desc)) {
        $Event_Desc_err = "Please enter a Description of the Event.";
    } else {
        $Event_Desc = $input_Event_Desc;
    }

    $input_Event_Type = trim($_POST["Event_Type"]);
    if (empty($input_Event_Type)) {
        $Event_Type_err = "Please Event_Type.";
    } else {
        $Event_Type = $input_Event_Type;
    }

    $input_Dates = trim($_POST["Dates"]);
    if (empty($input_Dates)) {
        $Dates_err = "Please Date.";
    } else {
        $Dates = $input_Dates;
    }

    $input_Time_Start = trim($_POST["Time_Start"]);
    if (empty($input_Time_Start)) {
        $Time_Start_err = "Please enter Time Start.";
    } else {
        $Time_Start = $input_Time_Start;
    }

    $input_Time_End = trim($_POST["Time_End"]);
    if (empty($input_Time_End)) {
        $Time_End_err = "Please enter Time End.";
    } else {
        $Time_End = $input_Time_End;
    }
   
    $input_Registration_Fee = trim($_POST["Registration_Fee"]);
    if (empty($input_Registration_Fee)) {
        $Registration_Fee_err = "Please enter a Registration Fee";
    } else {
        $Registration_Fee = $input_Registration_Fee;
    }    

    // If there are no validation errors, update the record
    if (empty($Event_ID_err) && empty($Event_Name_err) && empty($Dates_err) && empty($Time_Start_err) && empty($Time_End_err) && empty($Event_Desc_err) && empty($Registration_Fee_err)) {
        $stmt = $mysqli->prepare("UPDATE event_creation SET Event_ID=?, Event_Name=?, Dates=?, Time_Start=?, Time_End=?, Event_Desc=?, Registration_Fee=? WHERE Event_ID=?");
        $stmt->bind_param("issssssi", $_POST['Event_ID'], $_POST['Event_Name'], $_POST['Dates'], $_POST['Time_Start'], $_POST['Time_End'], $_POST['Event_Desc'], $_POST['Registration_Fee'],$param_event_ID);
        
        $param_event_ID = $_POST['Event_ID'];

         // Attempt to execute the prepared statement
         if ($stmt->execute()) {
            // Records created successfully. Redirect to landing page
            header("location: Event_display.php");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
            header("location: student_reg_display.php");
        }
    }
    }
    

$result = mysqli_query($mysqli, "SELECT * FROM event_creation WHERE `event_creation`.`Event_ID`= '$Event_ID'");
// $row = mysqli_fetch_array($result); // Unused variable
?>  

<?php
include_once 'config.php';
// Fetch record for display (assuming it's needed elsewhere in your code)
$Student_Num = isset($_POST['Event_ID']) ? $_POST['Event_ID'] : '';
$result = mysqli_query($mysqli, "SELECT * FROM event_creation WHERE `event_creation`.`Event_ID`= '$Event_ID'");
$row = mysqli_fetch_array($result);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                    <h2 class="mt-5" style ="color: white">Edit Event</h2>
                    <p style ="color: white"></p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                            <label style ="color: white">Event ID</label>
                            <input type="text" name="Event_ID" class="form-control <?php echo (!empty($Event_ID_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Event_ID; ?>">
                            <span class="invalid-feedback"><?php echo $Event_ID_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label style ="color: white">Event Name</label>
                            <input type="text" name="Event_Name" class="form-control <?php echo (!empty($Event_Name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Event_Name; ?>">
                            <span class="invalid-feedback"><?php echo $Event_Name_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label style ="color: white">Event Description</label>
                            <input type="text" name="Event_Desc" class="form-control <?php echo (!empty($Event_Desc_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Event_Desc; ?>">
                            <span class="invalid-feedback"><?php echo $Event_Desc_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label style ="color: white">Event Type</label>
                            <input type="text" name="Event_Type" class="form-control <?php echo (!empty($Event_Type_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Event_Type; ?>">
                            <span class="invalid-feedback"><?php echo $Event_Type_err; ?></span>
                        </div>

                        <div class="form-group">
                            <label style ="color: white">Date</label>
                            <input type="date" name="Dates" class="form-control <?php echo (!empty($Dates_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Dates; ?>">
                            <span class="invalid-feedback"><?php echo $Dates_err; ?></span>
                        </div>

                        <div class="form-group">
                            <label style ="color: white">Time Start</label>
                            <input type="time" name="Time_Start" class="form-control <?php echo (!empty($Time_Start_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Time_Start; ?>">
                            <span class="invalid-feedback"><?php echo $Time_Start_err; ?></span>
                        </div>      
                        
                        <div class="form-group">
                            <label style ="color: white">Time End</label>
                            <input type="time" name="Time_End" class="form-control <?php echo (!empty($Time_End_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Time_End; ?>">
                            <span class="invalid-feedback"><?php echo $Time_End_err; ?></span>
                        </div>    
                        
                        <div class="form-group">
                            <label style ="color: white">Registration Fee</label>
                            <input type="text" name="Registration_Fee" class="form-control <?php echo (!empty($Registration_Fee_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Registration_Fee; ?>">
                            <span class="invalid-feedback"><?php echo $Registration_Fee_err; ?></span>
                        </div>  

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="Event_display.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
