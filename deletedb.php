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
$sql = "DELETE FROM students WHERE id=2";
#$sql = "INSERT INTO students values('2','jenish')";
#sql= "SELECT * from students order by id ASC";
#$sql= "DELETE from students WHERE id=2";
#$sql= "SELECT * from students order by id ASC";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
