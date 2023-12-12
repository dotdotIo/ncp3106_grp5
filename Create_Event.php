<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values


$Event_ID = $Event_Name = $Event_Desc = $Event_Type = $Dates = $Time_Start = $Time_End = $Registration_Fee = "";
$Event_ID_err = $Event_Name_err = $Event_Desc_err = $Event_Type_err = $Dates_err = $Time_Start_err = $Time_End_err = $Registration_Fee_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  //  $input_Event_ID = trim($_POST["Event_ID"]);
 //   if (empty($input_Event_ID)) {
  //      $Event_ID_err = "Input An Event ID.";
  //  } else {
  //      $Event_ID = $input_Event_ID;
  //  }

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

    // $Event_ID = $Event_Name = $Event_Desc = $Event_Type = $Date = $Time_Start = $Time_End = $Registration_Fee
    // Check input errors before inserting in database
    if (empty($Event_ID_err) && empty($Event_Name_err) && empty($Event_Desc_err) && empty($Event_Type_err) && empty($Dates_err)
    && empty($Time_Start_err) && empty($Time_End_err) && empty($Registration_Fee_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO event_creation (Event_ID , Event_Name, Event_Desc, Event_Type , Dates , Time_Start, Time_End, Registration_Fee)
         VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssssssss", $param_Event_ID , $param_Event_Name, $param_Event_Desc, $param_Event_Type, 
            $param_Dates ,$param_Time_Start, $param_Time_End, $param_Registration_Fee);

            // Set parameters
            $param_Event_ID = $Event_ID ;
            $param_Event_Name = $Event_Name;
            $param_Event_Desc = $Event_Desc;
            $param_Event_Type = $Event_Type;
            $param_Dates = $Dates;
            $param_Time_Start = $Time_Start;
            $param_Time_End = $Time_End;
            $param_Registration_Fee = $Registration_Fee;


            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Records created successfully. Redirect to landing page
                header("location: Event_display.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
                header("location: Event_display.php");
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
                    <h2 class="mt-5" style ="color: white">Create Record</h2>
                    <p style ="color: white">Please fill this form and submit to add student record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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