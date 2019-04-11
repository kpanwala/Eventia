<?php

$servername = "localhost";
$username = "root";
$password = "12345";
$db="projectdbms";

    // Create connection
$conn = new mysqli($servername, $username, $password,$db);
$cusid=$_SESSION["cusid"];

if(isset($_SESSION["fname"]))
{   
    $fname=$_SESSION["fname"];
    $lname=$_SESSION["lname"];
    $dob=$_SESSION["dob"];
    $city=$_SESSION["city"];
    
   
    $sql="update customer set first_name='$fname',last_name='$lname',dob='$dob',city='$city' where customer_id='$cusid'";

            if (mysqli_query($conn,$sql))
            {
                echo "<script>alert('KUDOS !!! Account Info updated :)');</script>";    
            }
    unset($_SESSION["fname"]);
}
elseif(isset($_SESSION["photo"]))
{

    $sql="select photo from customer where customer_id='$cusid'";

    $cusid=$_SESSION["cusid"];
    $photo=$_SESSION["photo"];

    $sql="update customer set photo='$photo' where customer_id='$cusid'";

            if (mysqli_query($conn,$sql))
            {
                echo "<script>alert('KUDOS !!! Account Photo updated :)');</script>";    
            }
    unset($_SESSION["photo"]);
}
else{
    echo "<script> alert('Please Fill the fields you want to update!!');</script>";
}

$conn->close();
?>