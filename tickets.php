<!DOCTYPE html>
<title>List Users</title>
<head>

</head>
<?php
session_start();
$cusid=$_SESSION["cusid"];
// echo "<script>alert($cusid)</script>";
$servername = "localhost";
$username = "root";
$password = "12345";
$db="projectdbms";

    
$conn = new mysqli($servername, $username, $password,$db);
    
?>
<style>
    *{
        margin:0;
    }
    .onsub{
        position:absolute;
        text-align:center;
        margin-left:17vw;
        margin-top:30vh;
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

    .card{
        width:90vw;
        border-radius:30px;
        margin-left:5vw;
        margin-right:5vw;
        margin-top:2vh;
        margin-bottom:2vh;
        padding-top:2vh;
        padding-bottom:2vh;
        padding-left:2vh;
        height:40vh;
        cursor:pointer;
    }

    #name{
        color:white;
        margin-left:1vw;
        font-size:2.5vw;
        display:absolute;
    }

    #address{
        color:white;
        margin-left:1vw;
        font-size:1.8vw;
        display:absolute;
    }
    
    #date{
        color:white;
        margin-left:1vw;
        font-size:1.8vw;
        display:absolute;
    }
    #price{
        color:white;
        margin-left:1vw;
        font-size:1.8vw;
        display:absolute;
    }
    .card:nth-child(even){
        background: linear-gradient(to left, rgb(253, 200, 48), rgb(243, 115, 53));
    }


    .card:nth-child(odd){
        background: linear-gradient(to right, rgb(253, 200, 48), rgb(243, 115, 53));
    }

    img{
        border-radius:5vw;
        height:35vh;
        border:2px solid white;
        width:30vw;
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
        margin-left:38vw;
        margin-top:4.5vh;
        position:absolute;
        width:70vw;
        display:block;
    }
</style>
<div style="background: linear-gradient(to right, rgb(255, 65, 108), rgb(255, 75, 43)); height:10vh;">
<h1 style="color:white; padding-left:10vw; padding-top:2vh;">Registered Events</h1>
</div>
<?php
$sql="SELECT * from account NATURAL join events where customer_id='$cusid'";
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
                    echo "image/avtaar.png";
                } 
                else
                {
                    echo $row["photo"];
                } 
                ?>">
            </div>
            <div class="content">
                <h2 id="name"><?php echo $row["event_name"] ?></h2>
                <br>
                <span id="address"><?php echo '<b>Location:</b> '.$row["address"].','.$row["location_city"] ?></span>
                <br><br>
                <h3 id="date">
                <?php 
                echo 'Commencing at: '.$row["time"].' , '.date('jS F, Y', strtotime($row["date"]));
                ?></h3>
                <br>
                <h5 id="price"><?php echo 'Bought At: '.$row["price"].' Rs' ?></h5>
            </div>    
        </div>
<?php
    }
}    
else{
    echo "<img style='height:70vh; width:50vw; margin-left:20vw; margin-top:5vh;' src='image/null.jpg'>";
}

$conn->close();
?>

</body>
</html>