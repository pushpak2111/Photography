<?php
if(isset($_SESSION['admin']))
{
    $user=$_SESSION['admin'];
    $select2="select * from adminlogin where emailid='$user'";
    $res2=mysqli_query($conn,$select2);
    $row2=mysqli_fetch_array($res2);
    $com_code = $row2['emailid'];
}
else
{
    header("location:../user/login.php");
}
?>
