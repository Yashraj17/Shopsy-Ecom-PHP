<?php include "includes/dbconnect.php" ?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Login </title>
</head>

<body>
    <?php include "includes/header.php" ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 mx-auto">
                <div class="card-body shadow mt-4">
                    <span>
                        <p class="lead h6 mb-3">Login Account</p>
                    </span>
                    <form action="" method="post">
                        <div class="mb-3">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="email" id="email" placeholder="enter email">
                                <label for="email">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="password" id="password" placeholder="enter email">
                                <label for="password">Password</label>
                            </div>
                            <div class="mb-3">
                                <input type="submit" value="login" name="login" class="btn text-light fw-bold btn-warning w-100">

                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <p class="lead h6 mb-3" style="text-align: center;">Don't have Account? </p>
                                    <a href="signup.php" class="mx-auto" style="text-align: center;">Create New Account </a>

                                </div>
                            </div>
                        </div>
                    </form>
                    <?php 
                    if (isset($_POST['login'])) {
                        $email = $_POST['email'];
                        $password = md5($_POST['password']);
                        $check = mysqli_query($conn,"select * from accounts where email = '$email' AND password = '$password'");
                        $count = mysqli_num_rows($check);
                        if ($count>0) {
                            $_SESSION['username'] = $email;
                            refresh("index.php");
                        }
                        else {
                            echo"Account not found";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>