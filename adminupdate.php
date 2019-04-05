<!DOCTYPE html>
    <title>Profile Info</title>
    <head>
<?php
$cusid=$user=$pass="";
    session_start();
    $cusid=$_SESSION["cusid"];
    $user=$_SESSION["user"];
    $pass=$_SESSION["pass"];
?>    
    <style>
     
    span{
        display:block;
        font-size:2vw;
        color:white;
    }

    input[type="text"],input[type="date"]  {
    outline: none;
    display:inline-block;
    height:5vh;
    width:30vw;
    border: none;
    margin-top:3vh;
    margin-bottom:3vh;
    border-radius:5px;
    background-color:white;
    }
    .input100:focus {
    padding-left: 2vw;
    width:28vw;
    }

    .input100:focus + .focus-input100::after {
    /* left: 23px; */
    color: #d41872;
    }

    .input100:focus + .focus-input100::before {
    width: 100%;
    }

    .has-val.input100 + .focus-input100::after {
    /* left: 23px; */
    color: #d41872;
    }

    .has-val.input100 + .focus-input100::before {
    width: 100%;
    }

    .has-val.input100 {
    padding-left: 60px;
    }

    input[type='submit'] {
        background: linear-gradient(to right, rgb(242, 153, 74), rgb(242, 201, 76));
        padding-left:10px;
        color:white;
        border: none;
        margin-top:1vh;
        width:10vw;
        border-radius:5px;
        outline: none;
        display:block;
        cursor:pointer;
        height:5vh;
    }
    input[type='submit']:hover
    {
        border:1px solid white;

    }
    textarea {
    outline: none;
    border: none;
    }

    textarea:focus, input:focus {
    border-color: transparent !important;
    }

    input:focus::-webkit-input-placeholder { color:transparent; }
    input:focus:-moz-placeholder { color:transparent; }
    input:focus::-moz-placeholder { color:transparent; }
    input:focus:-ms-input-placeholder { color:transparent; }

    textarea:focus::-webkit-input-placeholder { color:transparent; }
    textarea:focus:-moz-placeholder { color:transparent; }
    textarea:focus::-moz-placeholder { color:transparent; }
    textarea:focus:-ms-input-placeholder { color:transparent; }

    input::-webkit-input-placeholder { color: lightgray;}
    input:-moz-placeholder { color: lightgray;}
    input::-moz-placeholder { color: lightgray;}
    input:-ms-input-placeholder { color: lightgray;}

    textarea::-webkit-input-placeholder { color: #555555;}
    textarea:-moz-placeholder { color: #555555;}
    textarea::-moz-placeholder { color: #555555;}
    textarea:-ms-input-placeholder { color: #555555;}

    body{
        margin:0;
        width:100vw;
    }
    .img{
        height:70px;
        width:70px;
        border-radius:50%;
        margin-left:auto;
        margin-right:auto;
        margin-top:2vh;
    }
    .top{
        height:13vh;
        position:absolute;
        width:100vw;
        box-shadow:2px 5px 5px gray;
    }
    .bottom{
        margin-top:14vh;
        position:absolute;
        height:100vh;
        width:100vw;
        background: linear-gradient(to right, rgb(17, 153, 142), rgb(56, 239, 125));
    }
   
    .cent{
        margin-left:8vw;      
        position:absolute;  
    }
    .cent1{
        margin-left:55vw;        
        position:absolute;
    }
    
    </style>
    </head>
    <body>
    <?php
        
        
        $flag=0;

        if(isset($_POST["fname"]) or isset($_POST["lname"]) or isset($_POST["dob"]) or isset($_POST["city"]))
        {
            if($_POST["fname"]!="")
            {
                $_SESSION["fname"]=test_input($_POST["fname"]);
                $flag=1;
            }
            if($_POST["lname"]!="")
            {
                $_SESSION["lname"]=test_input($_POST["lname"]);
                $flag=1;
            }
            if($_POST["dob"]!="")
            {
                $_SESSION["dob"]=test_input($_POST["dob"]);
                $flag=1;
            }
            if($_POST["city"]!="")
            {
                $_SESSION["city"]=test_input($_POST["city"]);
                $flag=1;
            }
            if($flag==1)
            {
                include "cusupdatequery.php"; 
            }
            else{
                echo "<script>alert('Please Enter the field properly which needs to be update!!');</script>";
            }
        }  
        if(isset($_FILES["image"])){
            if(empty($_FILES["image"]["name"])){
               echo"<script>alert('You need to insert an image...');</script>"; 
            }
            else{
                $allowed=['png','jpeg','jpg'];
                $fl_name=$_FILES["image"]["name"];
                $abc=explode('.',$fl_name);
                $fl_extn=strtolower(end($abc));
                $fl_temp=$_FILES["image"]["tmp_name"];

                if(in_array($fl_extn,$allowed)){
                    img($fl_extn,$fl_temp);
                }
                else{
                    echo "The Extension that you choose isnt a image!!";
                }
            }
            
        }

        
        function img($fl_extn,$fl_temp){
            $file_path='userimages/'.substr(md5(time()),0,10).'.'.$fl_extn;
            move_uploaded_file($fl_temp,$file_path);
            $_SESSION["photo"]=$file_path;
            include "cusupdatequery.php"; 
        
        }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }


    ?>
        <div class="top">
            <?php
                // $user=$_SESSION["user"];
                // $pass=$_SESSION["pass"];
                // $cusid=$_SESSION["cusid"];

                $servername = "localhost";
                $username = "root";
                $password = "12345";
                $db="projectdbms";
                
            ?>
            
            <div class="img">
                <?php
                
                $conn = new mysqli($servername, $username, $password,$db);
                                
                $sql="select * from customer where customer_id='$cusid'";

                $result=$conn->query($sql);

                if($result->num_rows==1 )
                {
                    while($row=$result->fetch_assoc())
                    {
                        
                        $_SESSION["lname"]=$row["last_name"];
                        $_SESSION["dob"]=$row["dob"];
                        $_SESSION["city"]=$row["city"];
                        $_SESSION["fname"]=$row["first_name"];
                        if($row["photo"]!=null){
                        ?>
                        <img src="<?php echo $row["photo"]?>" style="border-radius:50%; border:2px solid orange; height:10vh; width:10vh;">
                        <?php
                        }
                        else{
                            ?>
                            <img src="image/avtaar.png" style="border-radius:50%; height:10vh; width:10vh;">
                            <?php
                        }
                    }
                }
                else{
                    ?>
                    <img src="image/avtaar.png" style="border-radius:50%; height:10vh; width:10vh;">
                    <?php
                }

                ?>
            </div>          
        </div>
        <div class="bottom">
            <div class="cent">
                <h1 style="color:white; padding-left:7vw;">Profile update</h1>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <span><b>First Name: </b></span><input class="input100" type="text" name="fname" placeholder="    First Name">
                    <span><b>Last Name: </b></span><input type="text" class="input100" name="lname" placeholder="    Last Name">
                    <span><b>City: </b></span><input type="text" class="input100" name="city" placeholder="    City">
                    <span><b>Date Of Birth: </b></span><input type="date" class="input100" name="dob" placeholder="    Date Of Birth">
                    <br>
                    <input type="submit" value="Update">
                </form>
                                
            </div>
            <div class="cent1">
                <h1 style="color:white; padding-left:7vw; margin-top:4vh;">Update profile pic</h1>
                <form method="post" action="" enctype="multipart/form-data">
                    <span><b>Select image to upload: </b></span><br>
                    <input type="file" name="image"><br><br>
                    <input type="submit" value="Upload">
                </form>
            </div>
        </div>

    </body>
</html>