<?php
session_start();
include_once '../controllers/productDetail.controller.php';
?>
<!doctype html>
<html lang="en">

<head>
  <title>Shop.co</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>

<body>
  <?php
  include_once "header.php";

  $productdetail = new ProductDetailController();
  $detail = $productdetail->getDetail($_GET['id'])->fetch_assoc();
  $imageURL = '../assets/images/' . $detail['productname'] . '.jpg';
  $amount = $productdetail->getAmount($_GET['id']);
  ?>
  <main role="main" class="d-flex flex-column align-items-center my-5">
    <div class="d-flex flex-row gap-4 align-items-stretch card p-4 w-75" style="height: 600px;">
      <img src="<?php echo $imageURL; ?>" alt="product image" class="img-fluid rounded-2 h-100 w-auto">
      <div class="d-flex flex-row justify-content-between align-items-stretch flex-fill">
        <div class="d-flex flex-column gap-1">
          <span class="fs-4" style="font-weight: 800;"><?php echo $detail['productname'] ?></span>
          <div class="d-flex flex-column">
            <p><?php echo $detail['description'] ?></p>
            <?php if ($amount > 0) { ?>
              <p class="available"><?php echo 'Available (' . $amount . ')' ?></p>
            <?php } else { ?>
              <p class="sold-out"><?php echo 'Sold out' ?></p>
            <?php } ?>
          </div>
          <div class="flex-fill d-flex flex-column justify-content-end">
            <span class="fs-5" style="font-weight:900;"><?php echo number_format($detail['price'], 0) . "đ"; ?></span>
          </div>
        </div>
        <div class="d-flex flex-column justify-content-end align-items-end" style="justify-content: space-between;">
          <?php if ($amount > 0) {
            $_SESSION['redirect_url'] = "../index.php/product_detail?id=" . $_GET['id'];
          ?>
            <form action="../controllers/cart_processing.php" method="POST" style="position: relative;" class="d-flex flex-column gap-2 align-items-stretch">
              <?php if (isset($_SESSION['id'])) { ?>
                <input type="hidden" name="userID" value="<?php echo $_SESSION['id'] ?>" />
              <?php } ?>
              <input type="hidden" name="productID" value="<?php echo $_GET['id'] ?>" />
              <input type="text" name="quantity" class="form-control text-center" onchange="checkAvilable(value)" value="1">
              <div id="submit-button" class="d-flex flex-column align-items-stretch gap-2">
                <?php if (isset($_SESSION['id'])) { ?>
                  <input type="submit" name="action" id="add" value="Add To Cart" class="btn btn-light" />
                  <input type="submit" name="action" id="buy" value="Buy Now" class="btn btn-dark" />
                <?php } else { ?>
                  <a href="./login" id="add" class="btn btn-light" role="button">Add to cart</a>
                  <a href="./login" id="buy" class="btn btn-dark" role="button">Buy now</a>
                <?php } ?>
              </div>
            </form>
          <?php } ?>
        </div>
      </div>
    </div>
  </main>
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