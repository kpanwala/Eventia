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
      left:0vw;
      top:0vh;
      z-index:100;
      overflow-y:hidden;
      background: linear-gradient(to right, rgb(255, 179, 71), rgb(255, 204, 51));
    }
    
   
    .ranimate{
      animation-name:ltr1;
      animation-duration:1.5s;
      animation-fill-mode: forwards;
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
      color:#ffcc33;
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
      color:#ffcc33;
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
      color:#ffcc33;
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
      color:#ffcc33;
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
      color:#ffcc33;
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
      color:#ffcc33;
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
</style>

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

 

  function Sports(){
    
    setTimeout(function(){
        
        window.open("autheventlisttype1.php","_self");
    },900);
  }

  function Singing(){
    
    setTimeout(function(){
        
        window.open("autheventlisttype2.php","_self");
    },900);
  }

  function Drama(){
   
    setTimeout(function(){
        
        window.open("autheventlisttype3.php","_self");
    },900);
  }

  
  function Dancing(){
    
    setTimeout(function(){
        
        window.open("autheventlisttype4.php","_self");
    },900);
  }

  function Comedy(){
   
    setTimeout(function(){
       
        window.open("autheventlisttype5.php","_self");
    },900);
  }

  function Exhibition(){
    
    setTimeout(function(){
        
        window.open("autheventlisttype6.php","_self");
    },900);
  }
</script>
<script src="js/jquery.min.js"></script>
<script src="js/animatedModal.js"></script>
</body>
</html>