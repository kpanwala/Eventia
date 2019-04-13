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
session_start();
$cusid=$_SESSION["cusid"];

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
    .animate{
      animation-name:ltr;
      animation-duration:1s;
      animation-fill-mode: forwards;
      webkit-animation-name:ltr;
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

    .lane{
      height:35vh;
      width:100vw;
      text-align:center;
      display:block;
      margin-top:22vh;
      position:absolute;
    }

    .card1{
      height:20vh;
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
      margin-left:7vw;      
      background-color:white;
    }

    .card2{
      height:20vh;
      cursor:pointer;
      font-size:3vw;
      border-radius:20px;
      position:absolute;
      color:#f64f59;
      width:15vw;
      vertical-align:middle;
      text-align:center;
      margin-left:30vw;
      background-color:white;
      box-shadow:1px 1px 2px 2px white;
      padding-top:7vh;
    }

    #rot{
        -ms-transform: rotate(-40deg); 
        -webkit-transform: rotate(-40deg);
        transform: rotate(-40deg); 
        height:5vh;
        color:white;
        text-align:center;
        display:block;
        font-size:2vw;
        margin-left:-5vw;
        margin-top:1vh;
        position:absolute;
        width:15vw;
        background: linear-gradient(to right, rgb(17, 153, 142), rgb(56, 239, 125));
    }

    .card3{
      height:20vh;
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
      margin-left:53vw;      
      background-color:white;
    }
    .card4{
      height:20vh;
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
      margin-left:75vw;      
      background-color:white;
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
    #price{
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
        height:68vh;
        position:relative;
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
  
   .button {
  background-color: #4CAF50; /* Green */
  border: none;
  border-radius:10px;
  color: white;
  padding: 10px 22px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin-left: 17vw;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #4CAF50;
}

.button1:hover {
  background-color: #4CAF50;
  color: white;
}
</style>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "12345";
    $db="projectdbms";
    
        
    $conn = new mysqli($servername, $username, $password,$db);

    $sql="select tot_events from customer where customer_id='$cusid'";
    $result=$conn->query($sql);
    
    if($result->num_rows>0)
    {
      while($row=$result->fetch_assoc())
      {
        $no=$row["tot_events"];
        if($no>=3){
          $discount=0;
        }
        else{
          $discount=1;
        }
        
      }
    }


$sql="SELECT event_id,location_city,address,artist,event_name,photo,date,time,type,price from events";
$result=$conn->query($sql);


if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
    ?>
        <div class='card'>
        <?php if($no<3)
        {
          ?>
        <div id="rot">10% off</div>
        <?php
        }
        ?>
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
                <br><br>
                <span id="artist">By- <?php echo $row["artist"] ?></span>
                <br><br>
                <span id="type"><?php echo $row["type"].' Event' ?></span>
                <br><br><br>
                <span id="address"><?php echo $row["address"].",".$row["location_city"] ?></span>
                <br><br>
                <?php
                $date = date('jS F, Y', strtotime($row["date"]));
                ?>
                <span id="date"><?php echo $date ." commencing at ".$row["time"] ?></span>
                <br><br>
                <span id="price"><?php echo "Price : ".$row["price"].' Rs' ?></span>
                <br><br>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                  <input type="text" style="display:none;" name="eid" value="<?php echo $row['event_id']?>">
                  <input type="text" style="display:none;" name="price" value="<?php echo $row['price']?>">
                <input type="submit" class="button button1" name="sub" value="buy">
                </form>
            </div>    
        </div>
<?php
    }
}    
else{
    echo "No current Events There";
}

$conn->close();
?>

