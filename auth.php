<!DOCTYPE html>
<title>
Home
</title>
<head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
<?php

  session_start();

  $cusid=$_SESSION["cusid"];
  $user=$_SESSION["user"];
  $pass=$_SESSION["pass"];
  
?>
<style>
    *{
        margin:0px;
    }
    body{
        overflow: hidden;
        font-family: Arial, Helvetica, sans-serif;
    }
    .navbar{
        top:0;
        z-index:200;
        height:100vh;
        float:left;
        width:25vw;
        background: rgba(4, 0, 14, 0.8);
    }
    .right{
        position:absolute;
        top:0;
        z-index:-2;
        width:100vw;
        height:100vh;
    }
   ul{
       display:block;
       list-style-type: none;
       margin-top:13vh;
   }
   li{
       color:white;
       cursor:pointer;
       font-size:2.5vw;
       margin-left:5vw;
       margin-top:7vh;
       font-family: 'Times New Roman', Times, serif;
   }
   #whole{
       height:100vh;
       width:100vw;
       
   }
   #small{
       width:8vh;
       height:8vh;
       border-radius:50%;
       border:1px solid white;
   }
   li:first-child{
    margin-top:0vh;
    margin-bottom:10vh;
    margin-left:0.5vw;
    font-size:5vw;
    font-family:cursive;
    cursor:pointer;
   }
   .explore{
       background:white;
       z-index:2;
       float:right;
       height:19vh;
       width:15vw;
       top:83vh;
       left:86vw;
       position:absolute;
       border-top-left-radius: 60px;
       cursor:pointer;
   }
   #explore{
       font-size:2vw;
       font-family:fantasy;
       margin-top:6vh;
       margin-left:4vw;
       color:brown;
       
   }

   .log{
       height:8vh;
       width:5vw;
       margin-top:2vh;
       margin-right:1vw;
       z-index:10;
       cursor:pointer;
       /* background-color: white; */
       border-radius:10%;
       top:0;
       float:right;
   }

   .mySlides {display:none;}
   

   input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}

a{
    color:white;
       cursor:pointer;
       font-size:3vw;
       margin-left:-3vw;
       font-family: 'Times New Roman', Times, serif;
       list-style-type:none;
       text-decoration:none;
}
</style>



<script>
    
var myIndex = 0;
$(document).ready(function(){
    
    carousel();
})

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
//   x[myIndex-1].style.display = "block";
  $(x[myIndex-1]).fadeIn();  
  setTimeout(carousel, 3000); // Change image every 2 seconds
}


function logout(){
  if(confirm("Do you want to LOG OUT ?")){
    window.open("home.php","_self");
  }
  else{
    //
  } 
}


function exp(){
  window.open("autheventlist.php","_self");
}

function pro(){
  window.open("profileinfo.php","_self");
}

function list(){
  window.open("tickets.php","_self");
}

</script>


<div class="navbar">
    <ul>
            <li>Eventia.</li>
            <li><a href="#">Home</a></li>
            <li><a onclick="list()">List Tickets</a></li>
            <li ><a onclick="pro()">Change Profile</a></li> 
            <li><a href="#">About us<a href="#"></li>        
    </ul>
</div>
<div class="right">
    <img id="whole" class="mySlides" src="image/arijit1.jpg">
    <img id="whole" class="mySlides" src="image/sample.jpg">
    <img id="whole" class="mySlides" src="image/exhibition.jpeg">
    <img id="whole" class="mySlides" src="image/cricketstadium.jpg">
    <img id="whole" class="mySlides" src="image/football.jpg">
    <img id="whole" class="mySlides" src="image/marsh.jpg">
</div>
<div class="log">



<?php
               $servername = "localhost";
               $username = "root";
               $password = "12345";
               $db="projectdbms";

                $conn = new mysqli($servername, $username, $password,$db);
                                
                $sql="select photo from customer where customer_id='$cusid'";

                $result=$conn->query($sql);

                if($result->num_rows==1 )
                {
                    while($row=$result->fetch_assoc())
                    {
                        if($row["photo"]!=null){
                        ?>
                        <img src="<?php echo $row["photo"]?>" onclick="logout()" title="Log Out" id="small">
                        <?php
                        }
                        else{
                            ?>
                            <img src="image/addeduser.png" onclick="logout()" title="Log Out" style="width:8vh; height:8vh; border-radius:10px; ">
                            <?php
                        }
                    }
                }
                else{
                    ?>
                    <img src="image/addeduser.png" onclick="logout()" title="Log Out" id="small">
                    <?php
                }

                ?>
</div>
<div class="explore" onclick="exp()">
    <h1 id="explore">Explore</h1>
</div>
</body>
</html>