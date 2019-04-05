<!DOCTYPE html>
<title>
WebPage
</title>
<head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>

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
   }
   li{
       color:white;
       cursor:pointer;
       font-size:3.5vw;
       margin-left:3vw;
       margin-top:10vh;
       font-family: 'Times New Roman', Times, serif;
   }
   #whole{
       height:100vh;
       width:100vw;
       
   }
   #small{
       width:50px;
       height:40px;
   }
   li:first-child{
    margin-top:14vh;
    margin-bottom:15vh;
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

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
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
</style>



<script>
    
var myIndex = 0;
$(document).ready(function(){
    
    carousel();
});

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


function login(){
    window.open("login.php","_self");
}


function exp(){
  window.open("eventlist.php","_self");
}


</script>


<div class="navbar">
    <ul>
            <li>Eventia.</li>
            <li>Home</li>
            
            <li>About us</li>        
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
    <img id="small" onclick="login()" src="image/adduser.png">
</div>
<div class="explore" onclick="exp()">
    <h1 id="explore">Explore</h1>
</div>
</body>
</html>