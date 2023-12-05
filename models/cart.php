<?php

class Cart
{

    private $connection;
    private function connect()
    {
        include('../views/config.php');
        $this->connection = new mysqli($servername, $username, $password, $dbname);
    }

    public function listCart($userID)
    {
        $this->connect();

        $sql_cmd = "SELECT p.pid ,p.productname, p.price, quantity FROM `incart` 
        JOIN products p ON incart.productid = p.pid
        WHERE `userid` = '$userID'";

        $result = mysqli_query($this->connection, $sql_cmd);

        if (mysqli_num_rows($result) == 0) {
            // echo '<script type="text/javascript">
            //     alert("Can\'t get list1!");
            // </script>';
            return;
        } else {
            $this->connection->close();
            return $result;
        }
    }

    public function removeFromCart($userID, $pID)
    {
        $this->connect();

        $remove = "DELETE FROM `incart` WHERE `productid` = '$pID' AND `userid` = '$userID'";
        mysqli_query($this->connection, $remove);

        return true;
    }

    public function emptyCart($userID)
    {
        $this->connect();

        $remove = "DELETE FROM `incart` WHERE `userid` = '$userID'";
        mysqli_query($this->connection, $remove);

        return true;
    }

    public function minusToCart($userID, $pID, $quantity)
    {
        $this->connect();

        $product = "SELECT * FROM `incart` WHERE `productid` = '$pID' AND `userid` = '$userID'";

        $uCresult = mysqli_query($this->connection, $product);

        if (mysqli_num_rows($uCresult) > 0) {

            $row = $uCresult->fetch_assoc();
            $newQuantity = $row['quantity'] - $quantity;

            if ($newQuantity == 0) {
                $this->removeFromCart($userID, $pID);
            } else {
                $updateQ = "UPDATE `incart` SET `quantity` =  '$newQuantity' WHERE  `productid` = '$pID' AND `userid` = '$userID'";
                mysqli_query($this->connection, $updateQ);
            }

            echo '<div> Updated successful </div>';
            $this->connection->close();

            return true;
        }
    }

    public function addToCart($userID, $pID, $quantity, $date)
    {
        $this->connect();


        $phid = 'NULL';
        // if (isset($_POST['pharmacyid'])){
        //     $phid = $_POST['pharmacyid'];
        // }

        $product = "SELECT * FROM `incart` WHERE `productid` = '$pID' AND `userid` = '$userID'";

        $uCresult = mysqli_query($this->connection, $product);



        if (mysqli_num_rows($uCresult) > 0) {

            $row = $uCresult->fetch_assoc();
            $newQuantity = $row['quantity'] + $quantity;
            $updateQ = "UPDATE `incart` SET `quantity` =  '$newQuantity' WHERE  `productid` = '$pID' AND `userid` = '$userID'";
            mysqli_query($this->connection, $updateQ);

            echo '<div> Updated successful </div>';
            $this->connection->close();

            return true;
        } else {
            $query = "INSERT INTO incart 
            (userid, productid, quantity, date, pharmacyid) VALUES 
            ('$userID','$pID', '$quantity', '$date', $phid)";

            mysqli_query($this->connection, $query);

            echo '<div> Successful add new product </div>';
            $this->connection->close();

            return true;
        }
    }
}
