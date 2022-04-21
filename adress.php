<?php require './includes/header.php' ?>
<?php if (isset($_SESSION['customer_id'])) : ?>
    <?php require './autoload.classes.php'; ?>
    <!-- instanciate order  -->
    <?php $order = new Order() ?>
    <!-- get shipping  -->
    <?php $shippingObj = new Shipping() ?>
    <?php $adressShip = $shippingObj->getShippingAdress(null) ?>

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
                        <a class="list-group-item" href="./account.php"> Profile</a>
                        <a class="list-group-item" href="./adress.php"> Adress </a>
                    </ul>
                    <br>
                    <a class="btn btn-light btn-block" href="./logout.php"> <i class="fa fa-power-off"></i> <span class="text">Log out</span> </a>
                    <!--   SIDEBAR .//END   -->
                </aside>
                <main class="col-md-9">

                    <div class="card mx-auto" style="max-width: 380px; margin-top:100px;">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Delivery info</h4>
                            <form method="post" action="./admin/formHandling/adress.form.php">
                                <?php if ($adressShip) : ?>
                                    <div class="form-group">
                                        <input type="text" name="adress" value="<?= $adressShip[0]->adress  ?>" class="form-control" placeholder="adress">
                                    </div> <!-- form-group// -->

                                    <div class="form-group">
                                        <input type="text" name="city" value="<?= $adressShip[0]->city ?>" class="form-control" placeholder="city">
                                    </div> <!-- form-group// -->

                                    <div class="form-group">
                                        <input type="text" name="state" value="<?= $adressShip[0]->state ?>" class="form-control" placeholder="state">
                                    </div> <!-- form-group// -->

                                    <div class="form-group">
                                        <input type="text" name="zipcode" value="<?= $adressShip[0]->zip_code ?>" class="form-control" placeholder="zipcode">
                                    </div> <!-- form-group// -->
                                <?php else : ?>
                                    <div class="form-group">
                                        <input type="text" name="adress" class="form-control" placeholder="adress">
                                    </div> <!-- form-group// -->

                                    <div class="form-group">
                                        <input type="text" name="city" class="form-control" placeholder="city">
                                    </div> <!-- form-group// -->

                                    <div class="form-group">
                                        <input type="text" name="state" class="form-control" placeholder="state">
                                    </div> <!-- form-group// -->

                                    <div class="form-group">
                                        <input type="text" name="zipcode" class="form-control" placeholder="zipcode">
                                    </div> <!-- form-group// -->
                                <?php endif; ?>

                                <div class="form-group">

                                </div> <!-- form-group form-check .// -->
                                <?php if (isset($_GET['error'])) { ?>
                                    <span style="color: red;font-weight:bold;text-align:center;display:block;"><?= $_GET['error'] ?></span>
                                <?php } ?>
                                <div class="form-group">
                                    <?php if ($adressShip) : ?>
                                        <button type="submit" name="updateAdress" class="btn btn-primary btn-block"> Update </button>
                                    <?php else : ?>
                                        <button type="submit" name="createAdress" class="btn btn-primary btn-block"> Create </button>
                                    <?php endif; ?>
                                </div> <!-- form-group// -->
                            </form>
                        </div> <!-- card-body.// -->
                    </div> <!-- card .// -->
            </div>


    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->


    <?php require './includes/footer.php' ?>
<?php else : ?>
    <?php header('Location: /proshop/login.php') ?>
<?php endif; ?>