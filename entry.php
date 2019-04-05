<html>
    <title>Events entry</title>
    <head>


    </head>


    <body>
        <hr>
        <h1>Events Entry</h1>
        <hr>
        
    </body>
<?php
$servername = "localhost";
$username = "root";
$password = "12345";
$db="projectdbms";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// echo "Connected successfully ";


    //Insert Query of SQL
$stmt =$conn->prepare("INSERT INTO events values (?,?,?,?,?)");
$stmt->bind_param("ss",$event_id,$event_name,$artist,$address,$location_city);



echo "event_id:"
$id= "5";
$name="aakash";
$stmt->execute();
    

$id="6";
$name="hemil";
$stmt->execute();


$stmt->close();
$conn->close();
?>



</html>