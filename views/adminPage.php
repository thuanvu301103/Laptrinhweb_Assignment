<?php
session_start();
?>

<?php
include_once '../controllers/admin.controller.php';
?>

<!doctype html>
<html lang="en">

<head>
  <title>Clothes Shop</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</head>

<body>
  <header>
    <?php include "admin_header.php" ?>
  </header>

  <main role="main">
    <div class="container-fluid" style="display: block;">


      <!-- Transactions in cart are fetched from user's session -->
      <?php
      if ($_GET) {
        $_SESSION['redirect_url'] = "../index.php/admin?userid=" . $_GET['userid'];

        $admin = new AdminController();
        $listStaff = $admin->getListAccount();

        if ($listStaff && mysqli_num_rows($listStaff) > 0) { ?>
          <form action="../controllers/admin_processing.php" method="POST">
            <input type="hidden" name="adminID" value="<?php echo $_GET['userid'] ?>" />
            <input type="submit" name="action" value="New staff" class="btn btn-dark" />
          </form>

          <div class="cart-table" style="width: 100%;">
            <table class="table table-hover" description="List staff">
              <caption>List staff</caption>
              <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Username</th>
                  <th scope="col">Phone</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>

                <?php while ($staff = $listStaff->fetch_assoc()) {
                ?>
                  <tr>
                    <td><?php echo $staff['firstname'] . ' ' . $staff['lastname']; ?></td>
                    <td><?php echo $staff['username']; ?></td>
                    <td><?php echo $staff['phone']; ?></td>
                    <td>
                      <form action="../controllers/admin_processing.php" method="POST">
                        <input type="hidden" name="adminID" value="<?php echo $_GET['userid'] ?>" />
                        <input type="hidden" name="userID" value="<?php echo $staff['uid'] ?>" />
                        <input type="submit" name="action" value="Remove" class="btn btn-danger" />
                      </form>
                    </td>
                  </tr>
                <?php } ?>

              </tbody>
            </table>
          </div>
        <?php } else { ?>
          <div style="text-align: center; padding: 50px;">
            <h1>There is no staff!</h1>
            <a class='btn btn-primary' style="font-size: 3rem;" href="./home">Return to home!</a>
          </div>
      <?php }
      } ?>
    </div>
    <footer>
      <?php include "footer.php" ?>
    </footer>
  </main>

</html>