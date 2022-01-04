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
            <div class="col-2" id="side" style="height:100vh;overflow-y:scroll">
                <?php include "side.php"; ?>
            </div>
            <div class="col-10">
                <div class="row mt-3">
                    <div class="col-6 p-0">
                        <h3 class="ps-2 border-4 border-start border-secondary">Categories</h3>
                    </div>
                    <div class="col-6">
                        <a href="#insertCat" class="btn btn-warning float-end" data-bs-toggle="modal">Add Category</a>
                    </div>
                </div>
                <table class="table border-0">
                    <tr>
                        <th>Category Id</th>
                        <th>Category Title</th>
                        <th>Action</th>
                    </tr>
                    <?php 
                    $data = callingAlldata("category");
                    foreach ($data as $value) { ?>
                    <tr>
                        <td>#IN0<?= $value['c_id']; ?></td>
                        <td><?= $value['c_title']; ?></td>
                        <td><a href="category.php?del_id=<?= $value['c_id']; ?>" class="btn btn-danger "><i class="bi bi-trash-fill"></i></a></td>
                    </tr>
                   <?php }?>
                </table>
            </div>
        </div>
    </div>
    <!-- add product modal -->
    <!-- Modal -->
    <div class="modal fade" id="insertCat">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">Insert Category here</div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="c_title" placeholder="Enter category here">
                        </div>
                        <input type="submit" class="btn btn-success" name="cat_insert">
                    </form>
                    <?php 
                    if (isset($_POST['cat_insert'])) {
                        $data = [
                            'c_title'=> $_POST['c_title']
                        ];
                        insert("category",$data);
                        refresh("category.php");
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php 
    if (isset($_GET['del_id'])) {
        $del_id = $_GET['del_id'];
        deleteItem("category","c_id = '$del_id'");
        refresh("category.php");
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>