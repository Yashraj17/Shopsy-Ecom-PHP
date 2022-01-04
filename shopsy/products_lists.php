<?php
if (isset($_GET['find'])) {
    $search = $_GET['search'];
    $data = callingAlldata("products JOIN category ON products.p_cat = category.c_id JOIN sub_category ON products.p_sub = sub_category.sub_id  where products.status='0' AND title LIKE '%$search%' OR brand ='$search' OR category.c_title = '$search'");
?>
    <div class="container-fluid">
        <div class="row ms-4">
            <h3 class=" border-4 border-start border-secondary text-capitalize mt-4">Your Search Results | <?= $search ?> </h3>
        </div>
        <div class="row px-5 mt-4">
            <?php
            foreach ($data as  $value) { ?>
                <div class="col-3 px-4">
                    <div class="card border-0  px-2">
                        <img src="images/<?= $value['image'] ?>" class="card-img-top mx-auto" style="height: 180px; width:160px;">
                        <a href="view_product.php?product_id=<?= $value['p_id'] ?>" style="text-decoration: none;">
                            <div class="card-body text-center">
                                <h5 class="card-title h5 text-center text-dark "><?= $value['title'] ?></h5>
                                <p class="card-text h6 text-center text-success"> Price $<?= $value['price'] ?> </p>
                                <p class="card-text h6 text-center text-secondary"> <?= $value['c_title']; ?> | <?= $value['sub_title']; ?></p>
                        </a>

                    </div>
                </div>
        </div>
    <?php } ?>
    </div>
    </div>

<?php } ?>



<!-- this is the 1st product banner -->
<div class="container-fluid">
    <div class="row ms-4">
        <h3 class=" border-4 border-start border-secondary mt-4">Popular Products</h3>
    </div>
    <div class="row mt-4 mb-3">
        <div id="carouselExampleControlsNoTouching" class="carousel slide shadow-sm" data-bs-touch="false" data-bs-interval="false">
            <div class="carousel-inner">
                <div class="carousel-item active px-5">
                    <div class="row px-5">
                        <?php
                        if (isset($_GET['filter'])) {
                            $filter = $_GET['filter'];
                            $data = callingAlldata("products JOIN category ON products.p_cat = category.c_id JOIN sub_category ON products.p_sub = sub_category.sub_id  where products.status='0' AND category.c_id ='$filter' ORDER BY rand() LIMIT 4");
                        } else {
                            $data = callingAlldata("products JOIN category ON products.p_cat = category.c_id JOIN sub_category ON products.p_sub = sub_category.sub_id where products.status='0' ORDER BY rand() LIMIT 4");
                        }
                        foreach ($data as  $value) { ?>
                            <div class="col-12 col-md-6 col-lg-3 px-0 px-md-2 px-lg-4">
                                <div class="card border-0  px-2">
                                    <img src="images/<?= $value['image'] ?>" class="card-img-top mx-auto" style="height: 180px; width:160px;">
                                    <a href="view_product.php?product_id=<?= $value['p_id'] ?>" style="text-decoration: none;">
                                        <div class="card-body text-center">
                                            <h5 class="card-title h5 text-center text-dark "><?= $value['title'] ?></h5>
                                            <p class="card-text h6 text-center text-success"> Price $<?= $value['price'] ?> </p>
                                            <p class="card-text h6 text-center text-secondary"> <?= $value['c_title']; ?> | <?= $value['sub_title']; ?></p>
                                    </a>

                                </div>
                            </div>
                    </div>
                <?php } ?>
                </div>
            </div>
            <div class="carousel-item px-5">
                <div class="row px-5">
                    <?php
                    if (isset($_GET['filter'])) {
                        $filter = $_GET['filter'];
                        $data = callingAlldata("products JOIN category ON products.p_cat = category.c_id JOIN sub_category ON products.p_sub = sub_category.sub_id  where products.status='0' AND category.c_id ='$filter' ORDER BY rand() LIMIT 4");
                    } else {
                        $data = callingAlldata("products JOIN category ON products.p_cat = category.c_id JOIN sub_category ON products.p_sub = sub_category.sub_id where products.status='0' ORDER BY rand() LIMIT 4");
                    }
                    foreach ($data as  $value) { ?>
                        <div class="col-3 px-4">
                            <div class="card border-0  px-2">
                                <img src="images/<?= $value['image'] ?>" class="card-img-top mx-auto" style="height: 180px; width:160px;">
                                <a href="view_product.php?product_id=<?= $value['p_id'] ?>" style="text-decoration: none;">
                                    <div class="card-body text-center">
                                        <h5 class="card-title h5 text-center text-dark "><?= $value['title'] ?></h5>
                                        <p class="card-text h6 text-center text-success"> Price $<?= $value['price'] ?> </p>
                                        <p class="card-text h6 text-center text-secondary"> <?= $value['c_title']; ?> | <?= $value['sub_title']; ?></p>
                                </a>

                            </div>
                        </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
</div>
</div>

<!-- this is the 2nd product banner our new products -->
<div class="container-fluid">
    <div class="row ms-4">
        <h3 class=" border-4 border-start border-secondary mt-4">New Products</h3>
    </div>
    <div class="row mt-4 mb-5">
        <div id="carouselExampleControlsNoTouching2" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
            <div class="carousel-inner">
                <div class="carousel-item active px-5">
                    <div class="row px-5">
                        <?php
               
                            $data = callingAlldata("products JOIN category ON products.p_cat = category.c_id JOIN sub_category ON products.p_sub = sub_category.sub_id where products.status='0' ORDER BY rand() LIMIT 4");
                       
                        foreach ($data as  $value) { ?>
                            <div class="col-3 px-4">
                                <div class="card border-0  px-2">
                                    <img src="images/<?= $value['image'] ?>" class="card-img-top mx-auto" style="height: 180px; width:160px;">
                                    <a href="view_product.php?product_id=<?= $value['p_id'] ?>" style="text-decoration: none;">
                                        <div class="card-body text-center">
                                            <h5 class="card-title h5 text-center text-dark "><?= $value['title'] ?></h5>
                                            <p class="card-text h6 text-center text-success"> Price $<?= $value['price'] ?> </p>
                                            <p class="card-text h6 text-center text-secondary"> <?= $value['c_title']; ?> | <?= $value['sub_title']; ?></p>
                                    </a>

                                </div>
                            </div>
                    </div>
                <?php } ?>
                </div>
            </div>
            <div class="carousel-item px-5">
                <div class="row px-5">
                    <?php

                        $data = callingAlldata("products JOIN category ON products.p_cat = category.c_id JOIN sub_category ON products.p_sub = sub_category.sub_id where products.status='0' ORDER BY rand() LIMIT 4");
                    foreach ($data as  $value) { ?>
                        <div class="col-3 px-4">
                            <div class="card border-0  px-2">
                                <img src="images/<?= $value['image'] ?>" class="card-img-top mx-auto" style="height: 180px; width:160px;">
                                <a href="view_product.php?product_id=<?= $value['p_id'] ?>" style="text-decoration: none;">
                                    <div class="card-body text-center">
                                        <h5 class="card-title h5 text-center text-dark "><?= $value['title'] ?></h5>
                                        <p class="card-text h6 text-center text-success"> Price $<?= $value['price'] ?> </p>
                                        <p class="card-text h6 text-center text-secondary"> <?= $value['c_title']; ?> | <?= $value['sub_title']; ?></p>
                                </a>

                            </div>
                        </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching2" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching2" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
</div>
</div>