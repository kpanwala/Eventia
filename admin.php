<!DOCTYPE html>
<title>
Admin DashBoard
</title>
<head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
</head>
<body>
    <?php   
        session_start();
        $cusid=$_SESSION["cusid"];
    ?>
<style>
    *{
        margin:0px;
        z-index:1000;
        
    }
    body{
        overflow: hidden;
        background-color:rgb(237, 240, 244);
        height:100vh;
        width:100vw;
    }
    .profile{
        top:0;
        z-index:20;
        height:10vh;
        left:0vw;
        position: absolute;
        width:100vw;
        /* background: rgba(238, 184, 9, 0.904); */
        background:white;
    }
    .right{
        position:absolute;
        top:0;
        z-index:-2;
        width:100vw;
        height:100vh;
    }
   
   #whole{
       height:100vh;
       width:100vw;
       
   }
   #small1{
       width:40px;
       height:40px;
       margin-right:6vw;
       display:inline-block;
   }
   
   #small2{
       width:30px;
       margin-right:1vw;
       border:1px solid yellow;
       height:30px;
       display:inline-block;
   }
   .log{
       height:8vh;
       width:30vw;
       margin-top:2vh;       
       z-index:10;
       cursor:pointer;
       position:relative;
       display:inline-block;
       margin-left:85vw; 
       top:0;
    
   }

   .mySlides {display:none;}
   
   #welcome{
        color:rgb(63, 5, 37);
        justify-content:center;
        /* margin-top:-2vh; */
   }
   
   .navbar{
       height:130vh;
       z-index:21;
       position:absolute;
       margin-top:-6vh; 
       width:20vw;
       background:white;
       box-shadow:0px 100px 1px 1px gray;
   }
   .card{
        width:20vw;
        height:30vh;
        border-radius:20px;
        margin-left:5vw;
        margin-top: 10vh;
        display:inline-block;
        cursor: pointer;
        position:relative;
        box-shadow: 0px 2px 2px 2px lightgray;
    }
    .main{
        position:absolute;
        top:10vh;
        left:20vw;
        width:80vw;
        height:90vh;
        z-index:500;
    }
    #a1{
        background: linear-gradient(to right, rgb(255, 126, 95), rgb(254, 180, 123));
        color:white;
        
    }
    #a2{
        color:white;
        background: linear-gradient(to right, rgb(247, 151, 30), rgb(255, 210, 0));
        
    }
    #a3{
        color:white;
        background: linear-gradient(to right, rgb(29, 200, 108), rgb(147, 249, 185));
        
    }
    #a4{
        color:white;
        background: linear-gradient(to right, rgb(6, 190, 182), rgb(72, 177, 191));
        
    }
    h1{
        text-align: center;
        padding-top:10vh;
        font-size:2.5vw;
    }

    li{
        color:black;  
        font-family: 'Times New Roman', Times, serif;
        list-style-type:none;
        text-align: left;
        font-size:2vw;
        padding-top:8vh;
    }

    #curAdmin{
        color:black;  
        display:inline-block;
        vertical-align: middle;
        padding-left:1.5vw;
        font-weight:bold;
        margin-top:-6vh;
        font-family: 'Times New Roman', Times, serif;
        font-size: 1.5vw;
    }
    ul{
        margin-top:0vh;
    }

    a{
        list-style-type: none;
        text-decoration: none;
        text-decoration-color: none;
        color:purple;
        cursor:pointer;
    }
</style>



<script>
$(document).ready(function(){
    $("#a1").click(function(){
        window.open("EventEntry.php","_self");
    });
});

$(document).ready(function(){
    $("#a2").click(function(){
        window.open("firstUpdate.php","_self");
    });
});

$(document).ready(function(){
    $("#a3").click(function(){
        window.open("list.php","_self");
    });
});


$(document).ready(function(){
    $("#a4").click(function(){
        window.open("firstDelete.php","_self");
    });
});

function logout(){
  if(confirm("Do you want to LOG OUT ?")){
    window.open("home.php","_self");
  }
  else{
    //
  } 
}

function opAcc(){
    window.open("adminupdate.php","_self");
}

</script>


<div class="profile">        
        
        <div class="log">
            <img id="small1" src="image/notification.png">
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
                        <img id="small2" src="<?php echo $row["photo"]?>" onclick="logout()" style="border-radius:50%; height:7vh; width:7vh;">
                        <?php
                        }
                        else{
                            ?>
                            <img id="small2" src="image/avtaar.png" onclick="logout()" style="border-radius:50%; height:7vh; width:7vh;">
                            <?php
                        }
                    }
                }
                else{
                    ?>
                    <img id="small2" src="image/avtaar.png" onclick="logout()" style="border-radius:50%; height:7vh; width:7vh;">
                    <?php
                }

                ?>

        </div>
</div>
<div class="navbar">
        <h1 id="welcome">Admin Panel</h1> 
        <ul>
        <?php
                
                $conn = new mysqli($servername, $username, $password,$db);
                                
                $sql="select photo,first_name,last_name from customer where customer_id='$cusid'";

                $result=$conn->query($sql);

                if($result->num_rows==1 )
                {
                    while($row=$result->fetch_assoc())
                    {
                        if($row["photo"]!=null){
                        ?>
                        <li style="padding-bottom:5vh;"><img src="<?php echo $row["photo"]?>" style="border-radius:50%; border:2px solid orange; height:10vh; width:10vh; margin-left:-2vw;"><span id="curAdmin"><?php echo $row["first_name"]." ".$row["last_name"]?></span></li>
                        <?php
                        }
                        else{
                            ?>
                            <li style="padding-bottom:5vh;"><img src="image/avtaar.png" style="border-radius:50%; height:10vh; border:1px solid orange; width:10vh; margin-left:-2vw;"><span id="curAdmin"><?php echo $row["first_name"]." ".$row["last_name"]   ?></span></li>
                            <?php
                        }
                    }
                }
                
                
        ?>
            
            
            <li><a href="#" style="font-size:5vh;">Home</a></li>
            <li><a href="#">FeedBack</a></li>
            <li><a onclick="opAcc()">Account settings</a></li>
        </ul>
</div>


<div class="main">
    <div class="card" id="a1">
        <h1>ADD Events</h1>
        <img src="image\circle.svg" style="margin-top:-16vh; height:30vh; width:30vw;">
    </div>
    <div class="card" id="a2">
        <h1>Update Events</h1>
        <img src="image\circle.svg" style="margin-top:-16vh; height:30vh; width:30vw;">
    </div>
    <div class="card" id="a3">
        <h1>List Users</h1>
        <img src="image\circle.svg" style="margin-top:-16vh; height:30vh; width:30vw;">
    </div>
    <div class="card" id="a4">
        <h1>Remove Events</h1>
        <img src="image\circle.svg" style="margin-top:-16vh; height:30vh; width:30vw;">
    </div>
</div>
</body>
</html>