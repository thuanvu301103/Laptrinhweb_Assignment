<?php
session_start();
?>

<?php
include '../controllers/profile.controller.php';
include '../models/Users.php';

// Total amount of money
$total = 0;
?>

<!doctype html>
<html lang="en" class="h-100">

<head>

    <title>Clothes Shop</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body style="background-color: #F2F0F1;">
    <?php include "header.php" ?>
    <div class="row" style="min-height: 50rem;">
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
                    <a href="<?php if(isset($_SESSION['id'])) {echo "./transaction?userid=".$_SESSION['id'];}?>" class="nav-link text-white" aria-current="page">
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
            <div class="user-profile">
                <table class="table info-table" style="border-bottom: 1px #e3e3e3 solid;">
                    <thead>
                        <tr>
                            <th scope="col">Field</th>
                            <th scope="col">info</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Username</td>
                            <td><?php if (isset($_SESSION['username'])) echo $_SESSION['username']; ?></td>
                        </tr>
                        <tr>
                            <td>Firstname</td>
                            <td><?php if (isset($_SESSION['firstname'])) echo $_SESSION['firstname']; ?></td>
                        </tr>
                        <tr>
                            <td>Lastname</td>
                            <td><?php if (isset($_SESSION['lastname'])) echo $_SESSION['lastname']; ?></td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td><?php if (isset($_SESSION['phone'])) echo $_SESSION['phone']; ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="d-flex flex-row text-center py-2 justify-content-end">
                    <a class="edit-btn btn btn-primary mx-4" href="./editProfile" role="button">Change Info</a>
                    <a class="edit-btn btn btn-primary" href="./editPassword" role="button">Edit Password</a>
                </div>
            </div>
            <div class="cart-table">
                <table class="table" style="border-bottom: 1px #e3e3e3 solid; margin-bottom:20px;">
                    <?php
                    if ($_GET) {

                        $profile = new ProfileController();
                        $transaction = $profile->getTransaction($_GET['userid']);
                        $total = 0;
                        if ($transaction && mysqli_num_rows($transaction) > 0) { ?>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Product</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total Price</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($item = $transaction->fetch_assoc()) {
                                        $imageURL = '../assets/images/' . $item['productname'] . '.jpg';
                                        $total = $total + $item['overallprice'];
                                    ?>
                                        <tr>
                                            <td><img class="product-image" src="<?php echo $imageURL; ?>"></td>
                                            <td><?php echo $item['productname']; ?></td>
                                            <td><?php echo $item['quantity']; ?></td>
                                            <td><?php echo $item['overallprice']; ?></td>
                                            <td><?php echo $item['boughtdate']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <div class="total" style="text-align: center;">
                                <h2>Total Money Spent: <span><?php echo $total; ?></span></h2>
                            </div>
                        <?php } else { ?>
                            <div style="text-align: center; padding: 50px;">
                                <a class='btn btn-primary' style="font-size: 3rem;" href="./home">No transaction yet. Go buy some drugs!</a>
                            </div>
                            
                    <?php }
                    }?>
                </table>
            </div>
        </div>
    </div>

     
    
    <script>
            var transaction = document.querySelector(".cart-table");
            var userProfile = document.querySelector('.user-profile');
            let heights = transaction.offsetHeight.toString();
            console.log(heights);
            userProfile.style.height = `${heights}px`;
    </script>
    <?php include "footer.php";?>
</body>

</html>