<?php
require_once "config.php";  
?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Deletion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

        

                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Removal of Event from the Database</h4>
                    </div>
                    <div class="card-body">

                        <form action="delete_event_code.php" method="POST">
                            <div class="froum-group mb-3">
                                <label for="">Event ID:</label>
                                <input type="text" name="delete_Event_ID" class="form-control">
                            </div>
                            <div class="froum-group mb-3">
                                <button type="submit" name="event_delete_btn" class="btn btn-primary">Delete Data</button>
                                <a href="Event_Display.php" class="btn btn-secondary ml-2">Cancel</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>