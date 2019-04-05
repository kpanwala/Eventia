<?php

$servername = "localhost";
$username = "root";
$password = "12345";
$db="projectdbms";

    // Create connection
$conn = new mysqli($servername, $username, $password,$db);

if(isset($_SESSION["fname"]))
{   
    $fname=$_SESSION["fname"];
    $lname=$_SESSION["lname"];
    $dob=$_SESSION["dob"];
    $city=$_SESSION["city"];
    $cusid=$_SESSION["cusid"];

    $sql="update customer set first_name='$fname',last_name='$lname',dob='$dob',city='$city' where customer_id='$cusid'";

            if (mysqli_query($conn,$sql))
            {
                echo "<script>alert('KUDOS !!! Account Info updated :)');</script>";    
            }

}
elseif(isset($_SESSION["photo"]))
{

    $sql="select photo from customer where customer_id='$cus_id'";

    $cusid=$_SESSION["cusid"];
    $photo=$_SESSION["photo"];

    $sql="update customer set photo='$photo' where customer_id='$cusid'";

            if (mysqli_query($conn,$sql))
            {
                echo "<script>alert('KUDOS !!! Account Photo updated :)');</script>";    
            }

}
else{
    echo "<script> alert('Please Fill the fields you want to update!!');</script>";
}

            $sql="SELECT * from customer where customer_id='$cusid'";
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
                        <th>Photo           </th>
                    </tr>";
                    
                while($row=$result->fetch_assoc()){
                    echo "<tr>
                    <td>".$row["customer_id"]."                 </td>
                    <td>".$row["first_name"]."              </td>
                    <td>".$row["last_name"]."               </td>
                    <td>".$row["city"]."            </td>
                    <td>".$row["dob"]."         </td>
                    <td>".$row["account_reg_no"]."                      </td>
                    <td>".$row["email"]."               </td>
                    <td>".$row["photo"]."               </td>
                    </tr>";
                }
                echo "</table>";
            }
            else{
                echo "Error adding customer";
            }
   
$conn->close();
?>