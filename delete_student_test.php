<?php
 $con = mysqli_connect("localhost","root","","event"); 
?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Deletion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
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
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <?php 
                    if(isset($_SESSION['status']))
                    {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                        unset($_SESSION['status']);
                    }
                ?>

                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Removal of Student from the Database</h4>
                    </div>
                    <div class="card-body">
                    
                    <select name="Category"> 
                       <?php 
                        $sql = "SELECT * FROM `student_reg`";
                        $all_categories = mysqli_query($con,$sql);
                           while ($category = mysqli_fetch_array(
                        $all_categories,MYSQLI_ASSOC)):; 
                        ?>
                 <option value="<?php echo $category["Student_Num"];?>">
                    <?php echo $category["Student_Num"];?>
                </option>
            <?php 
                endwhile; 
            ?>
                 </select>
                 <form action="delete_student_code.php" method="POST">
                            <div class="froum-group mb-3">
                                <button type="submit" name="stud_delete_btn" class="btn btn-primary">Delete Data</button>
                                <a href="Student_Reg_display.php" class="btn btn-secondary ml-2">Cancel</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>