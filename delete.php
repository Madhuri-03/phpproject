<?php
include("form1.php");
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $sql_query="delete from stud where id=$id";
    if(mysqli_query($conn,$sql_query))
    {
        header("Location:http://localhost/disp.php");die;

    }
    else
    {
        echo "error deleting record:" . mysqli_error($conn);
    }

}
else
{
    echo "id parameter is missing";
}
mysqli_close($conn);

?>
  