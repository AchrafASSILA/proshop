<?php require './includes/header.php' ?>
<?php if (isset($_SESSION['customer_id'])) : ?>
    <?php require './autoload.classes.php'; ?>
    <!-- instanciate order  -->
    <?php $order = new Order() ?>
    <!-- get all order items  -->
    <?php $order_items = json_decode(json_encode($order->getOrderItems()), true) ?>
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



    <!-- ========================= SECTION CONTENT ========================= -->
    <section class="section-conten padding-y bg">

        <div class="container">
            <div class="row">
                <aside class="col-md-3">
                    <!--   SIDEBAR   -->
                    <ul class="list-group">
                        <a class="list-group-item active" href="#"> Profile</a>
                        <!-- <a class="list-group-item" href="#"> Transactions </a>
                        <a class="list-group-item" href="#"> Return and refunds </a>
                        <a class="list-group-item" href="#">Settings </a>
                        <a class="list-group-item" href="#"> My Selling Items </a>
                        <a class="list-group-item" href="#"> Received orders </a> -->
                    </ul>
                    <br>
                    <a class="btn btn-light btn-block" href="./logout.php"> <i class="fa fa-power-off"></i> <span class="text">Log out</span> </a>
                    <!--   SIDEBAR .//END   -->
                </aside>
                <main class="col-md-9">
                    <article class="card">
                        <header class="card-header">
                            <strong class="d-inline-block mr-3">Order ID: 6123456789</strong>
                            <span>Order Date: 16 December 2018</span>
                        </header>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h6 class="text-muted">Delivery to</h6>
                                    <p>Michael Jackson <br>
                                        Phone +1234567890 Email: myname@pixsellz.com <br>
                                        Location: Home number, Building name, Street 123, Tashkent, UZB <br>
                                        P.O. Box: 100123
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <h6 class="text-muted">Payment</h6>
                                    <span class="text-success">
                                        <i class="fab fa-lg fa-cc-visa"></i>
                                        Visa **** 4216
                                    </span>
                                    <p>Subtotal: $356 <br>
                                        Shipping fee: $56 <br>
                                        <span class="b">Total: $456 </span>
                                    </p>
                                </div>
                            </div> <!-- row.// -->
                        </div> <!-- card-body .// -->
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tr>
                                    <td width="65">
                                        <img src="./public/images/items/1.jpg" class="img-xs border">
                                    </td>
                                    <td>
                                        <p class="title mb-0">Product name goes here </p>
                                        <var class="price text-muted">USD 145</var>
                                    </td>
                                    <td> Seller <br> Nike clothing </td>
                                    <td width="250"> <a href="#" class="btn btn-outline-primary">Track order</a> <a href="#" class="btn btn-light"> Details </a> </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="./public/images/items/2.jpg" class="img-xs border">
                                    </td>
                                    <td>
                                        <p class="title mb-0">Another name goes here </p>
                                        <var class="price text-muted">USD 15</var>
                                    </td>
                                    <td> Seller <br> ABC shop </td>
                                    <td> <a href="#" class="btn btn-outline-primary">Track order</a> <a href="#" class="btn btn-light"> Details </a> </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="./public/images/items/3.jpg" class="img-xs border">
                                    </td>
                                    <td>
                                        <p class="title mb-0">The name of the product goes here </p>
                                        <var class="price text-muted">USD 145</var>
                                    </td>
                                    <td> Seller <br> Wallmart </td>
                                    <td> <a href="#" class="btn btn-outline-primary">Track order</a> <a href="#" class="btn btn-light"> Details </a> </td>
                                </tr>
                            </table>
                        </div> <!-- table-responsive .end// -->
                    </article>
                    <!-- order-group.// ->public/
                </main>
            </div> <!-- row.// -->
            </div>


    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->


    <?php require './includes/footer.php' ?>
<?php else : ?>
    <?php header('Location: /proshop/login.php') ?>
<?php endif; ?>