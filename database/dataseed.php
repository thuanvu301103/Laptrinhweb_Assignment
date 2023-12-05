<?php 
include_once ('../views/config.php');

$connection = new mysqli($servername, $username, $password, $dbname);

if($connection->connect_error){
    die("Connection failed: " . $connection->connect_error);
}

$users = "INSERT INTO `users` (`uid`, `username`, `password`, `firstname`, `lastname`, `phone`, `role`)
VALUES ('fda786c58c3c4', 'Admin12345', '1470aad22bf0f157d732ded7518e4568', 'Dangg', 'Nguyen', '0909999999', 'admin'), #Admin123
('d2a095d4abd64','Nhan12345','1470aad22bf0f157d732ded7518e4568','Nhan','Nguyen','0123456789', 'user'),
('674611d4746c3','Phuc12345','1470aad22bf0f157d732ded7518e4568','Phuc','Tuong','0111111222', 'user'),
('0c167e25767e4','Khuong12345','1470aad22bf0f157d732ded7518e4568','Khuong','Thai','0989686868', 'user')";

$phars = "INSERT INTO `pharmacy`(`phid`, `name`, `latitude`, `longitude`)
VALUES ('a43ed8d9c1874','ShopCo1', 10.77376426982302, 106.66056565582056),
('21e1a6590ec74','ShopCo2', 10.770890360902907, 106.65593515361698),
('21e3d6590ec25','ShopCo3', 10.7671, 106.666)";

$products = "INSERT INTO `products` (`pid`, `productname`, `condition`, `price`, `description`)
VALUES ('618005651c83c','Áo Polo nam Novelty Cool Feelings màu trắng','Áo Polo',200000,'Áo Polo nam Novelty Cool Feelings màu trắng'),
('6180055d946f8','Áo Polo nam Novelty Cool Feelings màu xanh da trời','Áo Polo',250000,'Áo Polo nam Novelty Cool Feelings màu xanh da trời'),
('618004c088173','Áo Polo nam Novelty Cool Feelings xanh đen','Áo Polo',250000,'Áo Polo nam Novelty Cool Feelings xanh đen'),
('618004cebd99c','Áo Polo nam Novelty Cool Feelings màu đen','Áo Polo',250000,'Áo Polo nam Novelty Cool Feelings màu đen'),
('618004da4d32f','Áo sơ mi nam trắng dài tay Novelty Classic','Áo sơ mi',280000,'Áo sơ mi nam trắng dài tay Novelty Classic'),
('618004e461875','Áo sơ mi nam trắng dài tay Novelty Regular','Áo sơ mi',280000,'Áo sơ mi nam trắng dài tay Novelty Regular'),
('618004ed4ff08','Quần tây nam Novelty 0Ply Classic màu xám đen','Quần tây nam',200000,'Quần tây nam Novelty 0Ply Classic màu xám đen'),
('618004fa732dc','Quần tây nam Novelty 0Ply Regular fit xám đen','Quần tây nam',245000,'Quần tây nam Novelty 0Ply Regular fit xám đen'),
('618005075b2eb','Áo thun nam cổ tròn Novelty xanh yamaha','Áo thun',290000,'Áo thun nam cổ tròn Novelty xanh yamaha'),
('618005107f729','Áo thun nam cổ tròn Novelty xanh đen in họa tiết','Áo thun',200000,'Áo thun nam cổ tròn Novelty xanh đen in họa tiết'),
('6180051cabbbf','Áo sơ mi nam Regular fit ngắn tay xanh cổ vịt','Áo sơ mi',300000,'Áo sơ mi nam Regular fit ngắn tay xanh cổ vịt'),
('6180052502a07','Áo sơ mi nam dài tay Novelty','Áo sơ mi',180000,'Áo sơ mi nam dài tay Novelty'),
('6180052b862ce','Áo sơ mi nam dài tay Novelty Classic sọc nhỏ','Áo sơ mi',300000,'Áo sơ mi nam dài tay Novelty Classic sọc nhỏ'),
('618005341c95c','Áo sơ mi nam dài tay Novelty Regular fit đỏ đô','Áo sơ mi',300000,'Áo sơ mi nam dài tay Novelty Regular fit đỏ đô'),
('618005393c8e1','Áo sơ mi nam dài tay Novelty Regular fit tím đậm','Áo sơ mi',346000,'Áo sơ mi nam dài tay Novelty Regular fit tím đậm')";

$belongto = "INSERT INTO `belongto` (`pharmacyid`, `productid`, `quantity`)
VALUES ('a43ed8d9c1874','618005651c83c', 20),
('a43ed8d9c1874','6180055d946f8', 10),
('a43ed8d9c1874','618004c088173', 6),
('a43ed8d9c1874','618004cebd99c', 7),
('a43ed8d9c1874','618004da4d32f', 8),
('a43ed8d9c1874','618004e461875', 3),
('a43ed8d9c1874','618004ed4ff08', 13),
('a43ed8d9c1874','618004fa732dc', 22),
('a43ed8d9c1874','618005075b2eb', 11),
('a43ed8d9c1874','618005107f729', 15),
('a43ed8d9c1874','6180051cabbbf', 4),
('a43ed8d9c1874','6180052502a07', 1),
('a43ed8d9c1874','6180052b862ce', 20),
('a43ed8d9c1874','618005341c95c', 7),
('21e1a6590ec74','618005393c8e1', 8)";

if ($connection->multi_query($users) === TRUE) {
    echo "successfully ";
} else {
    echo "Error: " . $connection->error;
}

if ($connection->multi_query($phars) === TRUE) {
    echo "successfully ";
} else {
    echo "Error: ". $connection->error;
}
if ($connection->multi_query($products) === TRUE) {
    echo "successfully ";
} else {
    echo "Error: "  . $connection->error;
}
if ($connection->multi_query($belongto) === TRUE) {
    echo "successfully ";
} else {
    echo "Error: " . $connection->error;
}

$connection->close();
?>