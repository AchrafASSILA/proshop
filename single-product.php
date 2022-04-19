<?php require_once './includes/header.php' ?>
<?php require_once './autoload.classes.php' ?>
<!-- check if there valid id in adresse libk  -->
<?php if (!isset($_GET['id']) || empty($_GET['id'])) header('Location: ./index.php') ?>
<?php
$id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

// instanciated 
$obj = new Product();

// get product 
$product = $obj->getSingleProduct($id);

// check if the product in db 
if ($product) {

?>
    <!-- instanciate order  -->
    <?php $order = new Order() ?>
    <!-- get all order items  -->
    <?php $order_items = json_decode(json_encode($order->getOrderItems()), true) ?>
    <!-- instanciate from category view -->
    <?php $cat = new Category(); ?>
    <!-- get all categories from category view  -->
    <?php $categories = $cat->getCategories(); ?>
    <header class="section-header">
        <nav class="navbar p-md-0 navbar-expand-sm navbar-light border-bottom">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTop4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTop4">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"> Language </a>
                            <ul class="dropdown-menu small">
                                <li><a class="dropdown-item" href="#">English</a></li>
                                <li><a class="dropdown-item" href="#">Arabic</a></li>
                                <li><a class="dropdown-item" href="#">Russian </a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"> USD </a>
                            <ul class="dropdown-menu small">
                                <li><a class="dropdown-item" href="#">EUR</a></li>
                                <li><a class="dropdown-item" href="#">AED</a></li>
                                <li><a class="dropdown-item" href="#">RUBL </a></li>
                            </ul>
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
                        </div>
                        <!-- category-wrap.// -->
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
                    </form> search-wrap .end// -->
                    </div> <!-- col.// -->
                    <div class="col-lg-3 col-sm-6 col-8 order-2 order-lg-3">
                        <div class="d-flex justify-content-end mb-3 mb-lg-0">
                            <div class="widget-header">
                                <?php if (isset($_SESSION['customer_username']) && isset($_SESSION['customer_id'])) { ?>
                                    <a href="./account.php" class="title text-muted">Welcome <?= $_SESSION['customer_username'] ?>!</a>
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



    <section class="section-content padding-y bg">
        <div class="container">

            <!-- ============================ COMPONENT 1 ================================= -->
            <div class="card">
                <div class="row no-gutters">
                    <aside class="col-md-6">
                        <article class="gallery-wrap">
                            <div class="img-big-wrap">
                                <a href="#"><img src="<?= $product->image ?>"></a>
                            </div> <!-- img-big-wrap.// -->

                        </article> <!-- gallery-wrap .end// -->
                    </aside>
                    <main class="col-md-6 border-left">
                        <article class="content-body">

                            <h2 class="title"><?php echo $product->name ?></h2>

                            <div class="mb-3">
                                <var class="price h4">$<?php echo $product->price ?></var>
                            </div>

                            <p><?= $product->description ?></p><?php if (in_array($product->id, array_column($order_items, 'product'))) : ?>
                                <button class="btn  btn-success" onclick="alert('product already add')">Added to cart </button>
                            <?php else : ?>
                                <form action="./admin/formHandling/order-form.php" method="post">
                                    <input type="hidden" name="product_id" value="<?= $product->id ?>">
                                    <button type="submit" name="add" class="btn  btn-primary"> Add to cart</button>
                                </form>
                            <?php endif; ?>
                        </article> <!-- product-info-aside .// -->
                    </main> <!-- col.// -->
                </div> <!-- row.// -->
            </div> <!-- card.// -->
            <!-- ============================ COMPONENT 1 END .// ================================= -->

            <br>

            <div class="row">
                <div class="col-md-9">

                    <!-- <header class="section-heading">
                        <h3>Customer Reviews </h3>

                    </header> -->

                    <!-- <article class="box mb-3">
                        <div class="icontext w-100">
                            <img src="./public/images/avatars/avatar1.jpg" class="img-xs icon rounded-circle">
                            <div class="text">
                                <span class="date text-muted float-md-right">24.04.2020 </span>
                                <h6 class="mb-1">Mike John </h6>

                            </div>
                        </div> 
                    <div class="mt-3">
                        <p>
                            Dummy comment Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip
                        </p>
                    </div>
                    </article> -->



                </div> <!-- col.// -->
            </div> <!-- row.// -->


        </div> <!-- container .//  -->
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->
    </body>

    </html>
<?php } else {
    header('Location: ./index.php');
} ?>