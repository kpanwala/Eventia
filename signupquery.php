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

$sql="SELECT * from login2 where username='$user'";
$result=$conn->query($sql);

        if($result->num_rows==0)
        {
            // echo "<script>alert('$cusid');</script>";
            try
            {
                $conn->autocommit(FALSE);
                $conn->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
                    $sql="insert into customer values ('$cusid','$fname','$lname','$city','$dob','$email','',1000,0)";

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
                $conn->commit();
                $conn->autocommit(TRUE);
            }
            catch(Exception $e){
                echo "<script>alert('Not able to register !!');</script>";
                  $conn->rollback();
                  $conn->autocommit(TRUE);
            }

        }
        else{
            echo "<script>alert('Username already registered !! Please try new one...');</script>";
        }
    

    $conn->close();
    session_destroy();
?>