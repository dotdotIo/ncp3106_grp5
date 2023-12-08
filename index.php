<?php
session_start();

// Change these values to match your database settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database_name";

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If the user is already logged in, redirect them to the dashboard page
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: dashboard.php');
    exit;
}

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Check if the username and password were submitted
    if (isset($_POST['username']) && isset($_POST['password'])) {

        // Clean the input data
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare the SQL statement
        $sql = "SELECT * FROM users WHERE username = ?";

        // Create a prepared statement
        $stmt = $conn->prepare($sql);

        // Bind the variables to the prepared statement as parameters
        $stmt->bind_param("s", $username);

        // Execute the prepared statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Check if a user was found
        if ($result->num_rows == 1) {

            // Get the user data
            $user = $result->fetch_assoc();

            // Check if the password matches
            if (password_verify($password, $user['password'])) {

                // Store the user data in the session
                $_SESSION['loggedin'] = true;
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];

                // Redirect the user to the dashboard page
                header('Location: dashboard.php');
                exit;
            } else {
                // Display an error message
                echo 'The password you entered was not valid.';
            }
        } else {
            // Display an error message
            echo 'No user was found with that username.';
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        // Display an error message
        echo 'Please enter your username and password.';
    }
}

// Close the database connection
$conn->close();
?>



<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1 style="text-align: center; font-family: Montserrat; color: black;"> <em> Hello, please login! </em></h1>
        <form action="login.php" method="post">
            <div class="container" style="display: grid;">
                <label for="SN"><b>Username</b></label>
                <input class="user-id" id="UN" aria-describedby="Username" placeholder="Enter Username" required>
                <br>
                <label for="SN"><b>Password</b></label>
                <input type="password" class="pass" id="PW" aria-describedby="Password" placeholder="Enter your password" required>
                <br>
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
                <br>
                <a href="dashboard.html">
                    <button type="submit" value="Login">Login</button>
                </a>    
            </div>
            <div class="container" style="background-color:#f1f1f1">
                <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
        </form>    
    </body>
</html>