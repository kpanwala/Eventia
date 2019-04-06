<?php
$user=$_SESSION["username"];
$pass=$_SESSION["pass"];
$fname=$_SESSION["fname"];
$lname=$_SESSION["lname"];
$dob=$_SESSION["dob"];
$city=$_SESSION["city"];
$email=$_SESSION["email"];
$cusid=rand(1,100000000000)+rand(1,1000000)+rand(1,1000);


$servername = "localhost";
$username = "root";
$password = "12345";
$db="projectdbms";

$conn = new mysqli($servername, $username, $password,$db);

    $sql="SELECT * from customer where email='$email'";
    $result=$conn->query($sql);

    if($result->num_rows==0)
    {

        $sql="SELECT * from login2 where username='$user'";
        $result=$conn->query($sql);
        if($result->num_rows==0)
        {
            // echo "<script>alert('$cusid');</script>";

            $sql="insert into customer values ('$cusid','$fname','$lname','$city','$dob','$email','',1000)";

            if (mysqli_query($conn,$sql))
            {
                $sql="insert into login2 values ('$pass','$user')";
                if (mysqli_query($conn,$sql))
                {
                    $sql="insert into login1 values ('$cusid','$user')";
                    if (mysqli_query($conn,$sql))
                    {
                        echo "<script>window.open('login.php','_self');";
                        echo "alert('KUDOS !!! Account created :)');</script>";
                    }
                }    
            }

            $sql="SELECT * from customer";
            $result=$conn->query($sql);


            if($result->num_rows>0)
            {
                echo "
                <table class=\"onsub\">
                    <tr>
                        <th>Customer ID             </th>
                        <th>First Name      </th>
                        <th>Last name       </th>
                        <th>City            </th>
                        <th>dob         </th>
                        <th>regno                   </th>
                        <th>email           </th>
                        <th>photo url           </th>
                    </tr>";
                    
                while($row=$result->fetch_assoc()){
                    echo "<tr>
                    <td>".$row["customer_id"]."                 </td>
                    <td>".$row["first_name"]."              </td>
                    <td>".$row["last_name"]."               </td>
                    <td>".$row["city"]."            </td>
                    <td>".$row["dob"]."         </td>                
                    <td>".$row["email"]."               </td>
                    <td>".$row["photo"]."               </td>
                    </tr>";
                }
                echo "</table>";
            }
            else{
                echo "Error adding customer";
            }

        }
        else{
            echo "<script>alert('Username already registered !! Please try new one...');</script>";
        }
    }
    else{
        echo "<script>alert('Email already registered !! Please try new one...');</script>";
    }


    $conn->close();
    session_destroy();
?>