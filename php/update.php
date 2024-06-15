<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $conn=mysqli_connect('localhost','root','','moneyex');
 
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

   
    $id = $_POST["id"];
    $new_password = $_POST["pass"];

    if (empty($id) || empty($new_password)) {
        echo "ID and password are required.";
    } else {
      
        $sql = "UPDATE user SET password = '$new_password' WHERE id = '$id'";
        
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('updated succefull');</script>";
            echo "<script> window.open('login.html','_self')</script>";
        } else {
            echo "<script>alert('Check once...!');</script>";
    echo "<script> window.open('forgot.html','_self')</script>";
            echo "Error updating password: " . $conn->error;
        }
    }

  
    $conn->close();
}
?>