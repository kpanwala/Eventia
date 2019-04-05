<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {
    color: #FF0000;
}

#pkerror{
  font-size:4vw;
  color:red;
   font-weight:bold;
}

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
    padding-left:2vw;
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
  background: linear-gradient(to right, rgb(131, 96, 195), rgb(46, 191, 145));
}
h1,h4,form{
  
  color:white;
}
form{
  width:60vw;
  margin-left:20vw;
  margin-right:20vw;
  background-color:black;
}
h1,h4{
  text-align:center;
}
</style>
</head>
<body>  
<?php
$tp=0;
$flag=0;
$nameErr = $idErr = $artistErr = $cityErr= $addressErr =$dateErr=$timeErr= "";
$id=$name=$address=$city=$artist="";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  
    if (empty($_POST["id"])) {
        $idErr = "Id is required";
        $flag=0;
        
    } 
    elseif(strlen(($_POST["id"]))>15){
        $idErr = "Id Length exceeding";
        $flag=0;
    }
    else {
        $id = test_input($_POST["id"]);
        $flag=1;
    }
  if($flag==1)
  {
    
    if(strlen(($_POST["name"]))>50){
        $nameErr = "Id Length exceeding";
        $flag=0;
    }
    elseif(!preg_match("/^[a-zA-Z ]*$/",($_POST["name"]))) {
          $nameErr = "Only letters and white space allowed"; 
          $flag=0;
          
    }
    else{
        $name = test_input($_POST["name"]);
        $tp=1;
    }
  }
   if($flag==1)
   {
     
      if(strlen(($_POST["artist"]))>50){
          $artistErr = "artist's name length exceeding";
          $flag=0;
      }
      else {
        $artist = test_input($_POST["artist"]);
        $tp=1;
      }
    }
    if($flag==1)
    {
      if(strlen(($_POST["address"]))>50){
        $addressErr = "address Length exceeding";
        $flag=0;
      }
      else {
        $address = test_input($_POST["address"]);
        $tp=1;
      }
    }
    if($flag==1)
    {
      if(strlen(($_POST["city"]))>20){
        $cityErr = "city name Length exceeding";
        $flag=0;
      }
      else {
        $city = test_input($_POST["city"]);
        $tp=1;
      }
    }
    if($flag==1)
    {      
        $date =$_POST["date"];
        $_SESSION["date"]=$date;
        $flag=1;
                
      }
    if($flag==1)
    {                  
        $time =$_POST["time"];
        $_SESSION["time"]=$time;
        $flag=1;
    }
    if($flag==1)
    {     
      
          $allowed=['png','jpeg','jpg'];
          $fl_name=$_FILES["image"]["name"];
          $abc=explode('.',$fl_name);
          $fl_extn=strtolower(end($abc));
          $fl_temp=$_FILES["image"]["tmp_name"];
        
          if(in_array($fl_extn,$allowed)){
              img($fl_extn,$fl_temp);
          }
    }
}

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    function img($fl_extn,$fl_temp)
    {
        $file_path='eventimages/'.substr(md5(time()),0,10).'.'.$fl_extn;
        move_uploaded_file($fl_temp,$file_path);
        $photo=$file_path;
    }
      if($flag==1)
      {
        
                $servername = "localhost";
                $username = "root";
                $password = "12345";
                $db="projectdbms";

        
                    $conn=mysqli_connect($servername, $username, $password,$db);
                    $sql = "select * from events where event_id='$id'";
                    
                    $result=$conn->query($sql);
                    if($result->num_rows>0)
                    {
                      
                      while($row=$result->fetch_assoc()){
                        
                        if($id==""){
                          $id=$row["event_id"];
                        }
                        if($name==""){    
                          $name=$row["event_name"];
                        }
                        if($artist==""){
                          $artist=$row["artist"];
                        }
                        if($address==""){
                          $address=$row["address"];
                        }
                        if($city==""){
                          $city=$row["location_city"];
                        }
                        if($date==""){
                          $date=$row["date"];
                        }
                        if($time==""){
                          $time=$row["time"];
                        }
                        
                    }
                      if($tp==1)
                      {
                            
                            if(isset($photo))
                            {
                              echo "<script>alert('Photo value is set');</script>";
                              $sql = "UPDATE events set event_name='$name', location_city='$city', artist='$artist', address='$address',photo='$photo',date='$date',time='$time' where event_id='$id'";
                            }
                            else{
                              $sql = "UPDATE events set event_name='$name', location_city='$city', artist='$artist', address='$address',date='$date',time='$time' where event_id='$id'";
                            }

                            if (mysqli_connect_errno())
                            {
                            echo "Load the page properly: " . mysqli_connect_error();
                            }
                            
                            if ($conn->query($sql) === TRUE) {
                                echo "<script>alert('Record updated successfully');</script>";
                            } else {
                                echo "<script>alert('Error updating record: " . $conn->error."')</script>";
                            }
                            $conn->close();
                     }
                  }
                  else{
                    echo "<script>alert('Event id didnt matched any record:')</script>";
                  }
      }
      else{
        
      }
            
            ?>
            <h1>Events Update Form</h1>
            <h4>Enter the id of the event to be updated</h4>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
            Event Id: <input type="text" name="id">
            <span class="error">* <?php echo $idErr;?></span>
            <br><br>  
            Event Name: <input type="text" name="name">
            <span class="error"> <?php echo $nameErr;?></span>
            <br><br>
            Artist Name or Group Name: <input type="text" name="artist">
            <span class="error"> <?php echo $artistErr;?></span>
            <br><br>
            Address: <textarea name="address" rows="3" cols="25"></textarea>
            <span class="error"> <?php echo $addressErr;?></span>
            <br><br>
            Location City:<input type="text" name="city">
            <span class="error"> <?php echo $cityErr;?></span>
            <br><br>
            <br><br>
            Date:<input type="date" name="date">
            <span class="error"> <?php echo $dateErr;?></span>
            <br><br>
            Time:<input type="time" name="time">
            <span class="error"> <?php echo $timeErr;?></span>            
            <br><br>
            <span><b>Select image to upload: </b></span><br>
            <input type="file" name="image"><br><br>
            <input type="submit" name="submit" value="Submit">  
            </form>

</body>

</html>