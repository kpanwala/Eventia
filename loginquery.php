<?php

$user=$_SESSION["user"];
$pass=$_SESSION["pass"];



$servername = "localhost";
$username = "root";
$password = "12345";
$db="projectdbms";

$conn = new mysqli($servername, $username, $password,$db);

$sql="select customer_id from login2 natural join login1 where username='$user' and password='$pass'";
    $result=$conn->query($sql);
    if($result->num_rows==1){
        while($row=$result->fetch_assoc()){        
            
            $_SESSION["cusid"]=$row["customer_id"];
            $ta=$row["customer_id"];
            if($_SESSION["cusid"]=="82954534552"){
                echo "<script>";
                echo "window.open('admin.php','_self');";
                echo "</script>";
            }
            else{
                echo "<script>";
                echo "window.open('auth.php','_self');";
                echo "</script>";        
            }
        }
    }
    else{
        echo '<script language="javascript">';
        
        echo "alert('Incorrect username or password')";
        echo '</script>'; 
    }


?>