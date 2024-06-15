<?php

$id=$_POST['id'];


$conn=mysqli_connect('localhost','root','','moneyex');
if($conn)
{
    echo "conected";
}else{
    die( "not conected". mysqli_connect_error());
}

$sql="SELECT * FROM user WHERE Id='$id' ";
$r=mysqli_query($conn,$sql);
if(mysqli_num_rows($r)>0)
{
   
    echo "<script> window.open('update.html','_self')</script>";
  
}
else{
    echo "<script>alert('Wrong Enter!...Check once');</script>";
    echo "<script> window.open('forgot.html','_self')</script>";
}

?>