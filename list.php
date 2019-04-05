<!DOCTYPE html>
<title>List Users</title>
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
        height:20vh;
        cursor:pointer;
    }

    #fname{
        color:white;
        margin-left:1vw;
        font-size:2.5vw;
        display:absolute;
    }
    #lname{
        color:white;
        margin-left:0.5vw;
        font-size:2.5vw;
        display:absolute;
    }

    #city{
        color:white;
        margin-left:4vw;
        font-size:1.8vw;
        display:absolute;
    }
    
    #dob{
        color:white;
        margin-left:4vw;
        font-size:1.8vw;
        display:absolute;
    }

    #email{
        color:white;
        margin-left:4vw;
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
        border-radius:50%;
        height:17vh;
        border:2px solid white;
        width:17vh;
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
$sql="SELECT first_name,last_name,city,dob,email,photo from customer";
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
                <span id="fname"><?php echo $row["first_name"] ?></span>
                <span id="lname"><?php echo $row["last_name"] ?></span>
                <span id="city"><?php echo $row["city"] ?></span>
                <span id="dob">
                <?php 
                echo $row["dob"];
                ?></span>
                <span id="email"><?php echo $row["email"] ?></span>
            </div>    
        </div>
<?php
    }
}    
else{
    echo "No customer There";
}

$conn->close();
?>

</body>
</html>