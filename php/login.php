<?php

$id=$_POST['id'];

$password=$_POST['pass']; 

$conn=mysqli_connect('localhost','root','','moneyex');
if($conn)
{
    echo "conected";
}else{
    die( "not conected". mysqli_connect_error());
}

$sql="SELECT * FROM user WHERE Id='$id' and password='$password'";
$r=mysqli_query($conn,$sql);
if(mysqli_num_rows($r)>0)
{
    echo"<script>alert('Successfully login');</script>";
    echo "<script> window.open('section.html','_self')</script>";
}
else{
    echo "<script>alert('Wrong Enter!...Check once');</script>";
    echo "<script> window.open('login.html','_self')</script>";
}

?>