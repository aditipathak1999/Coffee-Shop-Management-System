<?php
$conn=mysqli_connect ('localhost','root','','coffee_shop');
$uname=$_POST['username'];
$passw=$_POST['password'];
$check=mysqli_query($conn,"select Username from registration_form where Username='$uname' and Password='$passw'");
if(mysqli_num_rows($check))
{
    echo "<script>alert('Login Successful');</script>";
	header("location:MDI.html");
}
else
{
    $check=mysqli_query($conn,"select Username from registration_form where Username='$uname'");
    if(mysqli_num_rows($check))
    {
        echo "<script>alert('Invalid Password');</script>";
    }
    else
    {
        echo "<script>alert('Invalid Username');</script>";
    }
}
?>