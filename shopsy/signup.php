<?php include "includes/dbconnect.php" ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Signup</title>
</head>
<body>
<?php include "includes/header.php"; ?>
<div class="container">
        <div class="row">
            <div class="col-lg-5 mx-auto">
                <div class="card-body">
                    <h3 class="lead mb-3">Create an Account</h3>
                    <form action="" method="post">
                    <div class="mb-3">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" id="Name" placeholder="Enter name">
                                <label for="Name">Name</label>
                            </div>
                            <div class="mb-3">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="contact" id="Contact" placeholder="Enter Contact">
                                <label for="Contact">Contact</label>
                            </div>
                        <div class="mb-3">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                                <label for="email">Email</label>
                            </div>
                            <div class="mb-3">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="address" id="address" placeholder="Enter address">
                                <label for="address">Address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                                <label for="password">Password</label>
                            </div>
                            <div class="mb-3">
                                <input type="submit" name="signup" value="signup" class="btn btn-warning text-light fw-bold w-100">
                            </div>
                        </div>
                    </form>
                    <?php 
                    if (isset($_POST['signup'])) {
                        $data = [
                            'name'=> $_POST['name'],
                            'contact'=> $_POST['contact'],
                            'email'=> $_POST['email'],
                            'address'=> $_POST['address'],
                            'password'=> md5($_POST['password'])
                        ];
                        $query = insertData("accounts",$data);
                        if ($query) {
                            refresh("login.php");
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>