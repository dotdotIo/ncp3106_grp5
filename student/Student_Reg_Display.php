<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Registed Student</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
                .wrapper {
            width: 600px;
            margin: 10px auto;
        
        }

        table tr td:last-child {
            width: 120px;
        }
    </style>
      </script>
</head>

    <style>
        table{
            width: 120%;
            margin: auto;
            font-family: Arial, Helvetica, sans-serif;
        }
        table, tr, th, td{
            border: 1px solid #d4d4d4;
            border-collapse: collapse;
            padding: 12px;
        }
        th, td{
            text-align: left;
            vertical-align: top;
        }
        tr:nth-child(even){
            background-color: #e7e9eb;
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
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Registered Students</h2>
                        <a href="Create_Student_Reg.php" class="btn btn-success pull-right">
                            <i class="fa fa-plus"></i> Student Registration</a><br> </br>
                        <a href="delete_student.php" class="btn btn-success pull-right">
                            <i class="fa fa-minus"></i> Deletion of Student</a>
                    </div>

                        <?php
                        /* Database credentials. Assuming you are running MySQL
                        server with default setting (user 'root' with no password) */
                        define('DB_SERVER', 'localhost');
                        define('DB_USERNAME', 'root');
                        define('DB_PASSWORD', '');
                        define('DB_NAME', 'event');

                        /* Attempt to connect to MySQL database */
                        $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

                        // Check connection
                        if ($mysqli === false) {
                            die("ERROR: Could not connect. " . $mysqli->connect_error);
                        }

                            //Output Form Entries from the Database
                            $sql = "SELECT Student_Num, First_Name, Last_Name, Year_Level FROM student_reg";
                            //fire query    
                            $result = mysqli_query($mysqli, $sql);
                            if(mysqli_num_rows($result) > 0)
                            {
                            echo '<table> <tr> <th> Student Number </th> <th> First Name </th> <th> Last Name </th> 
                            <th> Year Level </th> </tr>';
                            while($row = mysqli_fetch_assoc($result)){
                                // to output mysql data in HTML table format
                                echo '<tr > <td>' . $row["Student_Num"] . '</td>
                                <td>' . $row["First_Name"] . '</td>
                                <td> ' . $row["Last_Name"] . '</td>
                                <td>' . $row["Year_Level"] . '</td> 
                                 </tr>';
                            }
                            echo '</table>';
                            }
                            else
                            {
                                echo "0 results";
                            }
                            // closing connection
                            mysqli_close($mysqli);

                        ?>

                </div>
            </div>
        </div>
    </div>
</body>
</html>