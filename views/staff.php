<?php
include '../controllers/listProduct.controller.php';
?>
<!doctype html>
<html lang="en" class="h-100">

<head>

    <title>Staff | Add new product</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        
        .add{
            max-width: 500px;
            margin: auto;
            text-align: center;
        }
        .add input{
            margin: 5px 5px;
        }
        li {
            padding-top: 1rem;
        }

    </style>
</head>

<body style="background-color: #F2F0F1;">
    <nav class="navbar sticky-top" style="background-color: #FFFFFF;">
        <div class="align-item-start container-fluid">
            <a class="navbar-brand fs-3 fw-bolder px-5" href="/index.php/home">SHOP.CO</a>

            <!--Account-->
            <div class="mr-auto nav-item px-5">
                <a class="nav-link" href="#">
                    <i class="fa fa-question" aria-hidden="true"></i> Need help
                </a>
            </div>
        </div>
    </nav>
    <div class="row" style="height: 45rem;">
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
        <div class="col-sm-10 col-lg-9">
            
            <div class="container">
                    <h2 class="fw-bold text-center p-4">ADD NEW PRODUCT</h2>
                    <form class="form row px-3 m-0" action="../controllers/addProduct_processing.php" method="post" enctype="multipart/form-data" >
                        
                        <label>Select Image File to Upload: <input type="file" name="file"> </label>

                        <label>Product name:</label>
                        <input type="text" name="productname" placeholder="Product Name" id="productname" 
                            class="my-3 form-control text-secondary border border-0  rounded-pill form-control" rules="required" />
                        
                        <label>Rrice:</label>
                        <input type="number" name="price" placeholder="Price" id="price" 
                            class="my-3 form-control text-secondary border border-0  rounded-pill form-control" rules="required" />

                        <label>Treatment:</label>
                        <input type="text" name="treatment" placeholder="Treatment" id="treatment" 
                            class="my-3 form-control text-secondary border border-0  rounded-pill form-control" rules="required" />
                    
                        <label>Description:</label>
                        <input type="text" name="description" placeholder="Description" id="description" 
                            class="my-3 form-control text-secondary border border-0  rounded-pill form-control" rules="required" />
                    
                        <label>Quantity:</label>
                        <input type="number" name="quantity" placeholder="Quantity" id="quantity" 
                            class="my-3 form-control text-secondary border border-0  rounded-pill form-control" rules="required" />
                        <!-- <input type="text" name="pharmacyname" placeholder="Pharmacy Name" id="pharmacyname" class="TextField form-control" rules="required" /> -->
                        <div class="d-flex flex-row text-center py-5 justify-content-end">
                            <input class="btn btn-success rounded-pill signin-btn" type="submit" name="submit" value="Upload">
                            <button type="reset" class="btn btn-primary rounded-pill signin-btn mx-4">Reset</button>
                        </div>
                        
                    </form>
                
            </div>
        </div>
        </div>
    </div>
    
        

    <?php include "footer.php" ?>
    <!-- enctype="multipart/form-data" -->
     <!-- Bootstrap JS dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>