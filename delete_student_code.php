<?php
$con = mysqli_connect("localhost","root","","event");

if(isset($_POST['stud_delete_btn']))
{
    $Student_Num = $_POST['delete_Student_Num'];

    $query = "DELETE FROM student_reg WHERE `student_reg`.`Student_Num`= '$Student_Num' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Data Deleted Successfully";
        echo "$Student_Num"; 
        header("Location: Student_reg_display.php");
    }
    else
    {
        $_SESSION['status'] = "Data Not Deleted";
        header("Location: delete_student.php");
    }
}
?>