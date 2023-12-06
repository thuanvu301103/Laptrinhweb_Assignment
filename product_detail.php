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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
</head>

<body>
    <?php include "header.php"; ?>
    </div class="row" style="min-height:50rem;">
         <div class="col-sm-2 col-lg-3 bg-dark px-5">
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item w-100">
                    <a href="./homepage.php" class="nav-link text-white" aria-current="page">
                        <i class="fa fa-home"></i>
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                            Home
                    </a>
                </li>
                <li class="nav-item w-100">
                    <a href="#" class="nav-link text-white" aria-current="page">
                        <i class="fa fa-cube"></i>
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                            Order
                    </a>
                </li>
                <li class="nav-item w-100">
                    <a href="#" class="nav-link text-white" aria-current="page">
                        <i class="fa fa-info"></i>
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                            Staff's Profile
                    </a>
                </li>
                <li class="nav-item w-100">
                    <a href="#" class="nav-link text-white" aria-current="page">
                        <i class="fa fa-archive"></i>
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                            Product
                    </a>
                </li>
                <li class="nav-item w-100">
                    <a href="#" class="nav-link text-white" aria-current="page">
                        <i class="fa fa-internet-explorer"></i>
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                            Internet
                    </a>
                </li>
                <li class="nav-item w-100">
                    <a href="./pharmacy.php" class="nav-link text-white" aria-current="page">
                        <i class="fa fa-question"></i>
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                            About
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-sm-10 col-lg-9 justify-content-center p-5">
            
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
    <?php include "footer.php" ?>
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