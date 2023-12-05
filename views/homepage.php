<?php
include '../controllers/listProduct.controller.php';
?>
<!doctype html>
<html lang="en" class="h-100">

<head>

    <title>DrugStore</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            display: flex;
            flex-direction: column;
        }

        header {
            position: fixed;
            width: 100%;
            left: 0;
            top: 0;
        }

        main {
            position: absolute;
            top: 150px;
            z-index: -1;
        }

        img.product-image {
            height: 120px;
            width: auto;
        }

        .col-xs-6.col-sm-4.col-md-3.col-lg-2 {
            padding: 0px 10px;
        }

        .thumbnail {
            min-width: 208px;
        }
    </style>
</head>

<body>
    <header>
        <?php include "header.php"; ?>
    </header>
    <main role="main" class="flex-shrink-0">
        <div class="container-fluid">
            <div class="row">
                <?php
                while ($row = $listProduct->fetch_assoc()) {
                    $imageURL = '../assets/images/' . $row['productname'] . '.jpg';
                ?>
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">

                        <div class="thumbnail">
                            <img class="product-image" src="<?php echo $imageURL; ?>">

                            <a href="./product_detail?id=<?php echo $row['pid'] ?>">
                                <div class="caption">
                                    <h4><?php echo $row['productname']; ?></h4>
                                    <p><?php echo number_format($row['price'], 0) . "đ"; ?></p>
                                    <p>
                                        <?php if (isset($_SESSION['fullname'])) {
                                            $_SESSION['redirect_url'] = "../index.php/home";
                                        ?>

                                    <form action="../controllers/cart_processing.php" method="POST">
                                        <input type="hidden" name="userID" value="<?php echo $_SESSION['id'] ?>" />
                                        <input type="hidden" name="productID" value="<?php echo $row['pid'] ?>" />
                                        <input type="hidden" name="quantity" value="1" />
                                        <input type="submit" name="action" value="Add To Cart" class="btn btn-default" />
                                        <input type="submit" name="action" value="Buy Now" class="btn btn-primary" />
                                    </form>

                                <?php } else { ?>
                                    <a href="./login" class="btn btn-default" role="button">Add to cart</a>
                                    <a href="./login" class="btn btn-primary" role="button">Buy now</a>
                                <?php } ?>
                                </p>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php
                }   ?>
            </div>
        </div>
        <footer>
            <?php include "footer.php" ?>
        </footer>
    </main>

</html>