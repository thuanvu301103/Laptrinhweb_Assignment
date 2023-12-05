<?php 
include_once ('../views/config.php');

$conn = new mysqli($servername, $username, $password);

$db = "CREATE DATABASE IF NOT EXISTS webDB";
if($conn->query($db) === TRUE){
    echo "db created!";
} else{ 
    echo "ERROR: ". $conn->error;
}

$connection = new mysqli($servername, $username, $password, $dbname);

if($connection->connect_error){
    die("Connection failed: " . $connection->connect_error);
}
$connection->query($db);

$usertable = "CREATE TABLE IF NOT EXISTS `users` (
    `uid` VARCHAR(40) NOT NULL,
    `username` VARCHAR(256) NOT NULL UNIQUE,
    `password` VARCHAR(256) NOT NULL,
    `firstname` VARCHAR(50),
    `lastname` VARCHAR(50),
    `phone` VARCHAR(15),
    `role` VARCHAR(20),
    PRIMARY KEY (`uid`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;";

$transactiontable = "CREATE TABLE IF NOT EXISTS `transactions`(
    `tid` VARCHAR(40) NOT NULL,
    `userid` VARCHAR(40) NOT NULL,
    `pid` VARCHAR(40) NOT NULL,
    `quantity` INT UNSIGNED NOT NULL,
    `overallprice` FLOAT NOT NULL,
    `boughtdate` datetime NOT NULL,
    PRIMARY KEY (`tid`, `userid`),
    FOREIGN KEY (`pid`) REFERENCES `products` (`pid`),
    CONSTRAINT `FK_UserTransactions` FOREIGN KEY (`userid`) REFERENCES `users`(`uid`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;";

$producttable = "CREATE TABLE IF NOT EXISTS `products`(
    `pid` VARCHAR(40) NOT NULL,
    `productname` VARCHAR(100) NOT NULL UNIQUE,
    `condition` VARCHAR(256) NOT NULL, 
    `price` FLOAT NOT NULL,
    `description` VARCHAR(300) NOT NULL,
    PRIMARY KEY (`pid`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;";

$incart = "CREATE TABLE IF NOT EXISTS `incart`(
    `date` datetime NOT NULL,
    `quantity` INT NOT NULL,
    `userid` VARCHAR(40) NOT NULL,
    `productid` VARCHAR(40) NOT NULL,
    `pharmacyid` VARCHAR(40),
    FOREIGN KEY (`productid`) REFERENCES `products` (`pid`),
    FOREIGN KEY (`userid`) REFERENCES `users`(`uid`),
    FOREIGN KEY (`pharmacyid`) REFERENCES `pharmacy`(`phid`),
    PRIMARY KEY (`userid`, `productid`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;";

$belongto = "CREATE TABLE IF NOT EXISTS `belongto`(
    `pharmacyid` VARCHAR(40) NOT NULL,
    `productid` VARCHAR(40) NOT NULL,
    `quantity` INT NOT NULL,
    FOREIGN KEY (`productid`) REFERENCES `products` (`pid`),
    FOREIGN KEY (`pharmacyid`) REFERENCES `pharmacy` (`phid`),
    PRIMARY KEY (`productid`, `pharmacyid`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;";

$pharmacytable = "CREATE TABLE IF NOT EXISTS `pharmacy`(
    `phid` VARCHAR(40) NOT NULL,
    `name` VARCHAR(100) NOT NULL UNIQUE,
    `latitude` FLOAT NOT NULL UNIQUE,
    `longitude` FLOAT NOT NULL UNIQUE,
    PRIMARY KEY (`phid`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;";


$uchecker = $connection->query($usertable);
$phchecker = $connection->query($pharmacytable);
$pchecker = $connection->query($producttable);
$incartchecker = $connection->query($incart);
$tchecker = $connection->query($transactiontable);
$belong = $connection->query($belongto);

if($uchecker != TRUE) {
    echo "ERROR: ". $connection->error;
} else if($tchecker !== TRUE) {
    echo "ERROR: ". $connection->error;
} else if ($pchecker !== TRUE) {
    echo "ERROR: ". $connection->error;
} else if ($phchecker !== TRUE){
    echo "ERROR: ". $connection->error;
} else if ($belong !== TRUE){
    echo "ERROR: ". $connection->error;
} else if ($incartchecker !== TRUE){
    echo "ERROR: ". $connection->error;
} else  {
    echo "tables created!";
}

$connection->close();

?>
