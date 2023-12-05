<?php
session_start();
include '../controllers/productDetail.controller.php';
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

        .input-group.number-spinner {
            width: 20%;
        }

        .col-lg-7.col-md-7.col-sm-6 {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .col-lg-7.col-md-7.col-sm-6 .available {
            color: #7a9c59;
            font-weight: 600;
        }

        .col-lg-7.col-md-7.col-sm-6 .sold-out {
            color: #FF0000;
            font-weight: 600;
        }

        #submit-button {
            position: absolute;
            top: 50px;
            left: -50px;
            display: flex;
        }
    </style>
</head>

<body>
    <header>
        <?php include "header.php"; ?>
    </header>

    <main role="main" class="flex-shrink-0">
        <div class="container-fluid">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <?php
                            $productdetail = new ProductDetailController();
                            $detail = $productdetail->getDetail($_GET['id'])->fetch_assoc();
                            $imageURL = '../assets/images/' . $detail['productname'] . '.jpg';
                            $amount = $productdetail->getAmount($_GET['id']);
                            ?>
                            <div class="col-lg-5 col-md-5 col-sm-6">
                                <div class="white-box text-center"><img src="<?php echo $imageURL; ?>" class="img-responsive"></div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-6">
                                <h1><?php echo $detail['productname'] ?></h1>
                                <h2 class="mt-5">
                                    <?php echo number_format($detail['price'], 0) . "đ"; ?>
                                </h2>
                                <h4 class="box-title mt-5">Product description</h4>
                                <p><?php echo $detail['description'] ?></p>
                                <?php if ($amount > 0) { ?>
                                    <h4 class="available"><?php echo 'Available (' . $amount . ')' ?></h4>
                                    <div class="input-group number-spinner">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></button>
                                        </span>

                                        <?php $_SESSION['redirect_url'] = "../index.php/product_detail?id=" . $_GET['id']; ?>

                                        <form action="../controllers/cart_processing.php" method="POST" style="position: relative;">
                                            <?php if (isset($_SESSION['id'])) { ?>
                                                <input type="hidden" name="userID" value="<?php echo $_SESSION['id'] ?>" />
                                            <?php } ?>
                                            <input type="hidden" name="productID" value="<?php echo $_GET['id'] ?>" />
                                            <input type="text" name="quantity" class="form-control text-center" onchange="checkAvilable(value)" value="1">
                                            <div id="submit-button">
                                                <?php if (isset($_SESSION['id'])) { ?>
                                                    <input type="submit" name="action" id="add" value="Add To Cart" class="btn btn-default" style="margin-right: 10px;" />
                                                    <input type="submit" name="action" id="buy" value="Buy Now" class="btn btn-primary" />
                                                <?php } else { ?>
                                                    <a href="./login" id="add" class="btn btn-default" role="button">Add to cart</a>
                                                    <a href="./login" id="buy" class="btn btn-primary" role="button">Buy now</a>
                                                <?php } ?>
                                            </div>
                                        </form>

                                        <span class="input-group-btn">
                                            <button class="btn btn-default" data-dir="up"><span class="glyphicon glyphicon-plus"></span></button>
                                        </span>
                                    </div>
                                <?php } else { ?>
                                    <h4 class="sold-out"><?php echo 'Sold out' ?></h4>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <?php include "footer.php" ?>
        </footer>
    </main>
</body>
<script>
    $(document).on('click', '.number-spinner button', function() {
        var btn = $(this),
            oldValue = btn.closest('.number-spinner').find("input[name='quantity']").val().trim(),
            newVal = 0;

        if (btn.attr('data-dir') == 'up') {
            newVal = parseInt(oldValue) + 1;
        } else {
            if (oldValue > 0) {
                newVal = parseInt(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        checkAvilable(newVal);
        btn.closest('.number-spinner').find("input[name='quantity']").val(newVal);
    });
    var check = false;
    const amount = <?php echo $amount; ?>;

    function checkAvilable(value) {
        if (value > parseInt(amount) || value == 0) {
            check = true;
        } else {
            check = false;
        }
        document.getElementById("add").disabled = check;
        document.getElementById("buy").disabled = check;
    }
</script>

</html>