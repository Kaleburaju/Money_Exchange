<?php
$username=$_POST['username'];
$id=$_POST['id'];
$email=$_POST['email'];
$password=$_POST['pass'];
$phone=$_POST['phone'];
$college=$_POST['college_name'];
$conn=mysqli_connect('localhost','root','','moneyex');
if($conn)
{
    echo "conected";
}else{
    die( "not conected". mysqli_connect_error());
}
 $sql="INSERT INTO user(username,Id,email,password,phone,college) VALUES('$username','$id','$email','$password','$phone','$college')";
$r=mysqli_query($conn,$sql);
if($r)
{
    echo"<script>alert('Successfully register');</script>";
    echo "<script> window.open('login.html','_self')</script>";
}
else{

    echo "<script> alert('Registration unsuccessful!');</script>";
    echo "<script> window.open('signup.html','_self')</script>";
}
?>