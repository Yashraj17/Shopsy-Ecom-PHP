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
            <div class="col-2" id="side" style="height:100vh;overflow-y:scroll;">
                <?php include "side.php"; ?>
            </div>
            <div class="col-10">
                <div class="row mt-3">
                    <div class="col-4">
                        <div class="card bg-danger text-white">
                            <div class="card-body">
                                <?php
                                $data = mysqli_query($conn, "select * from products");
                                $num = mysqli_num_rows($data);
                                ?>
                                <h1 class="display-4"><?= $num ?></h1>
                                <h6>Total Products</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card bg-warning text-white">
                            <div class="card-body">
                                <?php
                                $data = mysqli_query($conn, "select * from sub_category");
                                $num = mysqli_num_rows($data);
                                ?>
                                <h1 class="display-4"><?= $num ?></h1>
                                <h6>Total Category</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card bg-secondary text-white">
                            <div class="card-body">
                                <?php
                                $data = mysqli_query($conn, "select * from accounts");
                                $num = mysqli_num_rows($data);
                                ?>
                                <h1 class="display-4"><?= $num ?></h1>
                                <h6>Total Users</h6>
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