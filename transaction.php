<!doctype html>
<head>
<?php
$servername = "localhost";
$username = "root";
$password = "12345";
$db="logindb";

    
$conn = new mysqli($servername, $username, $password,$db);
    
if(isset($_POST["id"]) and isset($_POST["credits"])){
    $acredits=$_POST["credits"];
    // echo $acredits;
    $id=$_POST["id"];
    $sql="select * from users where id='$id'";
    $result=$conn->query($sql);


    if($result->num_rows>0)
    {
        while($row=$result->fetch_assoc())
        {
            $fcredits=$row["credits"];
        }
    }
    $t=$fcredits-$acredits;
    try
    {
        $conn->autocommit(FALSE);
        $conn->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
        $sql="update users set credits='$t' where id='$id'";
        $conn->query($sql);
        $conn->commit();
        $conn->autocommit(TRUE);
        
    }
    catch(Exception $e){
        $conn->rollback();
        $conn->autocommit(TRUE);
        
    }

    $sql="select * from users where id='$id'";
    $result1=$conn->query($sql);


    if($result1->num_rows>0)
            {
                echo "
                <table>
                    <tr>
                        <th>ID             </th>
                        <th>Credits      </th>                    
                    </tr>";
                    
                while($row1=$result1->fetch_assoc()){
                    echo "<tr>
                    <td>".$row1["id"]."                 </td>
                    <td>".$row1["credits"]."               </td>
                    </tr>";
                }
                echo "</table>";
            }
}
$conn->close();
?>
</head>
<body>
    <div>
        <form method="post" action="transaction.php">
            Id :<input type="text" name="id" placeholder="Enter id here">
            Credits :<input type="text" name="credits" placeholder="Enter credits here">
            <input type="submit" name="submit">
        </form>
    </div>
</body>
</html>