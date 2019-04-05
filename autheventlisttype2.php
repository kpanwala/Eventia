<!DOCTYPE html>
<title>List Events</title>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/animate.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<?php
$servername = "localhost";
$username = "root";
$password = "12345";
$db="projectdbms";

    
$conn = new mysqli($servername, $username, $password,$db);
    
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
    .modal{
      height:100vh;
      width:100vw;
      position:absolute;
      left:300vw;
      top:0vh;
      z-index:100;
      overflow-y:hidden;
      background-color:#f64f59;
    }
    .modal1{
      height:100vh;
      width:100vw;
      position:absolute;
      left:300vw;
      top:0vh;
      z-index:100;
      overflow-y:hidden;
      background: linear-gradient(to right, rgb(255, 179, 71), rgb(255, 204, 51));
    }
    .animate{
      animation-name:ltr;
      animation-duration:1s;
      animation-fill-mode: forwards;
      webkit-animation-name:ltr;
      webkit-animation-duration:1s;
    }
    .animate1{
      animation-name:ltr;
      animation-duration:1s;
      opacity:0;
      animation-fill-mode: forwards;
      animation-delay:0.75s;
      webkit-animation-name:ltr;
      webkit-animation-delay:0.75s;
      webkit-animation-duration:1s;
    }
    .animate2{
      animation-name:ltr;
      animation-duration:1s;
      opacity:0;
      animation-fill-mode: forwards;
      animation-delay:1s;
      webkit-animation-name:ltr;
      webkit-animation-delay:1s;
      webkit-animation-duration:1s;
    }
    .animate3{
      animation-name:ltr;
      animation-duration:1s;
      opacity:0;
      animation-fill-mode: forwards;
      animation-delay:1.25s;
      webkit-animation-name:ltr1;
      webkit-animation-delay:1.25s;
      webkit-animation-duration:1s;
    }
    .animate4{
      animation-name:ltr;
      animation-duration:1s;
      opacity:0;
      animation-fill-mode: forwards;
      animation-delay:1.5s;
      webkit-animation-name:ltr1;
      webkit-animation-delay:1.5s;
      webkit-animation-duration:1s;
    }

    .ranimate{
      animation-name:ltr1;
      animation-duration:1.5s;
      animation-fill-mode: forwards;
    }
    
    @keyframes ltr {
      0%   {left:100vw; opacity:0;}      
      100% {left:0vw; opacity:1;}
    }

    @webkit-keyframes ltr {
      0%   {left:100vw; opacity:0;}      
      100% {left:0vw; opacity:1;}
    }
    @keyframes ltr1 {
      0%   {left:0vw; opacity:1;}
      /* 90% {left:-100vw; opacity:1;} */
      100% {left:-100vw; opacity:0;}
      101% {left:100vw; opacity:0;} 
    }

    @webkit-keyframes ltr1 {
        0%   {left:0vw; opacity:1;}
      /* 90% {left:-100vw; opacity:1;} */
      100% {left:-100vw; opacity:0;}
      101% {left:100vw; opacity:0;} 
    }
    .main{
      height:100vh;
      width:100vw;
      position:absolute;
      background-color:yellow;
    }

    *{
      margin:0;
      overflow-x:hidden;
    }

    .lane1{
      height:25vh;
      width:100vw;
      text-align:center;
      display:block;
      margin-top:10vh;
      position:absolute;
    }
    
    .lane2{
      height:25vh;
      width:100vw;
      text-align:center;
      display:block;
      margin-top:40vh;
      position:absolute;
    }

    .card1{
      height:15vh;
      padding-top:7vh;
      position:absolute;
      cursor:pointer;
      color:#f64f59;
      width:15vw;
      border-radius:20px;
      box-shadow:1px 1px 2px 2px white;
      font-size:3vw;
      text-align:center;
      vertical-align:middle;
      margin-left:15vw;      
      background-color:white;
    }

    .card2{
      height:15vh;
      cursor:pointer;
      font-size:3vw;
      border-radius:20px;
      position:absolute;
      color:#f64f59;
      width:15vw;
      vertical-align:middle;
      text-align:center;
      margin-left:42.5vw;
      background-color:white;
      box-shadow:1px 1px 2px 2px white;
      padding-top:7vh;
    }

    .card3{
      height:15vh;
      border-radius:20px;
      cursor:pointer;
      font-size:3vw;
      position:absolute;
      color:#f64f59;
      vertical-align:middle;
      padding-top:7vh;
      width:15vw;
      text-align:center;
      box-shadow:1px 1px 2px 2px white;
      margin-left:72vw;      
      background-color:white;
    }
    .card4{
      height:15vh;
      border-radius:20px;
      cursor:pointer;
      font-size:3vw;
      position:absolute;
      color:#f64f59;
      vertical-align:middle;
      padding-top:7vh;
      width:15vw;
      text-align:center;
      box-shadow:1px 1px 2px 2px white;
      margin-left:15vw;      
      background-color:white;
    }
    .card5{
      height:15vh;
      border-radius:20px;
      cursor:pointer;
      font-size:3vw;
      position:absolute;
      color:#f64f59;
      vertical-align:middle;
      padding-top:7vh;
      width:15vw;
      text-align:center;
      box-shadow:1px 1px 2px 2px white;
      margin-left:42.5vw;      
      background-color:white;
    }
    .card6{
      height:15vh;
      border-radius:20px;
      cursor:pointer;
      font-size:3vw;
      position:absolute;
      color:#f64f59;
      vertical-align:middle;
      padding-top:7vh;
      width:15vw;
      text-align:center;
      box-shadow:1px 1px 2px 2px white;
      margin-left:72vw;      
      background-color:white;
    }
    body{
      background:brown;
    }
    #name{
        color:black;
        margin-left:20vw;
        font-size:2.5vw;
        display:absolute;
    }
   

    #artist{
        color:black;
        margin-left:35vw;
        font-size:1.8vw;
        display:absolute;
    }
    #type{
        color:black;
        margin-left:20vw;
        font-size:2vw;
        display:absolute;
    }
    
    #address{
        color:black;
        margin-left:0vw;
        font-size:2vw;
        display:absolute;
    }

    #date{
        color:black;
        margin-left:0vw;
        font-size:2vw;
        display:absolute;
    }
        


    .card{
        width:70vw;
        border-radius:30px;
        margin-left:10vw;
        box-shadow:1px 1px 2px 2px gray;
        margin-top:5vh;
        margin-bottom:2vh;
        padding-top:2vh;
        padding-bottom:2vh;
        padding-left:2vh;
        height:60vh;
        cursor:pointer;
        background: white;
    }
    a{
        text-decoration:none;
        color:brown;   
    }
    img{
        border-radius:50px;
        height:30vh;
        border:2px solid yellow;
        width:50vh;
        display:inline-block;
        cursor:pointer;
    }
    .pic{
        position:absolute;
        width:30vw;
        margin-left:3.5vw;
        margin-top:1.3vh;
        margin-bottom:1.5vh;
        display:inline-block;
    }
    .content{
        margin-left:14vw;
        margin-top:6.5vh;
        position:absolute;
        width:70vw;
        display:inline-block;
    }

    .explore{
       background:white;
       position:fixed;
       opacity:0.9;
       z-index:2;
       float:right;
       height:19vh;
       width:15vw;
       top:82vh;
       left:86vw;
       border-top-left-radius: 60px;
       box-shadow:2px 2px 5px 5px black;
       cursor:pointer;
   }
   #explore{
       font-size:2vw;
       font-family:fantasy;
       margin-top:6vh;
       margin-left:4vw;
       color:brown;
       
   }
   #type{
        color:black;
        margin-left:20vw;
        font-size:2vw;
        display:absolute;
    }
    #err{
        color:white;
        margin:5vw;
        font-size:4vw;
    }
