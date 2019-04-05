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

$servername = "localhost";
$username = "root";
$password = "12345";
$db="projectdbms";

   
$conn = new mysqli($servername, $username, $password,$db);
     

if(isset($city) or isset($artist) or isset($id) or isset($name) or isset($photo) or isset($type))
{
    
    $query="insert into events values('$id','$name','$artist','$address','$city','$photo','$date','$time','$type')";

    if (mysqli_query($conn,$query))
    {
        echo "<script>alert('INSERTED SUCCESSFULLY');</script>";
    }
    else
    {
        echo "<script>alert('Please try a different Event id !!');</script>";
    }



    $sql="SELECT * from events";
    $result=$conn->query($sql);



    if($result->num_rows>0){
        echo "
        <table class=\"onsub\">
            <tr>
                <th>Event ID</th>
                <th>Event Name</th>
                <th>Type</th>
                <th>Artist name</th>
                <th>Address</th>
                <th>Location City</th>
                <th>Photo</th>
                <th>Date</th>
                <th>Time</th>
            </tr>";
            $flag=1;
        while($row=$result->fetch_assoc()){
            echo "<tr>
            <td>".$row["event_id"]."</td>
            <td>".$row["event_name"]."</td>
            <td>".$row["type"]."</td>
            <td>".$row["artist"]."</td>
            <td>".$row["address"]."</td>
            <td>".$row["location_city"]."</td>
            <td>".$row["photo"]."</td>
            <td>".$row["date"]."</td>
            <td>".$row["time"]."</td>
            </tr>";
        }
        echo "</table>";
    }
    else{
        echo "0 results";
    }


    $conn->close();
}
?>