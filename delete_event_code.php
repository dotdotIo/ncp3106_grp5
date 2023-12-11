<?php
$con = mysqli_connect("localhost","root","","event");

if(isset($_POST['event_delete_btn']))
{
    $Event_ID = $_POST['delete_Event_ID'];

    $query = "DELETE FROM event_creation WHERE `event_creation`.`Event_ID`= '$Event_ID' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Data Deleted Successfully";
        header("Location: Event_Display.php");
    }
    else
    {
        echo"not deleted";
        $_SESSION['status'] = "Data Not Deleted";
        header("Location: Event_Display.php");
    }
}
?>