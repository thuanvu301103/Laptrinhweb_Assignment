<?php
session_start();
?>

<?php
include '../controllers/cart.controller.php';

// Total amount of money
$total = 0;
?>

<!doctype html>
<html lang="en" class="h-100">

<head>

  <title>Shop.co</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</head>

<body>
  <?php include_once "header.php" ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <hr class="my-0">
      </div>
    </div>
  </div>
  <main>
    <div class="container-fluid my-4">
      <!-- bread crumbs -->
      <div class="d-flex flex-row gap-2 align-items-center">
        <!-- use anchors instead -->
        <a href="./homepage.php" class="text-decoration-none fw-bold text-dark">
          Shop
        </a>
        <!-- right arrow -->
        <iconify-icon icon="mdi:chevron-right" width="32" height="32"></iconify-icon>
        <a href="/" class="text-decoration-none fw-bold text-dark">
          Cart
        </a>
      </div>
      <?php
      if ($_GET) {
        $_SESSION['redirect_url'] = "../index.php/cart?userid=" . $_GET['userid'];

        $cart = new CartController();
        $cartItems = $cart->getCart($_GET['userid']);
        $total = 0;

        if ($cartItems && mysqli_num_rows($cartItems) > 0) { ?>
          <div class="d-flex flex-column align-items-stretch w-100 my-2">
            <h1><span class="fs-2 text-dark" style="font-weight: 900;">Your cart</span></h1>
            <div class="d-flex flex-row gap-4 p-2 align-items-start">
              <div class="rounded-4 border gap-5 border-dark-subtle border-1 p-4 flex-fill d-flex flex-column align-items-stretch">
                <?php while ($item = $cartItems->fetch_assoc()) {
                  $imageURL = '../assets/images/' . $item['productname'] . '.jpg';
                  $pro = $item['price'] * $item['quantity'];
                  $total = $total + $pro;
                ?>
                  <!-- product -->
                  <div class="d-flex flex-row gap-4 align-items-stretch" style="height: 150px;">
                    <!-- square 100x100 picture of clothings make sure the image's width scale with the element's height -->
                    <img src="<?php echo $imageURL; ?>" alt="product image" class="img-fluid rounded-2 h-100 w-auto">
                    <!-- product name, size, color -->
                    <div class="d-flex flex-row justify-content-between align-items-stretch flex-fill">
                      <div class="d-flex flex-column gap-1">
                        <span class="fs-4" style="font-weight: 800;"><?php echo $item['productname']; ?></span>
                        <div class="d-flex flex-column">
                          <span class="fs-6 fw-bold">Size: <span class="text-light-emphasis fw-lighter">Large</span></span>
                          <span class="fs-6 fw-bold">Color: <span class="text-light-emphasis fw-lighter">White</span></span>
                        </div>
                        <div class="flex-fill d-flex flex-column justify-content-end">
                          <span class="fs-5" style="font-weight:900;"><?php echo $item['price'] . 'đ'; ?></span>
                        </div>
                      </div>
                      <div class="d-flex flex-column align-items-end" style="justify-content: space-between;">
                        <form action="../controllers/cart_processing.php" method="POST">
                          <input type="hidden" name="userID" value="<?php echo $_GET['userid'] ?>" />
                          <input type="hidden" name="productID" value="<?php echo $item['pid'] ?>" />
                          <button type="submit" name="action" value="Remove" class=" btn bg-transparent border-0 d-flex justify-content-center align-items-center" style="width: 32px; height: 32px;">
                            <iconify-icon icon="mdi:trash-can-outline" width="24" height="24" class="text-danger"></iconify-icon>
                          </button>
                        </form>
                        <div class="d-flex flex-row gap-2 justify-content-center align-items-center bg-body-secondary rounded-pill">
                          <button class="btn bg-transparent border-0 d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:minus" width="24" height="24"></iconify-icon>
                          </button>
                          <span class="fs-5 fw-bold">1</span>
                          <button class="btn bg-transparent border-0 d-flex justify-content-center align-items-center">
                            <iconify-icon icon="mdi:plus" width="24" height="24"></iconify-icon>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </div>
              <div class="rounded-4 border border-dark-subtle border-1 p-4 flex-fill d-flex flex-column align-items-stretch gap-4">
                <div>
                  <span class="fs-4" style="font-weight: 800;">Order Summary</span>
                </div>
                <div class="d-flex flex-column">
                  <div class="d-flex flex-row justify-content-between align-items-center">
                    <span class="fs-6 fw-light text-light-emphasis">Subtotal</span>
                    <span class="fs-5" style="font-weight:900;"><?php echo $total . 'đ'; ?></span>
                  </div>
                  <div class="d-flex flex-row justify-content-between align-items-center">
                    <span class="fs-6 fw-light text-light-emphasis">Discount</span>
                    <span class="fs-5" style="font-weight:900;">-0đ</span>
                  </div>
                  <div class="d-flex flex-row justify-content-between align-items-center">
                    <span class="fs-6 fw-light text-light-emphasis">Delivery fee</span>
                    <span class="fs-5" style="font-weight:900;">10000đ</span>
                  </div>
                  <hr class="my-2">
                  <div class="d-flex flex-row justify-content-between align-items-center">
                    <span class="fs-6 fw-semibold text-light-emphasis">Total</span>
                    <span class="fs-5" style="font-weight:900;"><?php echo $total + 10000 . 'đ'; ?></span>
                  </div>
                </div>
                <?php
                $transaction = $cart->getCart($_GET['userid'])->fetch_all(MYSQLI_ASSOC);
                $transaction = base64_encode(serialize($transaction));
                ?>

                <form style="text-align: center;" action="../controllers/cart_processing.php" method="POST">
                  <button type="submit" name="action" value="Purchase" class="btn btn-dark rounded-pill py-3 d-flex flex-row gap-1 justify-content-center">
                    <span>Go to checkout</span>
                    <iconify-icon icon="mdi:chevron-right" width="24" height="24"></iconify-icon>
                  </button>
                  <input type="hidden" name="userID" value="<?php echo $_GET['userid'] ?>" />
                  <input style="display: none;" type="hidden" name="transaction" value="<?php echo $transaction ?>" />
                </form>
              </div>
            </div>
          </div>
        <?php } else { ?>
          <div style="text-align: center; padding: 50px;">
            <a class='btn btn-primary' style="font-size: 3rem;" href="./home">Your Cart is empty.</a>
          </div>
      <?php }
      } ?>
    </div>
  </main>
  <?php include_once "footer.php" ?>

</html>