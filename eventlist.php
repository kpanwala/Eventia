<!DOCTYPE html>
<title>List Events</title>
<head>

</head>
<?php
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
    

    #name{
        color:white;
        margin-left:20vw;
        font-size:2.5vw;
        display:absolute;
    }
   

    #artist{
        color:white;
        margin-left:23vw;
        font-size:1.8vw;
        display:absolute;
    }
    
    #address{
        color:white;
        margin-left:2vw;
        font-size:1.8vw;
        display:absolute;
    }

    #date{
        color:white;
        margin-left:2vw;
        font-size:1.8vw;
        display:absolute;
    }
    .card:nth-child(odd){
        width:70vw;
        border-radius:30px;
        margin-left:5vw;
        margin-right:5vw;
        margin-top:5vh;
        margin-bottom:2vh;
        padding-top:2vh;
        padding-bottom:2vh;
        padding-left:2vh;
        height:60vh;
        cursor:pointer;

        background: linear-gradient(to left, rgb(253, 200, 48), rgb(243, 115, 53));
    }


    .card:nth-child(even){
        width:80vw;
        border-radius:30px;
        margin-left:15vw;
        margin-right:0vw;
        margin-top:5vh;
        margin-bottom:2vh;
        padding-top:2vh;
        padding-bottom:2vh;
        padding-left:2vh;
        height:60vh;
        cursor:pointer;

        background: linear-gradient(to right, rgb(253, 200, 48), rgb(243, 115, 53));
    }

    img{
        border-radius:50px;
        height:30vh;
        border:2px solid white;
        width:50vh;
        display:inline-block;
        cursor:pointer;
    }
    .pic{
        position:absolute;
        width:10vw;
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
</style>

<?php
$sql="SELECT location_city,address,artist,event_name,photo,date,time from events";
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
                <span id="name">Name: <?php echo $row["event_name"] ?></span>
                <br><br><br>
                <span id="artist">By- <?php echo $row["artist"] ?></span>
                <br><br><br><br><br><br><br>
                <span id="address">Address: <?php echo $row["address"].",".$row["location_city"] ?></span>
                <br><br><br>
<?php
                $date = date('jS F, Y', strtotime($row["date"]));
?>

                <span id="date">Date and Time: <?php echo $date ." commencing at ".$row["time"] ?></span>
                
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

</body>
</html>