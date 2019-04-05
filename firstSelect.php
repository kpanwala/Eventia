<!DOCTYPE HTML>  
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
    *{
        margin:0;
    }
    .onsub{
        position:absolute;
        margin-left:30vw;
        margin-top:40vh;
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 65vw;
    }

    td,th{
        border: 1px solid #ddd;
        padding: 8px;
    }

    tr:nth-child(even)
    {
        background-color: #f2f2f2;
    }

    tr:hover 
    {
        background-color: #ddd;
    }

    th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }

.error {
    color: #FF0000;
}
form:not(:first-child){
    margin-top:5vh;
    display:none;
}
form:first-child{
    margin-top:5vh;
    display:block;
}
.see{
    display:block;
}
li{
    list-style-type:none;
    margin-top:5vh;
    margin-left:1vw;
    cursor:pointer;
    color:white;
    font-size:2vw;
}
.fform{
    margin-left:35vw;
    top:0;
    position:absolute;
}

#pkerror{
  font-size:4vw;
  color:red;
   font-weight:bold;
}
.left{
    position:absolute;
    height:100vh;
    width:25vw;
    background-color:rgba(4, 0, 14, 0.8);
}
</style>
</head>
<body>  
<?php

$id=$name=$artist=$address=$city="";

 $servername = "localhost";
 $username = "root";
 $password = "12345";
 $db="projectdbms";

$conn=mysqli_connect($servername, $username, $password,$db);


