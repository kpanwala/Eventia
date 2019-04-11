<!DOCTYPE html>
    <title>Profile Info</title>
    <head>
<?php
    session_start();
    $cusid=$_SESSION["cusid"];
    $user=$_SESSION["user"];
    $pass=$_SESSION["pass"];
    
?>
    
    <style>
     
    span{
        display:block;
        font-size:2vw;
        color:black;
    }

    input[type="text"],input[type="date"]  {
    outline: none;
    display:inline-block;
    height:5vh;
    width:30vw;
    color:black;
    border: 1px solid green;
    margin-top:3vh;
    margin-bottom:3vh;
    border-radius:5px;
    
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
        color:black;
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
        border:1px solid yellow;
    }
    textarea {
    outline: none;
    border: none;
    }

    textarea:focus, input:focus {
    border-color: yellow !important;
    }

    input:focus::-webkit-input-placeholder { color:transparent; }
    input:focus:-moz-placeholder { color:transparent; }
    input:focus::-moz-placeholder { color:transparent; }
    input:focus:-ms-input-placeholder { color:transparent; }

    textarea:focus::-webkit-input-placeholder { color:transparent; }
    textarea:focus:-moz-placeholder { color:transparent; }
    textarea:focus::-moz-placeholder { color:transparent; }
    textarea:focus:-ms-input-placeholder { color:transparent; }

    input::-webkit-input-placeholder { color: black;}
    input:-moz-placeholder { color: black;}
    input::-moz-placeholder { color: black;}
    input:-ms-input-placeholder { color: black;}

    textarea::-webkit-input-placeholder { color: #555555;}
    textarea:-moz-placeholder { color: #555555;}
    textarea::-moz-placeholder { color: #555555;}
    textarea:-ms-input-placeholder { color: #555555;}

    body{
        margin:0;
        width:100vw;
        overflow-x:hidden;
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
        height:14vh;
        position:absolute;
        width:100vw;
        background:white;
        box-shadow:2px 5px 5px 5px lightgray;
    }
    .bottom{
        margin-top:15vh;
        position:relative;
        height:140vh;
        position:absolute;
        place-items: center;    
        width:100vw;
        background: linear-gradient(to right, rgb(253, 200, 48), rgb(243, 115, 53));
        
    }
    .con{
        background: white;
        color: black;
        padding:20px;
        background:#f1ffe0;
    }
    .cent>.con{
        padding:45px;
        padding-bottom:55px;
    }
    .cent{
        margin-left:8vw;      
        /* background: linear-gradient(to right, red, purple); */
        background: linear-gradient(to right, rgb(0, 176, 155), rgb(150, 201, 61));
        margin-top:5vh;
        margin-bottom:5vh;
        width:40vw;
        position:absolute;
        padding:1vh;
        
    }
    
    .cent1{   
        width:35vw;
        margin-left:55vw;
        padding:1vh; 
        /* background: linear-gradient(to right, rgb(255, 65, 108), rgb(255, 75, 43)); */
        background: linear-gradient(to right, rgb(0, 176, 155), rgb(150, 201, 61));
        margin-top:5vh;
        margin-bottom:5vh;
        position:absolute;
    }
    .cent2{   
        width:35vw;
        margin-left:55vw;
        padding:1vh; 
        /* background: linear-gradient(to right, rgb(255, 65, 108), rgb(255, 75, 43)); */
        background: linear-gradient(to right, rgb(0, 176, 155), rgb(150, 201, 61));
        margin-top:50vh;
        margin-bottom:10vh;
        position:relative;
    }
    
    </style>
    </head>
    <body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "12345";
        $db="projectdbms";
                
        
        $conn = new mysqli($servername, $username, $password,$db);
        
        if(isset($_POST["fname"]) or isset($_POST["lname"]) or isset($_POST["dob"]) or isset($_POST["city"]))
        {
            $sql="select last_name,dob,city,first_name from customer where customer_id='$cusid'";

                $result=$conn->query($sql);

                if($result->num_rows==1 )
                {
                    while($row=$result->fetch_assoc())
                    {
                        $fname=$row["first_name"];
                        $lname=$row["last_name"];
                        $dob=$row["dob"];
                        $city=$row["city"];
                    }
                }
                if(test_input($_POST["fname"])!=""){
                    $fname=test_input($_POST["fname"]);
                }
                if(test_input($_POST["lname"])!=""){
                    $lname=test_input($_POST["lname"]);
                }
                if(test_input($_POST["dob"])!=""){
                    $dob=test_input($_POST["dob"]);
                }
                if(test_input($_POST["city"])!=""){
                    $city=test_input($_POST["city"]);
                }
              
               $_SESSION["fname"]=$fname;
               $_SESSION["lname"]=$lname;
               $_SESSION["dob"]=$dob;
               $_SESSION["city"]=$city;

                include "cusupdatequery.php"; 
        }  
        if(isset($_FILES["image"])){
            if(empty($_FILES["image"]["name"])){
               echo"You need to insert an image"; 
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
        if(isset($_POST["nuser"]) and isset($_POST["npass"]))
        {
                $nuser=test_input($_POST["nuser"]);
                $tp=1;
                $npass=test_input($_POST["npass"]);
                $sql="select * from login2";
                $result=$conn->query($sql);

                while($row=$result->fetch_assoc())
                {
                    if($row["username"]==$nuser){
                        $tp=0;
                    }
                }


                if($tp==0)
                {
                    echo "<script>alert('Please select a different username...!');</script>";
                }
                else
                {
                    $sql="select username from login1 where customer_id='$cusid'";
                    $result=$conn->query($sql);
                    while($row=$result->fetch_assoc())
                    {
                        $ccc=$row["username"];
                    }
                    if($nuser==""){
                        $nuser=$ccc;
                    }

                    $sql="select password from login2 where username='$ccc'";
                    $result=$conn->query($sql);
                    while($row=$result->fetch_assoc())
                    {
                        $ddd=$row["password"];
                        $npass=$ddd;
                    }

                    if(test_input($_POST["npass"])!=""){
                        $npass=test_input($_POST["npass"]);
                    }
                        $sql="update login1 set username='$nuser' where customer_id='$cusid'";
                        if($conn->query($sql)){
                            $sql="update login2 set username='$nuser',password='$npass' where username='$ccc'";
                            if($conn->query($sql))
                            {
                                echo "<script>alert('Account details updated...!');</script>";   
                            }
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
                $user=$_SESSION["user"];
                $pass=$_SESSION["pass"];
                $cusid=$_SESSION["cusid"];

                
            ?>
            
            <div class="img">
                <?php
                
                $conn = new mysqli($servername, $username, $password,$db);
                                
                $sql="select photo from customer where customer_id='$cusid'";

                $result=$conn->query($sql);

                if($result->num_rows==1 )
                {
                    while($row=$result->fetch_assoc())
                    {
                        if($row["photo"]!=null){
                        ?>
                        <img src="<?php echo $row["photo"]?>" style="border-radius:50%; border:1px solid white; height:10vh; width:10vh;">
                        <?php
                        }
                        else{
                            ?>
                            <img src="image/avtaar.png" style="border-radius:50%; border:1px solid white; height:10vh; width:10vh;">
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
        <div class="back">
        <div class="bottom">
            <div class="cent">
            <div class="con">
                <h1 style="color:black; padding-left:4vw;">Personal Info update</h1><br>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <span><b>First Name: </b></span><input class="input100" type="text" name="fname" placeholder="    First Name">
                    <span><b>Last Name: </b></span><input type="text" class="input100" name="lname" placeholder="    Last Name">
                    <span><b>City: </b></span><input type="text" class="input100" name="city" placeholder="    City">
                    <span><b>Date Of Birth: </b></span><input type="date" class="input100" name="dob" placeholder="    Date Of Birth">
                    <br>
                    <input type="submit" value="Update">
                </form>
                </div>                    
            </div>
            <div class="cent1">
                <div class="con">
                    <h1 style="color:black; padding-left:2vw;">Update profile pic</h1>
                    <form method="post" action="" enctype="multipart/form-data">
                        <span><b>Select image to upload: </b></span><br>
                        <input type="file" name="image"><br><br>
                        <input type="submit" value="Upload">
                    </form>
                </div>
            </div>
            <div class="cent2">
                <div class="con">
                <h1 style="color:black; padding-left:4vw;">Account update</h1>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <span><b>User Name: </b></span><input class="input100" type="text" name="nuser" placeholder="    User name">
                    <span><b>Password: </b></span><input type="text" class="input100" name="npass" placeholder="    Password">        
                    <br>
                    <input type="submit" value="Update">
                </div>
            </div>

        </div>
    </div>

    </body>
</html>