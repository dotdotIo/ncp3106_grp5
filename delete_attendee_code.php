<?php
$con = mysqli_connect("localhost","root","","event");

if(isset($_POST['att_delete_btn']))
{
    $Student_Num = $_POST['delete_Att_Num'];

    $query = "DELETE FROM `attendee_reg` WHERE `attendee_reg`.`Student_Num`= '$Student_Num' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Data Deleted Successfully";
        header("Location: Attendee_Reg_Display.php");
    }
    else
    {
        echo"not deleted";
        $_SESSION['status'] = "Data Not Deleted";
        header("Location: Attendee_Reg_Display.php");
    }
}
?>