<?php
$servername = "localhost";
$username = "root";
$password = "12345";
$db="myDB";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully ";


    //Insert Query of SQL
$stmt =$conn->prepare("INSERT INTO students values (?,?)");
$stmt->bind_param("ss",$id,$name);

$id="5";
$name="aakash";
$stmt->execute();
    

$id="6";
$name="hemil";
$stmt->execute();


$stmt->close();
$conn->close();
?>
