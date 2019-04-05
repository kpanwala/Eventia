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

$sql="SELECT * from students ORDER BY id ASC;";
$result=$conn->query($sql);

if($result->num_rows>0){
    echo "
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>";
    while($row=$result->fetch_assoc()){
        echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td></tr>";
    }
    echo "</table>";
}
else{
    echo "0 results";
}
$conn->close();
?>
