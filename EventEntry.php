<!DOCTYPE HTML>  
<title>Event Entry</title>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php
session_start();
$cusid=$_SESSION["cusid"];
?>
<style>
.error {
  color:orange;
  }

#pkerror{
  font-size:4vw;
  color:orange;
   font-weight:bold;
}

.cent{
    margin-left:8vw;      
    position:absolute;        
}
.cent1{
    margin-left:55vw;        
    position:absolute;
}
form{
  display:grid;
  
}

body{
  background: linear-gradient(to right, rgb(17, 153, 142), rgb(56, 239, 125));
  color:white;
  place-items: center;
}

span{
        display:block;
        font-size:2vw;
        color:white;
    }

    input[type="text"],input[type="date"],select {
    outline: none;
    display:inline-block;
    height:4vh;
    width:30vw;
    border: none;
    margin-top:0vh;
    margin-bottom:0vh;
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
        margin-bottom:2vh;
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
</style>
<script>
    $(document).ready(function(){
      $("#submit").click(function(){
        <?php $flag=1?>
      });
    });

</script>
</head>
<body>  



<?php
  
        $nameErr = $idErr = $artistErr = $cityErr= $addressErr = $timeErr=$dateErr=$typeErr="";
        $name = $id = $address = $artist = $city = "";
       
      $flag=0;
      if(isset($_POST['submit']))
      {
        
          if(empty($_POST["id"])) {
                $idErr = "Id is required";
                $flag=0;
            } 
            elseif(strlen(($_POST["id"]))>15){
                $idErr = "Id Length exceeding";
                $flag=0;
            }
            else{
                $id = test_input($_POST["id"]);
                $_SESSION["id"]=$id;
                $flag=1;
            }
      
            if($flag==1)
            {
              if(empty($_POST["name"])) {
                  $nameErr = "Name is required";
                  $flag=0;
              }
              elseif(strlen(($_POST["name"]))>50){
                  $nameErr = "Id Length exceeding";
                  $flag=0;
              }
              elseif(!preg_match("/^[a-zA-Z ]*$/",($_POST["name"]))) {
                  $nameErr = "Only letters and white space allowed"; 
                  $flag=0;
              }
              else{
                $name = test_input($_POST["name"]);
                $_SESSION["name"]=$name;
                $flag=1;
              }
            }
            if($flag==1)
            {
              
              if(empty($_POST["type"])) {
                  $nameErr = "Type is required";
                  $flag=0;
              }      
              else{
                $type = test_input($_POST["type"]);
                echo "<script>alert($type)</script>;";
                $_SESSION["type"]=$type;
                $flag=1;
              }
            }

            if($flag==1)
            {
              if (empty($_POST["artist"])) {
                    $artistErr = "Address name or group name is required";
                    $flag=0;
              }
              elseif(strlen(($_POST["artist"]))>50){
                  $artistErr = "artist's name length exceeding";
                  $flag=0;
              }
              else{
                $artist = test_input($_POST["artist"]);
                $_SESSION["artist"]=$artist;
                $flag=1;
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
                  $_SESSION["address"]=$address;
                  $flag=1;
              }
            }
            if($flag==1)
            {
              if (empty($_POST["city"])) {
                $cityErr = "City is required";
                $flag=0;
              } 
              elseif(strlen(($_POST["city"]))>20){
                $cityErr = "city name Length exceeding";
                $flag=0;
              }
              else {
                $city = test_input($_POST["city"]);
                $_SESSION["city"]=$city;
                $flag=1;
              } 
            }

            if($flag==1)
            {
              if (empty($_POST["date"])) {
                $dateErr = "Event Date is required";
                $flag=0;
              } 
              else {
                $date =$_POST["date"];
                $_SESSION["date"]=$date;
                $flag=1;
              }  
            }
            
            if($flag==1)
            {
              if (empty($_POST["time"])) {
                $timeErr = "Event Time is required";
                $flag=0;
              } 
              else {
                $time =$_POST["time"];
                $_SESSION["time"]=$time;
                $flag=1;
              }  
            }
            if($flag==1)
            {
              if(empty($_FILES["image"]["name"]))
              {
                  echo"<script>alert('You need to insert an image')</script>"; 
              }
              else
              {
                $allowed=['png','jpeg','jpg'];
                $fl_name=$_FILES["image"]["name"];
                $abc=explode('.',$fl_name);
                $fl_extn=strtolower(end($abc));
                $fl_temp=$_FILES["image"]["tmp_name"];
          
                if(in_array($fl_extn,$allowed)){
                    img($fl_extn,$fl_temp);
                    $flag=1;
                }
                else{
                    echo "<script>alert('The Extension that you choose isnt a image!!')</script>";
                }
              }
            }

            if($flag==1){
              include 'insertFinal.php';
            }
            else{
              echo "<script>alert('Enter details properly!!')</script>";
            }
      }

      
    
    function img($fl_extn,$fl_temp)
    {
        $file_path='eventimages/'.substr(md5(time()),0,10).'.'.$fl_extn;
        move_uploaded_file($fl_temp,$file_path);
        $_SESSION["photo"]=$file_path;
        
    }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    ?>
    
 <div class="cent">   
 <h1 style="color:white; padding-left:7vw; margin-top:4vh;"><b>Events Entry Form</b></h1>
<p><span class="error">* required field</span></p>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
  Event Id: <input type="text" name="id">
  <span class="error">* <?php echo $idErr;?></span>
  <br>
  Event Name: <input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br>
  Event Type:
  <select name="type">
    <option value="Sports">Sports</option>
    <option value="Exhibition">Exhibition</option>
    <option value="Comedy">Stand-Up-Comedy</option>
    <option value="Singing">Singing Event</option>
    <option value="Dancing">Dance Show</option>
    <option value="Drama">Drama</option>
  </select>
  <span class="error">* <?php echo $typeErr;?></span>
  <br>
  Artist Name or Group Name: <input type="text" name="artist">
  <span class="error">* <?php echo $artistErr;?></span>
  <br>
  Address: <textarea name="address" rows="5" cols="50"></textarea>
  <span class="error"><?php echo $addressErr;?></span>
  <br>
  Location City:<input type="text" name="city">
  <span class="error">* <?php echo $cityErr;?></span>
  <br>
  Date:<input type="date" name="date">
  <span class="error">* <?php echo $dateErr;?></span>
  <br>
  Time:<input type="time" name="time">
  <span class="error">* <?php echo $timeErr;?></span>
  <br>
  <span><b>Select image to upload: </b></span><br>
  <input type="file" name="image"><br><br>

  <input type="submit" id="submit" name="submit" value="Submit">  
</form>

</body>
</html>