</style>
<div>
   <h1 style="color:white; text-align:center;">Sort by Singing Events</h1>
</div>
    <?php
$sql="SELECT location_city,address,artist,event_name,photo,date,time,type from events where type='Singing'";
$result=$conn->query($sql);


if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
    ?>
        <div class='card'>
            <div class='pic'>
                <img id='photo' src="<?php 
                if($row["photo"]=="")
                {
                    echo "image/eventdef.jpg";
                } 
                else
                {
                    echo $row["photo"];
                } 
                ?>">
            </div>
            <div class="content">
                <span id="name"><?php echo $row["event_name"] ?></span>
                <br><br><br>
                <span id="artist">By- <?php echo $row["artist"] ?></span>
                <br><br><br><br><br>
                <span id="address"><?php echo $row["address"].",".$row["location_city"] ?></span>
                <br><br><br>
                <?php
                $date = date('jS F, Y', strtotime($row["date"]));
                ?>

                <span id="date"><?php echo $date ." commencing at ".$row["time"] ?></span>
                
            </div>    
        </div>
<?php
    }
}    
else{
    echo "<h1 id='err'>No current Events There...!</h1>";
}

$conn->close();
?>
<div class="explore" onclick="abc()">
    <h1 id="explore">Sort By</h1>
</div>
<div class="modal">
    <h1 style="color:white; text-align:center;">
      SORT BY-
    </h1>
    <div class="lane1">
      <div class="card1" onclick="Sports()">
          Sports
      </div>
      <div class="card2" onclick="Singing()">
          Singing
      </div>
      <div class="card3" onclick="Drama()">
          Drama
      </div>
    </div>
    <div class="lane2">
      <div class="card1" onclick="Dancing()">
          Dancing
      </div>
      <div class="card2" onclick="Comedy()">
          Comedy
      </div>
      <div class="card3" onclick="Exhibition()">
          Exhibition
      </div>
      
    </div>  
    <h1 style="float:center; text-align:center; margin-top:70vh; color:white; cursor:pointer;" onclick="cancel()">close</h1>

