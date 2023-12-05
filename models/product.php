<?php

class Products
{
    private $connection;
    private function connect()
    {
        include ('../views/config.php');
        $this->connection = new mysqli($servername, $username, $password, $dbname);
    }

    public function getProductList() {
        $this->connect();
        $sql_cmd = "SELECT * FROM products;";
        $result = $this->connection->query($sql_cmd);

        if ($result->num_rows == 0) {
            echo '<script type="text/javascript">
                alert("Can\'t get list of product!");
            </script>';
            return;
        } else {
            $this->connection->close();
            return $result;
        }
    }

    public function getDetail($id) {
        $this->connect();
        $sql_cmd = "SELECT * FROM products WHERE pid = '".$id."';";
        $result = $this->connection->query($sql_cmd);
        
        if ($result->num_rows == 0) {
            echo '<script type="text/javascript">
                alert("Can\'t get detail of product!");
            </script>';
            return;
        } else {
            $this->connection->close();
            return $result;
        }
    }

    public function getAmount($id) {
        $this->connect();
        $sql_cmd = "SELECT * FROM belongto WHERE productid = '".$id."';";
        $result = $this->connection->query($sql_cmd);
        
        if ($result->num_rows == 0) {
            echo '<script type="text/javascript">
                alert("Can\'t get detail of product!");
            </script>';
            return;
        } else {
            $this->connection->close();
            return $result;
        }
    }
    public function AddProduct($pname, $price, $treatment, $des, $quantity, $filename, $tmpname){

        $this->connect();

        // $phama_sql = "SELECT 1 FROM `pharmacy` WHERE 'name' = '$phname'";

        // $phama = mysqli_query($this->connection, $phama_sql);
        
        // if (mysqli_num_rows($presult) > 0) { 
        //     $prow = $presult->fetch_assoc();
        //     $phid = $prow['phid'];
        // } else {
        //     echo "Can not find the pharmacy". $phname;
        //     exit;
        // }

        $phid = "21e1a6590ec74";

        $product_sql = "SELECT * FROM `products` WHERE `productname` = '$pname'";

        $presult = mysqli_query($this->connection, $product_sql);
        // nếu tồn tại trong products thì check belongto
        if (mysqli_num_rows($presult) > 0) {
            $row = $presult->fetch_assoc();
            $productID = $row['pid'];
            $belong_sql = "SELECT * FROM `belongto` WHERE `pharmacyid` = '$phid' AND `productid` = '$productID'";
            
            $bresult = mysqli_query($this->connection, $belong_sql);
            // Nếu có belong to 1 pharmacy nào đó thì update
            if (mysqli_num_rows($bresult) > 0) {      
                $brow = $bresult->fetch_assoc();
                $newQuantity = $brow['quantity'] + $quantity;
                $updateQ = "UPDATE `belongto` SET `quantity` =  '$newQuantity' WHERE  `productid` = '$productID' AND `pharmacyid` = '$phid'";
                mysqli_query($this->connection, $updateQ);
                $this->connection->close();
            } else { // Không belong to pharmacy nào thì add mới 
                $insert = $this->connection->query("INSERT into `belongto` (`pharmacyid`, `productid`, `quantity`) VALUES ('$phid', '$productID', '$quantity')");
                $this->connection->close();
            } 
        } else { // Không tồn tại trong product thì add mới xong add vào belong to
            $statusMsg = '';
            $backlink = ' <a href="../index.php/home">Go back</a>';
            // File upload path
            $targetDir = "../assets/images/";
            $fileName = basename($filename);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            $pid = uniqid();
            // $iprice = (int)$price;
            
            // Allow certain file formats
            $allowTypes = array('jpg','png','jpeg','gif','pdf');
            if (!file_exists($targetFilePath)) {
                if(in_array($fileType, $allowTypes)){
                        // Upload file to server
                    if(move_uploaded_file($tmpname ,$targetFilePath)){
                        // Insert image file name into database
                        $insert = $this->connection->query("INSERT into `products` (`pid`, `productname`, `condition`, `price`, `description`) VALUES ('$pid', '$pname', '$treatment', '$price', '$des')");
                        $binsert = $this->connection->query("INSERT into `belongto` (`pharmacyid`, `productid`, `quantity`) VALUES ('$phid', '$pid', '$quantity')");
                        if($insert){
                            $statusMsg = "The file <b>".$fileName. "</b> has been uploaded successfully." . $backlink;
                        }else{
                            $statusMsg = "File upload failed, please try again." . $backlink;
                        } 
                    }else{
                        $statusMsg = "Sorry, there was an error uploading your file." . $backlink;
                    }
                }else{
                    $statusMsg = "Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload." . $backlink;
                }
            }else{
                $statusMsg = "The file <b>".$fileName. "</b> is already exist." . $backlink;
            }
            $url = "../index.php/product_detail?id=$pid";
            header("Location:" . $url);
            exit();
        }
    }
}

?>