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
        .add{
            max-width: 500px;
            margin: auto;
            text-align: center;
        }
        .add input{
            margin: 5px 5px;
        }
        .add .button{
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }

    </style>
</head>

<body>
    <header>
        <?php include "header.php"; ?>
    </header>
    <main role="main" class="flex-shrink-0">
    <h3>ADD NEW PRODUCT</h3>
        <div class="container-fluid">
            <body class="add">
                
                <form action="../controllers/addProduct_processing.php" method="post" enctype="multipart/form-data" >
                        Select Image File to Upload:
                    <input type="file" name="file">
                    <input type="text" name="productname" placeholder="Product Name" id="productname" class="TextField form-control" rules="required" />
                    <input type="number" name="price" placeholder="Price" id="price" class="TextField form-control" rules="required" />
                    <input type="text" name="treatment" placeholder="Treatment" id="treatment" class="TextField form-control" rules="required" />
                    <input type="text" name="description" placeholder="Description" id="description" class="TextField form-control" rules="required" />
                    <input type="number" name="quantity" placeholder="Quantity" id="quantity" class="TextField form-control" rules="required" />
                    <!-- <input type="text" name="pharmacyname" placeholder="Pharmacy Name" id="pharmacyname" class="TextField form-control" rules="required" /> -->
                    <input class="button" type="submit" name="submit" value="Upload">
                </form>
            </body>
        </div>
        <br>
        <br>
        <br>
        <br>
        <footer>
            <?php include "footer.php" ?>
        </footer>
    </main>
    <!-- enctype="multipart/form-data" -->
</html>