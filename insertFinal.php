<?php   
    $photo =$_SESSION['photo'];
    $name =$_SESSION['name'];
    $id =$_SESSION['id'];
    $address = $_SESSION['address'];
    $artist =$_SESSION['artist'];
    $city =$_SESSION['city'];
    $date=$_SESSION['date'];
    $time=$_SESSION['time'];
    $type=$_SESSION['type'];
    $price=$_SESSION["price"];

$servername = "localhost";
$username = "root";
$password = "12345";
$db="projectdbms";

   
$conn = new mysqli($servername, $username, $password,$db);
     

if(isset($city) or isset($artist) or isset($id) or isset($name) or isset($photo) or isset($type) or isset($price))
{
    
    $query="insert into events values('$id','$name','$artist','$address','$city','$photo','$date','$time','$type','$price')";

    if (mysqli_query($conn,$query))
    {
        echo "<script>alert('INSERTED SUCCESSFULLY');</script>";
    }
    else
    {
        echo "<script>alert('Please try a different Event id !!');</script>";
    }

    $conn->close();
}
?>