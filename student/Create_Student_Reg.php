<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$Student_Num = $Last_Name = $First_Name = $Middle_Name = $Year_Level = $Program = $Contact_Num = $Email_Add = "";
$Student_Num_err = $Last_Name_err = $First_Name_err = $Middle_Name_err = $Year_Level_err = $Program_err = $Contact_Num_err = $Email_Add_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate Student Number
    $input_Student_Num = trim($_POST["Student_Num"]);
    if (empty($input_Student_Num)) {
        $Student_Num_err = "Please enter Student Number.";
    } else {
        $Student_Num = $input_Student_Num;
    }

    // Validate Last Name
    $input_Last_Name = trim($_POST["Last_Name"]);
    if (empty($input_Last_Name)) {
        $Last_Name_err = "Please enter your Last Name.";
    } else {
        $Last_Name = $input_Last_Name;
    }
    // Validate First Name
    $input_First_Name = trim($_POST["First_Name"]);
    if (empty($input_First_Name)) {
        $First_Name_err = "Please enter your First Name.";
    } else {
        $First_Name = $input_First_Name;
    }

     // Validate Middle Name
    $input_Middle_Name = trim($_POST["Middle_Name"]);
    if (empty($input_Middle_Name)) {
        $Middle_Name_err = "Please enter your Middle Name.";
    } else {
        $Middle_Name = $input_Middle_Name;
    }

      // Validate Year Level
    $input_Year_Level = trim($_POST["Year_Level"]);
    if (empty($input_Year_Level)) {
        $Year_Level_err = "Please enter your Year Level.";
    } else {
        $Year_Level = $input_Year_Level;
    }

     // Validate Program/Course
    $input_Program = trim($_POST["Program"]);
    if (empty($input_Program)) {
        $Program_err = "Please enter your Course.";
    } else {
        $Program = $input_Program;
    }

    // Validate Contact Number
    $input_Contact_Num = trim($_POST["Contact_Num"]);
    if (empty($input_Contact_Num)) {
        $Contact_Num_err = "Please enter your Contact Number.";
    } else {
        $Contact_Num = $input_Contact_Num;
    }
   
    // Validate Email_Add
    $input_Email_Add = trim($_POST["Email_Add"]);
    if (empty($input_Email_Add)) {
        $Email_Add_err = "Please enter your E-Mail.";
    } else {
        $Email_Add = $input_Email_Add;
    }    


    // Check input errors before inserting in database
    if (empty($Student_Num_err) && empty($Last_Name_err) && empty($First_Name_err) && empty($Middle_Name_err) && empty($Year_Level_err)
    && empty($Program_err) && empty($Contact_Num_err) && empty($Email_Add_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO student_reg (Student_Num, Last_Name, First_Name, Middle_Name, Year_Level, Program, Contact_Num, Email_add)
         VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssssisss", $param_Student_Num, $param_Last_Name, $param_First_Name, $param_Middle_Name, 
            $param_Year_Level ,$param_Program, $param_Contact_Num, $param_Email_Add);

            // Set parameters
            $param_Student_Num = $Student_Num;
            $param_Last_Name = $Last_Name;
            $param_First_Name = $First_Name;
            $param_Middle_Name = $Middle_Name;
            $param_Year_Level = $Year_Level;
            $param_Program = $Program;
            $param_Contact_Num = $Contact_Num;
            $param_Email_Add = $Email_Add;


            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Records created successfully. Redirect to landing page
                header("location: student_reg_display.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
                header("location: student_reg_display.php");
            }
        }
        $stmt->close();
        // Close statement
       
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
            <p style="    color: white;">.</p>
            <a href="#" class="previous">&laquo; Back</a>
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
                            <label>Student Number</label>
                            <input type="text" name="Student_Num" class="form-control <?php echo (!empty($Student_Num_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Student_Num; ?>">
                            <span class="invalid-feedback"><?php echo $Student_Num_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="Last_Name" class="form-control <?php echo (!empty($Last_Name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Last_Name; ?>">
                            <span class="invalid-feedback"><?php echo $Last_Name_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="First_Name" class="form-control <?php echo (!empty($First_Name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $First_Name; ?>">
                            <span class="invalid-feedback"><?php echo $First_Name_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Middle Name</label>
                            <input type="text" name="Middle_Name" class="form-control <?php echo (!empty($Middle_Name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Middle_Name; ?>">
                            <span class="invalid-feedback"><?php echo $Middle_Name_err; ?></span>
                        </div>

                        <div class="form-group">
                            <label>Year Level</label>
                            <input type="text" name="Year_Level" class="form-control <?php echo (!empty($Year_Level_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Year_Level; ?>">
                            <span class="invalid-feedback"><?php echo $Year_Level_err; ?></span>
                        </div>

                        <div class="form-group">
                            <label>Course</label>
                            <input type="text" name="Program" class="form-control <?php echo (!empty($Program_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Program; ?>">
                            <span class="invalid-feedback"><?php echo $Program_err; ?></span>
                        </div>      
                        
                        <div class="form-group">
                            <label>Contact Number</label>
                            <input type="text" name="Contact_Num" class="form-control <?php echo (!empty($Contact_Num_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Contact_Num; ?>">
                            <span class="invalid-feedback"><?php echo $Contact_Num_err; ?></span>
                        </div>    
                        
 
                        <div class="form-group">
                            <label>E-Mail</label>
                            <input type="email" name="Email_Add" class="form-control <?php echo (!empty($Email_Add_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Email_Add; ?>">
                            <span class="invalid-feedback"><?php echo $Email_Add_err; ?></span>
                        </div>  

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="Student_Reg_display.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>