<?php
$conn = new mysqli($servername, $username, $password,$db);
if(isset($_POST["sub"]))
{
  $price=$_POST["price"];
  $eid=$_POST["eid"];
  
  $sql="SELECT credits from customer where customer_id='$cusid'";
  $result=$conn->query($sql);

  if($result->num_rows>0)
  {
    while($row=$result->fetch_assoc())
    {
      $totalcredits=$row['credits'];
      if($discount==1){
        $price=$price*0.9;
        echo "<script>alert('Congrats you recieved 10% Off ..!');</script>";
      }
      if($totalcredits >= $price)
      {
          $t=$totalcredits - $price;
        try
        {
            $conn->autocommit(FALSE);
            $conn->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
            $sql="update customer set credits='$t' where customer_id='$cusid'";
            $conn->query($sql);            
            $sql="update customer set credits=credits+'$price' where customer_id='82954534552'";
            $conn->query($sql);            
            $sql="INSERT INTO account(customer_id,event_id,tot) VALUES ('$cusid','$eid',1) ON DUPLICATE KEY UPDATE tot=tot+1;";
            $conn->query($sql);
            // $sql="select * from account where customer_id='$cusid' and event_id='$eid'";
            // $result=$conn->query($sql);
            // if($result->num_rows==0)
            // {              
            //     $sql="insert into account values ('$cusid','$eid')";
            //     $conn->query($sql);           
            //     $sql="insert into trans values ('$eid',1)";
            //     $conn->query($sql);            
            // }
            // else{
            //     $sql="update trans set tot=tot+1 where event_id='$eid'";
            //     $conn->query($sql);            
            // }
            $sql="update customer set tot_events=tot_events+1 where customer_id='$cusid'";
            $conn->query($sql);
            $conn->commit();
            $conn->autocommit(TRUE);
            if($discount==0){
            echo "<script>alert('Success !!');</script>";
            }
          }
        catch(Exception $e){
          echo "<script>alert('Not able to book the event !!');</script>";
            $conn->rollback();
            $conn->autocommit(TRUE);
        }
      }
      else{
        echo "<script>alert('Not Enough credits (:');</script>";
      }
    
    }
  }
  
}
?>
<div class="explore" onclick="abc()">
    <h1 id="explore">Sort By</h1>
</div>
<div class="modal">
    <h1 style="color:white; text-align:center;">
      SORT BY-
    </h1>
    <div class="lane">
      <div class="card1" onclick="citywise()">
          City
      </div>
      <div class="card2" onclick="datewise()">
          Date
      </div>
      <div class="card3" onclick="namewise()">
          Name
      </div>
      <div class="card4" onclick="typewise()">
          Type
      </div>
      
    </div>  
    <h1 style="float:center; text-align:center; margin-top:70vh; color:white; cursor:pointer;" onclick="cancel()">close</h1>
<script>
  

function abc(){
    $(".modal").addClass('animate');
    $(".card1").addClass('animate1');
    $(".card2").addClass('animate2');
    $(".card3").addClass('animate3');
    $(".card4").addClass('animate4');
  }

  function cancel(){
    $(".modal").addClass('ranimate');
    $(".modal").removeClass('animate');
    $(".card1").removeClass('animate1');
    $(".card2").removeClass('animate2');
    $(".card3").removeClass('animate3');
    $(".card4").removeClass('animate4');
    setTimeout(function(){
        $(".modal").removeClass('ranimate');
    },1500);
  }

  function datewise(){
    $(".modal").addClass('ranimate');
    $(".modal").removeClass('animate');
    $(".card1").removeClass('animate1');
    $(".card2").removeClass('animate2');
    $(".card3").removeClass('animate3');
    $(".card4").removeClass('animate4');
    setTimeout(function(){
        $(".modal").removeClass('ranimate');
        window.open("autheventlistdate.php","_self");
    },1100);
  }

  function namewise(){
    $(".modal").addClass('ranimate');
    $(".modal").removeClass('animate');
    $(".card1").removeClass('animate1');
    $(".card2").removeClass('animate2');
    $(".card3").removeClass('animate3');
    $(".card4").removeClass('animate4');
    setTimeout(function(){
        $(".modal").removeClass('ranimate');
        window.open("autheventlistname.php","_self");
    },1100);
  }

  function citywise(){
    $(".modal").addClass('ranimate');
    $(".modal").removeClass('animate');
    $(".card1").removeClass('animate1');
    $(".card2").removeClass('animate2');
    $(".card3").removeClass('animate3');
    $(".card4").removeClass('animate4');
    setTimeout(function(){
        $(".modal").removeClass('ranimate');
        window.open("autheventlistcity.php","_self");
    },1100);
  }

  
  function typewise(){
    $(".modal").addClass('ranimate');
    $(".modal").removeClass('animate');
    $(".card1").removeClass('animate1');
    $(".card2").removeClass('animate2');
    $(".card3").removeClass('animate3');
    $(".card4").removeClass('animate4');
    setTimeout(function(){
        $(".modal").removeClass('ranimate');
        window.open("typeselect.php","_self");
    },1100);
  }
</script>
<script src="js/jquery.min.js"></script>
<script src="js/animatedModal.js"></script>
</body>
</html>