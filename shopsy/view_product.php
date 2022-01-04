<?php include "includes/dbconnect.php" ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Shopsy|View Products</title>

</head>
<body>
<?php include "includes/header.php"; ?>
<div class="container mt-4">
            <div class="row">

                <div class="col-9  mx-auto">
                    <div class="card border-0">
                        <div class="card-body">
                        <h3 class=" ps-2 border-4 border-start border-secondary mt-3 mb-4">Your Product</h3>
                            <div class="row">
                            <?php
                            if (isset($_GET['product_id'])) { 

                               $product_id = $_GET['product_id'];
                               $data = singleCalling("products JOIN category ON products.p_cat = category.c_id JOIN sub_category ON products.p_sub = sub_category.sub_id where p_id = '$product_id'");
                             } ?>
                               <div class="col-4">
                                    <img src="images/<?= $data['image'] ?>"  height="250px" width="230px" alt="">
                                </div>
                                <div class="col-8">
                              
                                    <form action="view_product.php?product_id=<?= $product_id ?>" method="post">
                                    <table class="table">
                                        <tr>
                                            <th>Product</th>
                                            <td class="text-capitalize"> <?= $data['title']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Price</th>
                                            <td>$<?= $data['price'] ?> </td>
                                        </tr>
                                        <tr>
                                            <th>Category</th>
                                            <td> <?= $data['c_title']; ?> | <?= $data['sub_title']; ?> </td>
                                        </tr>
                                        <tr>
                                            <th>Description</th>
                                            <td class="text-capitalize"><?= $data['description']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Brand</th>
                                            <td class="text-capitalize"><?= $data['brand']; ?></td>
                                        </tr>
                                        <tr>

                                            <th>Quantity</th>
                                                <td><input type="number" value="1" name="qty" class="form-control"></td>
                                        </tr>
                                        <?php if (isset($_SESSION['user_code'])) { ?>
                                            <input type="hidden" value="<?= $data['p_id']; ?>" name="pro_id">
                                        <input type="hidden" value="<?= $data['c_title']; ?>" name="pro_title">
                                        <input type="hidden" value="<?= $data['sub_title']; ?>" name="pro_sub_title">
                                        <input type="hidden" value="<?= $_SESSION['user_code']; ?>" name="account_id">
                                           <?php } ?>
                                    </table>
                                    <a href="index.php" class="btn btn-secondary float-end btn-sm">Back</a>
                                     <button class="btn btn-warning btn-sm text-light fw-bold mt-2" name="addcart" >Add <i class="bi bi-cart3" ></i></button> 
                                    </form>
                                <?php 
                                if (isset($_POST['addcart'])) {
                                    if (isset($_SESSION['user_code'])) {
                                        $data = [
                                            'pro_id'=>$_POST['pro_id'],
                                            'pro_title'=>$_POST['pro_title'],
                                            'pro_sub_title'=>$_POST['pro_sub_title'],
                                            'account_id'=>$_POST['account_id'],
                                            'qty'=>$_POST['qty'],
                                        ];
                                        insertData("addcart",$data);
                                        refresh("view_product.php?product_id=$product_id");
                                    }
                                    else {
                                       refresh("login.php");
                                    }
                                }
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>