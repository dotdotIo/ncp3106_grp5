<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Attendee List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
    </style>
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
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Attendees</h2>
                        <a href="Create_Attendee_Reg.php" class="btn btn-success pull-right">
                            <i class="fa fa-plus"></i> Attendee Registraion </a><br> </br>
                        <a href="delete_attendee.php" class="btn btn-success pull-right">
                            <i class="fa fa-minus"></i> Attendee Deletion </a>
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
                            $sql = "SELECT Event_ID, Student_Num, Time_In, Time_Out FROM attendee_reg";
                            //fire query    
                            $result = mysqli_query($mysqli, $sql);
                            if(mysqli_num_rows($result) > 0)
                            {
                                echo '<table> <tr> <th> Event_ID </th> <th> Student_Num </th> <th> Time_In </th> <th> Time Out </th></tr>';
                                while($row = mysqli_fetch_assoc($result)){
                                  // to output mysql data in HTML table format
                                    echo '<tr > <td>' . $row["Event_ID"] . '</td>
                                    <td>' . $row["Student_Num"] . '</td>
                                    <td> ' . $row["Time_In"] . '</td>
                                    <td>' . $row["Time_Out"] . '</td>  </tr>';
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