<?php include "admin_config.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Admin | login</title>
</head>
<body>
<?php include "header.php" ?>
<div class="container">
        <div class="row">
            <div class="col-lg-5 mx-auto">
                <div class="card-body shadow mt-4">
                    <span>
                        <p class="lead h6 mb-3">Admin Login</p>
                    </span>
                    <form action="" method="post">
                        <div class="mb-3">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="username" id="email">
                                <label for="email">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="password" id="password">
                                <label for="password">Password</label>
                            </div>
                            <div class="mb-3">
                                <input type="submit" value="Login" name="u_login" class="btn text-light fw-bold btn-warning w-100">
                                
                            </div>
                        </div>
                    </form>
                    <?php 
                    if (isset($_POST['u_login'])) {
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                       $check = mysqli_query($conn ,"select * from admin where username = '$username' AND password = '$password'");
                       $num = mysqli_fetch_array($check);
                       if ($num > 0) {
                           $_SESSION['user'] = $username;
                        refresh();
                       }
                       else{
                           echo"user not found";
                       }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>
</html>