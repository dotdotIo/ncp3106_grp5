<?php
include_once 'config.php';
$Student_Num = $Last_Name = $First_Name = $Middle_Name = $Year_Level = $Program = $Contact_Num = $Email_Add = '';
$Student_Num_err = $Last_Name_err = $First_Name_err = $Middle_Name_err = $Year_Level_err = $Program_err = $Contact_Num_err = $Email_Add_err = '';

if (count($_POST) > 0) {
    // Validate Student Number
    if (empty($_POST['Student_Num'])) {
        $Student_Num_err = 'Please enter Student Number';
    }

    // Validate Last Name
    if (empty($_POST['Last_Name'])) {
        $Last_Name_err = 'Please enter Last Name';
    }

    // Validate First Name
    if (empty($_POST['First_Name'])) {
        $First_Name_err = 'Please enter First Name';
    }

    // Validate Middle Name
    if (empty($_POST['Middle_Name'])) {
        $Middle_Name_err = 'Please enter Middle Name';
    }

    // Validate Year Level (add your specific validation logic)
    // For example, if Year Level should be between 1 and 4:
    if (!isset($_POST['Year_Level']) || ($_POST['Year_Level'] < 1 || $_POST['Year_Level'] > 4)) {
        $Year_Level_err = 'Please select a valid Year Level';
    }

    // Validate Program (add your specific validation logic)
    // For example, if Program should be one of the specified values:
    $valid_programs = ['CpE', 'ME', 'EE', 'CE'];
    if (!isset($_POST['Program']) || !in_array($_POST['Program'], $valid_programs)) {
        $Program_err = 'Please select a valid Program';
    }

    // Validate Contact Number (add your specific validation logic)
    // For example, if Contact Number should be a valid phone number:
    if (empty($_POST['Contact_Num']) || !preg_match('/^\d{11}$/', $_POST['Contact_Num'])) {
        $Contact_Num_err = 'Please enter a valid Contact Number';
    }

    // Validate Email Address (add your specific validation logic)
    // For example, if Email Address should be a valid email format:
    if (empty($_POST['Email_Add']) || !filter_var($_POST['Email_Add'], FILTER_VALIDATE_EMAIL)) {
        $Email_Add_err = 'Please enter a valid Email Address';
    }

    // If there are no validation errors, update the record
    if (empty($Student_Num_err) && empty($Last_Name_err) && empty($First_Name_err) && empty($Middle_Name_err) && empty($Year_Level_err) && empty($Program_err) && empty($Contact_Num_err) && empty($Email_Add_err)) {
        $stmt = $mysqli->prepare("UPDATE student_reg SET Student_Num=?, Last_Name=?, First_Name=?, Middle_Name=?, Year_Level=?, Program=?, Contact_Num=?, Email_add=? WHERE Student_Num=?");
        $stmt->bind_param("isssssssi", $_POST['Student_Num'], $_POST['Last_Name'], $_POST['First_Name'], $_POST['Middle_Name'], $_POST['Year_Level'], $_POST['Program'], $_POST['Contact_Num'], $_POST['Email_Add'],$param_stud_num);
        
        $param_stud_num = $_POST['Student_Num'];

         // Attempt to execute the prepared statement
         if ($stmt->execute()) {
            // Records created successfully. Redirect to landing page
            header("location: student_reg_display.php");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
            header("location: Event_display.php");
        }
    }
    }
    


$result = mysqli_query($mysqli, "SELECT * FROM student_reg WHERE `student_reg`.`Student_Num`= '$Student_Num'");
// $row = mysqli_fetch_array($result); // Unused variable
?>  

<?php
include_once 'config.php';
// Fetch record for display (assuming it's needed elsewhere in your code)
$Student_Num = isset($_POST['Student_Num']) ? $_POST['Student_Num'] : '';
$result = mysqli_query($mysqli, "SELECT * FROM student_reg WHERE `student_reg`.`Student_Num`= '$Student_Num'");
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
        </div>
    </div>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5" style="color: white;">Update Record</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label style="color: white;">Student Number</label>
                            <style>
                                input::-webkit-outer-spin-button,
                                input::-webkit-inner-spin-button {
                                    display: none;
                                }
                            </style>
                            <input type="number" name="Student_Num" class="form-control <?php echo (!empty($Student_Num_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Student_Num; ?>">
                            <span class="invalid-feedback"><?php echo $Student_Num_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label style="color: white;">Last Name</label>
                            <input type="text" name="Last_Name" class="form-control <?php echo (!empty($Last_Name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Last_Name; ?>">
                            <span class="invalid-feedback"><?php echo $Last_Name_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label style="color: white;">First Name</label>
                            <input type="text" name="First_Name" class="form-control <?php echo (!empty($First_Name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $First_Name; ?>">
                            <span class="invalid-feedback"><?php echo $First_Name_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label style="color: white;">Middle Name</label>
                            <input type="text" name="Middle_Name" class="form-control <?php echo (!empty($Middle_Name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Middle_Name; ?>">
                            <span class="invalid-feedback"><?php echo $Middle_Name_err; ?></span>
                        </div>

                        <div class="form-group">
                            <label style="color: white;">Year Level:</label>
                            <select name="Year_Level" id="Year_Level">
                                <option value="1">1st</option>
                                <option value="2">2nd</option>
                                <option value="3">3rd</option>
                                <option value="4">4th</option>
                            </select>
                            <!-- Removed redundant code -->
                            <span class="invalid-feedback"><?php echo $Year_Level_err; ?></span>
                        </div>

                        <div class="form-group">
                            <label style="color: white;">Program:</label>
                            <select name="Program" id="Program">
                                <option value="CpE">Computer Engineer</option>
                                <option value="ME">Mechanical Engineer</option>
                                <option value="EE">Electrical Engineer</option>
                                <option value="CE">Civil Engineer</option>
                            </select>
                            <!-- Removed redundant code -->
                            <span class="invalid-feedback"><?php echo $Program_err; ?></span>
                        </div>

                        <div class="form-group">
                            <label style="color: white;">Contact Number</label>
                            <input type="text" name="Contact_Num" class="form-control <?php echo (!empty($Contact_Num_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Contact_Num; ?>">
                            <span class="invalid-feedback"><?php echo $Contact_Num_err; ?></span>
                        </div>

                        <div class="form-group">
                            <label style="color: white;">E-Mail</label>
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