<script>
function abc(){
    $(".modal").addClass('animate');
    $(".card1").addClass('animate1');
    $(".card2").addClass('animate2');
    $(".card3").addClass('animate3');
    $(".card4").addClass('animate1');
    $(".card5").addClass('animate2');
    $(".card6").addClass('animate3');
  }

  function cancel(){
    $(".modal").addClass('ranimate');
    $(".modal").removeClass('animate');
    $(".card1").removeClass('animate1');
    $(".card2").removeClass('animate2');
    $(".card3").removeClass('animate3');
    $(".card4").removeClass('animate1');
    $(".card5").removeClass('animate2');
    $(".card6").removeClass('animate3');
    setTimeout(function(){
        $(".modal").removeClass('ranimate');
    },1500);
  }

 
  function Sports(){
    $(".modal").addClass('ranimate');
    $(".modal").removeClass('animate');
    $(".card1").removeClass('animate1');
    $(".card2").removeClass('animate2');
    $(".card3").removeClass('animate3');
    $(".card4").removeClass('animate1');
    $(".card5").removeClass('animate2');
    $(".card6").removeClass('animate3');
    setTimeout(function(){
        $(".modal").removeClass('ranimate');
        window.open("autheventlisttype1.php","_self");
    },1100);
  }

  function Singing(){
    $(".modal").addClass('ranimate');
    $(".modal").removeClass('animate');
    $(".card1").removeClass('animate1');
    $(".card2").removeClass('animate2');
    $(".card3").removeClass('animate3');
    $(".card4").removeClass('animate1');
    $(".card5").removeClass('animate2');
    $(".card6").removeClass('animate3');
    setTimeout(function(){
        $(".modal").removeClass('ranimate');
        window.open("autheventlisttype2.php","_self");
    },1100);
  }

  function Drama(){
    $(".modal").addClass('ranimate');
    $(".modal").removeClass('animate');
    $(".card1").removeClass('animate1');
    $(".card2").removeClass('animate2');
    $(".card3").removeClass('animate3');
    $(".card4").removeClass('animate1');
    $(".card5").removeClass('animate2');
    $(".card6").removeClass('animate3');
    setTimeout(function(){
        $(".modal").removeClass('ranimate');
        window.open("autheventlisttype3.php","_self");
    },1100);
  }

  
  function Dancing(){
    $(".modal").addClass('ranimate');
    $(".modal").removeClass('animate');
    $(".card1").removeClass('animate1');
    $(".card2").removeClass('animate2');
    $(".card3").removeClass('animate3');
    $(".card4").removeClass('animate1');
    $(".card5").removeClass('animate2');
    $(".card6").removeClass('animate3');
    setTimeout(function(){
        $(".modal").removeClass('ranimate');
        window.open("autheventlisttype4.php","_self");
    },1100);
  }

  function Comedy(){
    $(".modal").addClass('ranimate');
    $(".modal").removeClass('animate');
    $(".card1").removeClass('animate1');
    $(".card2").removeClass('animate2');
    $(".card3").removeClass('animate3');
    $(".card4").removeClass('animate1');
    $(".card5").removeClass('animate2');
    $(".card6").removeClass('animate3');
    setTimeout(function(){
        $(".modal").removeClass('ranimate');
        window.open("autheventlisttype5.php","_self");
    },1100);
  }

  function Exhibition(){
    $(".modal").addClass('ranimate');
    $(".modal").removeClass('animate');
    $(".card1").removeClass('animate1');
    $(".card2").removeClass('animate2');
    $(".card3").removeClass('animate3');
    $(".card4").removeClass('animate1');
    $(".card5").removeClass('animate2');
    $(".card6").removeClass('animate3');
    setTimeout(function(){
        $(".modal").removeClass('ranimate');
        window.open("autheventlisttype6.php","_self");
    },1100);
  }
</script>
<script src="js/jquery.min.js"></script>
<script src="js/animatedModal.js"></script>
</body>
</html>