$tp=0;
$nameErr = $idErr = $artistErr = $cityErr= $addressErr = "";
$id=$name=$address=$city=$artist="";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  
    if (empty($_POST["id"])) {
        $idErr = "";
        
    } 
    elseif(strlen(($_POST["id"]))>15){
        $idErr = "Id Length exceeding";
        
    }
    else {
        $id = test_input($_POST["id"]);
        $sql = "select * from events where event_id='$id'";
        $tp=1;
    }
  
    if (empty($_POST["name"])) {
        $nameErr = "";
    }
    elseif(strlen(($_POST["name"]))>50){
        $nameErr = "Id Length exceeding";
    }
    elseif(!preg_match("/^[a-zA-Z ]*$/",($_POST["name"]))) {
          $nameErr = "Only letters and white space allowed"; 
    }
    else{
        $name = test_input($_POST["name"]);
        $sql = "select * from events where event_name='$name'";
        $tp=1;
    }
    
      if (empty($_POST["artist"])) {
        $artistErr = "";
       
      }
      elseif(strlen(($_POST["artist"]))>50){
          $artistErr = "artist's name length exceeding";
         
      }
      else {
        $artist = test_input($_POST["artist"]);
        $sql = "select * from events where artist='$artist'";
        $tp=1;
      }

      if (empty($_POST["city"])) {
        $cityErr = "";
        
      } 
      elseif(strlen(($_POST["city"]))>20){
        $cityErr = "city name Length exceeding";
        
      }
      else {
        $city = test_input($_POST["city"]);
        $sql = "select * from events where location_city='$city'";
        $tp=1;
      }


      $result=$conn->query($sql);
            if($result->num_rows>0){                
                            echo "
                            <table class='onsub'>
                                <tr>
                                    <th>Event ID</th>
                                    <th>Event Name</th>
                                    <th>Artist name</th>
                                    <th>Address</th>
                                    <th>Location City</th>
                                </tr>";
                                $flag=1;
                            while($row=$result->fetch_assoc()){
                                echo "<tr>
                                <td>".$row["event_id"]."</td>
                                <td>".$row["event_name"]."</td>
                                <td>".$row["artist"]."</td>
                                <td>".$row["address"]."</td>
                                <td>".$row["location_city"]."</td>
                                </tr>";
                            }
                            echo "</table>";
                        }
                        else{
                            echo "<script>alert('Wrong data !! Please enter proper details to see the records ..');</script>";
                        }
                        $conn->close();
}

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    

            if($tp==1)
            {
                $servername = "localhost";
                $username = "root";
                $password = "12345";
                $db="projectdbms";

        
                    $conn=mysqli_connect($servername, $username, $password,$db);

                    if (mysqli_connect_errno())
                    {
                    echo "Load the page properly: " . mysqli_connect_error();
                    }

                    if ($conn->query($sql) === TRUE) {
                        
                                            
                        $sql="SELECT * from events;";
                        $result=$conn->query($sql);



                        if($result->num_rows<$_SESSION["norows"]){
                            
                            echo "
                            <table class='onsub'>
                                <tr>
                                    <th>Event ID</th>
                                    <th>Event Name</th>
                                    <th>Artist name</th>
                                    <th>Address</th>
                                    <th>Location City</th>
                                </tr>";
                                $flag=1;
                            while($row=$result->fetch_assoc()){
                                echo "<tr>
                                <td>".$row["event_id"]."</td>
                                <td>".$row["event_name"]."</td>
                                <td>".$row["artist"]."</td>
                                <td>".$row["address"]."</td>
                                <td>".$row["location_city"]."</td>
                                </tr>";
                            }
                            echo "</table>";
                        }
                        else{
                            echo "<script>alert('Wrong data !! Please enter proper details to see the records ..');</script>";
                        }
                    } 
                    $conn->close();
            }
            
            ?>
            <div class="left">
                <ul>
                    <li onclick="l1()">SEE by Event Id</li>
                    <li onclick="l2()">SEE by Event Name</li>
                    <li onclick="l3()">SEE by Artist name</li>
                    <li onclick="l4()">SEE by address</li>
                    <li onclick="l5()">SEE by location city name</li>
                </ul>
            </div>
            <div class="fform">
            <h1>Event List Form</h1>
            <br><br>
            
            <form id="id" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <h2>Specify the Id of the event whose record you want to see</h2>
            <br>
            <br>
            Event Id: <input type="text" name="id">
            <span class="error"> <?php echo $idErr;?></span>
            <br><br>
            <input type="submit" name="submit" value="Submit">  
            </form>

            <form id="name" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <h2>Specify the Name of the event whose record you want to see</h2>
            <br>
            <br>
            Event Name: <input type="text" name="name">
            <span class="error"> <?php echo $nameErr;?></span>
            <br><br>
            <input type="submit" name="submit" value="Submit">  
            </form>

            <form id="artist" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <h2>Specify the Artist Name of the event whose record you want to see</h2>
            <br>
            <br>
            Artist Name or Group Name: <input type="text" name="artist">
            <span class="error"> <?php echo $artistErr;?></span>
            <br><br>
            <input type="submit" name="submit" value="Submit">  
            </form>

            <form id="address" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <h2>Specify the address of the event whose record you want to see</h2>
            <br><br>
            Address: <textarea name="address" rows="5" cols="10"></textarea>
            <span class="error"><?php echo $addressErr;?></span>
            <br><br>
            <input type="submit" name="submit" value="Submit">  
            </form>

            <form id="city" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <h2>Specify the location city of the event whose record you want to see</h2>
            <br>
            <br>
            Location City:<input type="text" name="city">
            <br>
            <br>
            <span class="error"> <?php echo $cityErr;?></span>
            <br><br>
            <input type="submit" name="submit" value="Submit">  
            </form>
        </div>

        
<script>
    
    var form=document.getElementsByTagName("FORM");
    
    form[0].style.display="block";

    function l1(){
        form[0].style.display="block";
        form[1].style.display="none";
        form[2].style.display="none";
        form[3].style.display="none";
        form[4].style.display="none";
    }

    function l2(){
        form[0].style.display="none";
        form[1].style.display="block";
        form[2].style.display="none";
        form[3].style.display="none";
        form[4].style.display="none";
    }

    function l3(){
        form[0].style.display="none";
        form[1].style.display="none";
        form[2].style.display="block";
        form[3].style.display="none";
        form[4].style.display="none";
    }

    function l4(){
        form[0].style.display="none";
        form[1].style.display="none";
        form[2].style.display="none";
        form[3].style.display="block";
        form[4].style.display="none";
    }

    function l5(){
        form[0].style.display="none";
        form[1].style.display="none";
        form[2].style.display="none";
        form[3].style.display="none";
        form[4].style.display="block";
        
    }

</script>
</body>

</html>