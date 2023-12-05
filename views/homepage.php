<?php
include '../controllers/listProduct.controller.php';
?>
<!doctype html>
<html lang="en" class="h-100">

<head>

    <title>Shop.co | Homepage</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            display: flex;
            flex-direction: column;
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
    
        .cimage {
            width: 100%; 
            height: 250px;
            object-fit: cover; 
            opacity: 1;
        }
        p {text-align: justify;}
        a {
            text-align: justify;
        }
    
    .scrollable-div {
      width: 100%; /* Set the width as needed */
      height: 100rem; /* Set the height as needed */
      overflow: auto; /* Add a scroll bar when content overflows */
    }
  </style>
</head>

<body style="background-color: #F2F0F1;">
    <div class="sticky-top">
        <?php include "header.php";?>
    </div>
    <div style="height: 250px;">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner" style="height: 250px;">
                <div class="carousel-item active">
                    <img src="./img/banner1.jpg" class="d-block cimage" alt="image 1">
                    
                </div>
                <div class="carousel-item">
                    <img src="./img/banner2.jpg" class="d-block cimage" alt="image 2">
                    
                </div>
                <div class="carousel-item">
                    <img src="./img/banner3.jpg" class="d-block cimage" alt="image 2">
                    
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="container p-5 scrollable-div">
        <div class="row">
            <?php
                while ($row = $listProduct->fetch_assoc()) {
                    $imageURL = '../assets/images/' . $row['productname'] . '.jpg';
            ?>
            <div class="col-xs-4 col-sm-6 col-md-6 col-lg-4" >
                
                        <div class="card p-3">
                            <img class="product-image" style="height: 20rem; object-fit: cover;" src="<?php echo $imageURL; ?>">
                            <div class="card-body">
                                <a href="./product_detail?id=<?php echo $row['pid'] ?>" class="card-title fs-5 p-0 m-0 fw-bold"
                                    style="text-decoration: none;">
                                    <?php echo $row['productname']; ?>
                                </a>
                                <div class="fs-6 text-danger p-3"><?php echo number_format($row['price'], 0) . "đ"; ?></div>
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
                                    <div class="row justify-content-center">
                                        <a href="./login" class="btn btn-dark col-sm-11 col-md-5 col-lg-5 mx-2" role="button">Add to cart</a>
                                        <a href="./login" class="btn btn-primary col-sm-11 col-md-5 col-lg-5 mx-2" role="button">Buy now</a>
                                    </div>
                                <?php } ?>
                                </p>
                            </div>
                        </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <?php include "footer.php" ?>
    <!-- Bootstrap JS dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>