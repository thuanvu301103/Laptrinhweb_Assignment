<?php

class Transaction
{

    private $connection;
    private function connect()
    {
        include('../views/config.php');
        $this->connection = new mysqli($servername, $username, $password, $dbname);
    }

    public function makeTransaction($userID, $productID, $quantity, $overall, $date)
    {
        $this->connect();

        $transactionID = uniqid("trans_");

        $query = "INSERT INTO transactions 
            (tid, userid, pid, quantity, overallprice, boughtdate) VALUES 
            ('$transactionID', '$userID','$productID', '$quantity', '$overall', '$date')";

        mysqli_query($this->connection, $query);
        $this->connection->close();
    }

    public function listTransaction($userID){
        $this->connect();

        $query = "SELECT p.productname, quantity, overallprice, boughtdate FROM `transactions` 
        JOIN products p ON transactions.pid = p.pid
        WHERE `userid` = '$userID'";

        $result = mysqli_query($this->connection, $query);
        
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
}
