<?php include "includes/dbconnect.php" ?> 
<?php if (!$_SESSION['username']) {
       header("location: login.php");
       exit();
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Cart</title>
</head>
<body>
<?php include "includes/header.php"; ?>
<div class="container">
  <div class="row">
    <div class="col-9 mx-auto">
      <div class="card mt-4">
        <div class="card-title ms-3">
        <h3 class=" ps-2 border-4 border-start border-secondary mt-4">Your Cart</h3>
        <table class="table border-0" >
          <form action="instamojo.php" method="post">
          <tr>
            <th>Product Id</th>
            <th>Product Name</th>
            <th>Product Type</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Images</th>
            <th>Action</th>
          </tr>

          <?php 
          if (isset($_SESSION['user_code'])) {
           $user_id = $_SESSION['user_code'];
           $data = callingAlldata("addcart JOIN products ON addcart.pro_id = products.p_id JOIN accounts ON addcart.account_id = accounts.user_id where user_id = '$user_id'");
            $total =0;
          }
          foreach ($data as  $value) { ?>
        <tr>
          <td>#IN<?= $value['p_id'] ?></td>
          <td><?= $value['title'] ?></td>
          <td><?= $value['pro_title'] ?> | <?= $value['pro_sub_title'] ?></td>
          <td><?= $value['price'] ?></td>
          <td><?= $value['qty'] ?></td>
          <td><img src="images/<?= $value['image'] ?>" style="height: 80px; width: 80px;" ></td>
          <td><a href="cart.php?cart_del_id=<?= $value['addcart_id'] ?>" class="btn btn-danger " ><i class="bi bi-trash-fill"></i></a></td>
        </tr>
       
        <?php $total += $value['qty'] *$value['price'] ;  } ?>
        <tr>
              <th colspan="6">TOTAL</th>
              <td class="pw-bold h6"> $<?= $total ?></td>
              <input type="hidden" value="<?= $total; ?>" name="total">
        </tr>
        </table>
        <a href="index.php" class="btn btn-dark btn-sm float-start me-3">Continue shopping</a>
        <button class="btn btn-warning btn-sm text-light fw-bold float-end me-3" name="checkout" >Checkout </button> 
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php 
if (isset($_GET['cart_del_id'])) {
   $cart_del_id = $_GET['cart_del_id'];
   deleteItem("addcart","addcart_id = '$cart_del_id'");
   refresh("cart.php");
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>