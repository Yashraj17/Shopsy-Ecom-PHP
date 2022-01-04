<style>
  #navbar_color {
    background-image: linear-gradient(to right, rgba(32, 40, 119, 1), rgba(55, 46, 149, 1), rgba(83, 49, 177, 1), rgba(114, 48, 205, 1), rgba(150, 41, 230, 1)) !important
  }
</style>
<?php  if (isset($_SESSION['user'])) {
  $log = $_SESSION['user'];
  $name = singleCalling("admin where username = '$log'");
}  ?>

<nav class="navbar navbar-expand-lg navbar-dark sticky-top" id="navbar_color">
  <div class="container">
    <a href="index.php" class="navbar-brand">Admin | Panel</a>
    <ul class="navbar-nav">
      <?php if (isset($_SESSION['user'])) { ?>
        <li class="nav-item"><a href="index.php" class="nav-link fw-bold">Hi <?= $name['id_name']; ?></a></li>
        <li class="nav-item"><a href="admin_logout.php" class="nav-link">Logout</a></li>
     <?php } else {?>
      <li class="nav-item"><a href="admin_login.php" class="nav-link">Login</a></li>
    <?php } ?>
    </ul>
  </div>
</nav>