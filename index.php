<?php require_once './includes/header.php' ?>
<?php require './autoload.classes.php' ?>
<!-- instanciate from category view -->
<?php $cat = new Category(); ?>
<!-- get all categories from category view  -->
<?php $categories = $cat->getCategories(); ?>
<!-- get products  -->
<?php $prod = new Product();
$products = $prod->getProducts(null);
?>
<!-- instanciate order  -->
<?php $order = new Order() ?>
<!-- get all order items  -->
<?php $order_items = $order->getOrderItems() ?>
<header class="section-header">
    <nav class="navbar p-md-0 navbar-expand-sm navbar-light border-bottom">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTop4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTop4">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link"> English </a>

                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link"> USD </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li><a href="#" class="nav-link"> <i class="fa fa-envelope"></i> Email </a></li>
                    <li><a href="#" class="nav-link"> <i class="fa fa-phone"></i> Call us </a></li>
                </ul> <!-- list-inline //  -->
            </div> <!-- navbar-collapse .// -->
        </div> <!-- container //  -->
    </nav>

    <section class="header-main border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2 col-md-3 col-6">
                    <a href="./" class="brand-wrap">
                        <img class="logo" src="./public/images/logo.png">
                    </a> <!-- brand-wrap.// -->
                </div>
                <div class="col-lg col-sm col-md col-6 flex-grow-0">
                    <div class="category-wrap dropdown d-inline-block float-right">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bars"></i> All category
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="store.php">all</a>
                            <?php foreach ($categories as $category) : ?>
                                <a class="dropdown-item" href="store.php?category=<?php echo $category->name ?>"><?php echo $category->name ?> </a>
                            <?php endforeach; ?>
                        </div>
                    </div> <!-- category-wrap.// -->
                </div> <!-- col.// -->
                <a href="./store.php" class="btn btn-outline-primary">Store</a>
                <div class="col-lg  col-md-6 col-sm-12 col">
                    <!-- <form action="#" class="search">
                        <div class="input-group w-100">
                            <input type="text" class="form-control" style="width:60%;" placeholder="Search">

                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->
                    <!-- search-wrap .end// -->
                </div> <!-- col.// -->
                <div class="col-lg-3 col-sm-6 col-8 order-2 order-lg-3">
                    <div class="d-flex justify-content-end mb-3 mb-lg-0">
                        <div class="widget-header">
                            <?php if (isset($_SESSION['customer_username']) && isset($_SESSION['customer_id'])) { ?>
                                <small class="title text-muted">Welcome <?= $_SESSION['customer_username'] ?>!</small>
                            <?php } ?>
                            <div>
                                <?php if (isset($_SESSION['customer_username']) && isset($_SESSION['customer_id'])) { ?>
                                    <a href="./logout.php"> Logout</a>
                                <?php } else { ?>
                                    <a href="./login.php">Sign in</a> <span class="dark-transp"> | </span>
                                    <a href="./login.php"> Register</a>
                                <?php } ?>
                            </div>
                        </div>
                        <a href="./cart.php" class="widget-header pl-3 ml-3">
                            <div class="icon icon-sm rounded-circle border"><i class="fa fa-shopping-cart"></i></div>
                            <span class="badge badge-pill badge-danger notify"><?= count($order_items) ?></span>
                        </a>
                    </div> <!-- widgets-wrap.// -->
                </div> <!-- col.// -->
            </div> <!-- row.// -->
        </div> <!-- container.// -->
    </section> <!-- header-main .// -->




</header> <!-- section-header.// -->


<!-- ========================= SECTION MAIN ========================= -->
<section class="section-intro padding-y-sm">
    <div class="container">

        <div class="intro-banner-wrap">
            <img src="./public/images/banners/1.jpg" class="img-fluid rounded">
        </div>

    </div> <!-- container //  -->
</section>
<!-- ========================= SECTION MAIN END// ========================= -->

<!-- ========================= SECTION  ========================= -->
<section class="section-name padding-y-sm">
    <div class="container">

        <header class="section-heading">
            <a href="store.php" class="btn btn-outline-primary float-right">See all</a>
            <h3 class="section-title">Popular products</h3>
        </header><!-- sect-heading -->


        <div class="row">
            <?php foreach ($products as $product) : ?>
                <div class="col-md-3">
                    <div class="card card-product-grid">
                        <a href="./single-product.php?id=<?= $product->id ?>" class="img-wrap"> <img src="<?= $product->image ?>"> </a>
                        <figcaption class="info-wrap">
                            <a href="./single-product.php?id=<?= $product->id ?>" class="title"><?= $product->name ?></a>
                            <div class="price mt-1">$<?= $product->price ?></div> <!-- price-wrap.// -->
                        </figcaption>
                    </div>
                </div> <!-- col.// -->
            <?php endforeach; ?>
        </div> <!-- row.// -->

    </div><!-- container // -->
</section>
<!-- ========================= SECTION  END// ========================= -->
<?php require_once './includes/footer.php' ?>