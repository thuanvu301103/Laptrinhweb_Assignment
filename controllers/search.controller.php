<?php

$connection = mysqli_connect("localhost", "root", "", "webDB");
 
if($connection === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
if(isset($_REQUEST["term"])){
    if($connection->connect_error){
        die("Connection failed: " . $connection->connect_error);
    }
    if(isset($_REQUEST['term'])){
        $sql = "SELECT * FROM `products` WHERE `productname` LIKE '%" .$_REQUEST['term']. "%' OR `condition` LIKE '%" .$_REQUEST['term']. "%'";
    } else {
        $sql = "SELECT * FROM `products`";
    }
    $result = mysqli_query($connection, $sql);
    $flag = 0;
  
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    if($flag === 5){
                        break;
                    }
                    echo 
                    '
                    <form>
                        <a href="./product_detail?id='.$row['pid'].'">
                        <img src="../assets/images/'.$row["productname"].'.jpeg" width="100" height="100"> 
                        <div style="display:inline-block; vertical-align: top; padding: 20px 0px 0px 0px"> 
                            <div> '. $row["productname"] .' </div>
                            <div> '. $row["condition"] .' </div>
                            <div> '. number_format($row['price'],0) .' đ</div>
                        </div>
                        </a>
                    </form>
                    ';
                    $flag += 1;
                }
            } else{
                echo "<p>No matches found</p>";
            }

}
 
mysqli_close($connection);
?>