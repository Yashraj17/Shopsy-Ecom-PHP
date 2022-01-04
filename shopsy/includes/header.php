<style>
    #navbar_color {
      background-image: linear-gradient(to right, rgba(32, 40, 119, 1), rgba(55, 46, 149, 1), rgba(83, 49, 177, 1), rgba(114, 48, 205, 1), rgba(150, 41, 230, 1)) !important
    }
  </style>
  <?php 
  if (isset($_SESSION['username'])) {
     $log = $_SESSION['username'];
     $user = singleCalling("accounts where email = '$log'");
     $_SESSION['user_code'] = $user['user_id'];
  }?>
<nav class="navbar navbar-expand-lg navbar-dark sticky-top " id="navbar_color">
    <div class="container">
        <a href="index.php" class="navbar-brand h4">Shopsy <i class="bi bi-bag"></i></a>
        <form action="index.php" class="d-flex">
            <div class="input-group">
                <input type="text" name="search" placeholder="Search Brands,Products,items.." size="50" class="form-control">
                <button class="btn btn-warning" name="find"><i style="color: white;" class="bi bi-search"></i></button>
            </div>
        </form>
        <ul class="navbar-nav">
            <?php if (isset($_SESSION['username'])) { ?>
                <li class="nav-item"><a href="index.php" class="nav-link fw-bold text-capitalize"><?= $user['name'];?></a></li>
                <li class="nav-item"><a href="cart.php" class="nav-link fw-bold "> Cart <i class="bi bi-cart3"></i>
                <sup class="badge bg-danger rounded-circle text-light">
                    <?php 
                    if (isset($_SESSION['username'])) {
                    $user_count = $_SESSION['user_code'];
                    $data = mysqli_query($conn,"select * from addcart where account_id = '$user_count'");
                    echo mysqli_num_rows($data);
                    }
                    ?>
                </sup> 
            </a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link fw-bold">Logout</a></li>

            <?php } else { ?>
                <li class="nav-item"><a href="index.php" class="nav-link fw-bold">Home</a></li>
                <li class="nav-item"><a href="cart.php" class="nav-link fw-bold"><i class="bi bi-cart3" ></i> Cart</a></li>
                <li class="nav-item"><a href="login.php " class="nav-link fw-bold">Login</a></li>
           <?php } ?>

            <!-- <li class="nav-item"><a href="" class="nav-link"><i class="bi bi-heart-fill"></i></a></li> -->
        </ul>
    </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-dark bg-warning py-0">
    <div class="container">
        <ul class="navbar-nav ">
            <?php 
            $data = callingAlldata("category");
            foreach ($data as  $value) { ?>
            <li class="nav-item ms-5"><a href="index.php?filter=<?= $value['c_id'] ?>" class="nav-link  text-light fw-bold"><?= $value['c_title'] ?></a></li>
           <?php } ?>
        </ul>
    </div>
</nav>