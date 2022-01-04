<?php include "admin_config.php" ?>
<?php if (!$_SESSION['user']) {
 header("location: admin_login.php");
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
    <title>Admin | Dashboard</title>
    <style>
    #side {
      background-image: linear-gradient(to right, rgba(32, 40, 119, 1), rgba(55, 46, 149, 1), rgba(83, 49, 177, 1), rgba(114, 48, 205, 1), rgba(150, 41, 230, 1)) !important
    }
  </style>
</head>
<body>
    <?php include "header.php" ?>
    <div class="container-fluid ps-0">
    <div class="row w-100 p-0">
        <div class="col-2 " id="side">
            <?php include "side.php";?>
        </div>
        <div class="col-10 " >
                <div class="row mt-3">
                    <div class="col-6 p-0">
                        <h3 class="ps-2 border-4 border-start border-secondary">Products</h3>
                    </div>
                    <div class="col-6">
                        <a href="#proInsert" class="btn btn-warning float-end text-light" data-bs-toggle="modal">Add Product</a>
                    </div>
                </div>
                <table class="table border-0">
                    <tr>
                        <th>Prouct Id</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Sub Cat</th>
                        <th>Brand</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php 
                    $data = callingAlldata("products JOIN category ON products.p_cat = category.c_id JOIN sub_category ON products.p_sub = sub_category.sub_id");
                    foreach ($data as  $value) { 
                        if($value['status'] == 1){
                            $view = "Hide";
                            $color = "danger";
                        }
                        else{
                            $view = "Active";
                            $color = "success";
                        }
                        ?>
                    <tr>
                        <td>#IN<?= $value['p_id'] ?> </td>
                        <td><?= $value['title'] ?></td>
                        <td><?= $value['c_title'] ?></</td>
                        <td><?= $value['sub_title'] ?></</td>
                        <td><?= $value['brand'] ?></td>
                        <td><?= $value['quantity'] ?></td>
                        <td><?= $value['price'] ?></td>
                        <td><img src="../images/<?= $value['image'] ?>" style="height: 80px; width: 80px;" ></td>
                        <td><a href="products.php?status_id=<?= $value['p_id'] ?>" class="badge bg-<?= $color ?>" style="text-decoration: none;"><?= $view ?></i></a></td>
                        <td><a href="products.php?pro_id=<?= $value['p_id'] ?>" class="btn btn-dark"><i class="bi bi-trash-fill"></i></a></td>
                    </tr>
                   <?php } ?>
                </table>
                <?php 
                if (isset($_GET['status_id'])) {
                    $status_id = $_GET['status_id'];
                    $data = singleCalling("products where p_id = '$status_id'");
                    $status = $data['status'];
                        if ($status == 0) {
                            $sql = mysqli_query($conn,"update products SET status = '1' where p_id = '$status_id'");
                            refresh("products.php");
                        }
                        else {
                            $sql = mysqli_query($conn,"update products SET status = '0' where p_id = '$status_id'");
                            refresh("products.php");
                        }
                 }
                 ?>
            </div>
    </div>
</div>
<!-- insert product model -->
<div class="modal fade" id="proInsert">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Insert Product Here</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body">
                <form action="products.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3 col">
                        <label for="">Product Name</label>
                        <input type="text" class="form-control" name='title'>
                    </div>
                    <div class="mb-3 col">
                        <label for="">Category</label>
                        <select class="form-select" name='pro_category'>
                        <option selected disabled>Select category</option>
                        <?php 
                        $data = callingAlldata("category");
                        foreach ($data as  $value) { ?>
                           <option value="<?= $value['c_id'];?>"><?= $value['c_title'];?></option>
                       <?php }?>
                        </select>
                    </div>
                    <div class="mb-3 col">
                        <label for="">Sub-Category</label>
                        <select class="form-select" name='prosub_category'>
                        <option selected disabled>Select sub-category</option>
                        <?php 
                        $data = callingAlldata("sub_category");
                        foreach ($data as  $value) { ?>
                           <option value="<?= $value['sub_id'];?>"><?= $value['sub_title'];?></option>
                       <?php }?>
                        </select>
                    </div>
                    <div class="mb-3 col">
                        <label for="">Price</label>
                        <input type="number" class="form-control" name='price'>
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="">Image</label>
                            <input type="file" class="form-control" name='cover'>
                        </div>
                        <div class="mb-3 col">
                            <label for="">Quantity</label>
                            <input type="number" class="form-control" name='quantity'>
                        </div>
                    </div>
                    <div class="mb-3 col">
                        <label for="">Brand</label>
                        <input type="text" class="form-control" name='brand'  placeholder="Enter Brand here">
                    </div>
                    <div class="mb-3 col">
                        <label for="">Description</label>
                        <textarea name="desc" cols="10" class="form-control" rows="10"></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-success w-100" name="new_product"></input>
                    </div>
                </form>
                <?php 
                if (isset($_POST['new_product'])) {
                    $title = $_POST['title'];
                    $pro_category = $_POST['pro_category'];
                    $prosub_category = $_POST['prosub_category'];
                    $price = $_POST['price'];
                    $quantity = $_POST['quantity'];
                    $desc = $_POST['desc'];
                    $brand = $_POST['brand'];
                    $image = $_FILES['cover']['name'];
                    $tmp_image = $_FILES['cover']['tmp_name'];
                    move_uploaded_file($tmp_image,"../images/$image");
                    $query = mysqli_query($conn,"insert into products (title,p_cat,p_sub,price,quantity,description,image,brand) value ('$title','$pro_category','$prosub_category','$price','$quantity','$desc','$image','$brand')");
                    if ($query) {
                        refresh("products.php");
                    }
                    else {
                       echo"data not inserted";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php 
if (isset($_GET['pro_id'])) {
   $pro_id = $_GET['pro_id'];
   deleteItem("products","p_id = '$pro_id'");
   refresh("products.php");
}
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>