<?php

$connection = mysqli_connect("localhost", "root", "", "webDB");

if ($connection === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if (isset($_REQUEST["term"])) {
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    if (isset($_REQUEST['term'])) {
        $sql = "SELECT * FROM `products` WHERE `productname` LIKE '%" . $_REQUEST['term'] . "%' OR `condition` LIKE '%" . $_REQUEST['term'] . "%'";
    } else {
        $sql = "SELECT * FROM `products`";
    }
    $result = mysqli_query($connection, $sql);
    $flag = 0;

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            if ($flag === 5) {
                break;
            } ?>
            <form>
                <a href="../index.php/product_detail?id=<?php echo $row['pid'] ?>" class="d-flex flex-row gap-4 align-items-stretch text-decoration-none text-dark" style="height: 100px;">
                    <!-- square 100x100 picture of clothings make sure the image's width scale with the element's height -->
                    <img src="<?php echo '../assets/images/' . $row["productname"] . '.jpg' ?>" alt="product image" class="img-fluid rounded-2 h-100 w-auto">
                    <!-- product name, size, color -->
                    <div class="d-flex flex-row justify-content-between align-items-stretch flex-fill">
                        <div class="d-flex flex-column gap-1">
                            <span class="fs-6" style="font-weight: 400;"><?php echo $row['productname']; ?></span>
                            <span class="fs-6" style="font-weight: 200;"><?php echo $row['condition']; ?></span>
                            <div class="flex-fill d-flex flex-column justify-content-end">
                                <span class="fs-6" style="font-weight:800;"><?php echo number_format($row['price'], 0) . 'đ' ?></span>
                            </div>
                        </div>
                    </div>
                </a>
            </form>
<?php
            $flag += 1;
        }
    } else {
        echo "<p>No matches found</p>";
    }
}

mysqli_close($connection);
?>