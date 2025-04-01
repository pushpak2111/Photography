<?php
if(isset($_SESSION['customer']))
{
    $user=$_SESSION['customer'];
    $select2="select * from customer_reg where emailid='$user'";
    $res2=mysqli_query($conn,$select2);
    $row2=mysqli_fetch_array($res2);
    $fname=$row2['fname'];
    $mname=$row2['mname'];
    $lname=$row2['lname'];
   
}
else
{
    header("location:../user/login.php");
}
?>
