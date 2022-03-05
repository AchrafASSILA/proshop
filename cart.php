<?php require_once './includes/header.php' ?>
<?php require './autoload.classes.php'; ?>
<!-- instanciate order  -->
<?php $order = new Order() ?>
<!-- get all order items  -->
<?php $order_items = $order->getOrderItems() ?>
<!-- total  -->
<?php $total = 0 ?>
<?php $tax = 0 ?>
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
                        <a class="dropdown-item" href="#">Machinery / Mechanical Parts / Tools </a>
                        <a class="dropdown-item" href="#">Consumer Electronics / Home Appliances </a>
                        <a class="dropdown-item" href="#">Auto / Transportation</a>
                        <a class="dropdown-item" href="#">Apparel / Textiles / Timepieces </a>
                        <a class="dropdown-item" href="#">Home & Garden / Construction / Lights </a>
                        <a class="dropdown-item" href="#">Beauty & Personal Care / Health </a>
                    </div>
                </div> <!-- category-wrap.// -->
            </div> <!-- col.// -->
            <a href="./store.php" class="btn btn-outline-primary">Store</a>
            <div class="col-lg  col-md-6 col-sm-12 col">

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


<section class="section-content padding-y bg">
    <div class="container">

        <!-- ============================ COMPONENT 1 ================================= -->

        <div class="row">
            <aside class="col-lg-9">
                <div class="card">
                    <table class="table table-borderless table-shopping-cart">
                        <thead class="text-muted">
                            <tr class="small text-uppercase">
                                <th scope="col">Product</th>
                                <th scope="col" width="120">Quantity</th>
                                <th scope="col" width="120">Price</th>
                                <th scope="col" class="text-right" width="200"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($order_items as $order_item) : ?>
                                <?php $product_obj = new Product() ?>
                                <?php $product = $product_obj->getSingleProduct($order_item->product) ?>
                                <?php $total += ($order_item->quantity * $product->price) ?>
                                <tr>
                                    <td>
                                        <figure class="itemside align-items-center">
                                            <div class="aside"><img src="<?= $product->image ?>" class="img-sm"></div>
                                            <figcaption class="info">
                                                <a href="#" class="title text-dark"><?= $product->name ?></a>
                                                <p class="text-muted small"><?= $product->description ?></p>
                                            </figcaption>
                                        </figure>
                                    </td>
                                    <td>
                                        <!-- col.// -->
                                        <div class="col">
                                            <div class="input-group input-spinner">
                                                <form action="./admin/formHandling/order-form.php" method="post">
                                                    <div class="input-group-prepend">
                                                        <input type="hidden" name="product_quantity" value="<?= $order_item->quantity ?>">
                                                        <input type="hidden" name="product_id" value="<?= $order_item->product ?>">
                                                        <button class="btn btn-light" type="submit" name="decrement" id="button-plus"> <i class="fa fa-minus"></i> </button>
                                                    </div>
                                                </form>
                                                <input type="text" class="form-control" value="<?= $order_item->quantity ?>">
                                                <div class="input-group-append">
                                                    <form action="./admin/formHandling/order-form.php" method="post">
                                                        <input type="hidden" name="product_quantity" value="<?= $order_item->quantity ?>">
                                                        <input type="hidden" name="product_id" value="<?= $order_item->product ?>">
                                                        <button class="btn btn-light" name="increment" type="submit" id="button-minus"> <i class="fa fa-plus"></i> </button>
                                                    </form>
                                                </div>
                                            </div> <!-- input-group.// -->
                                        </div> <!-- col.// -->
                                    </td>
                                    <td>
                                        <div class="price-wrap">
                                            <var class="price">$<?= $order_item->quantity * $product->price ?></var>
                                            <small class="text-muted"> $<?= $product->price ?> each </small>
                                        </div> <!-- price-wrap .// -->
                                    </td>
                                    <td class="text-right">
                                        <form action="./admin/formHandling/order-form.php" method="post">
                                            <input type="hidden" name="product_id" value="<?= $order_item->product ?>">
                                            <button type="submit" name="remove" class="btn btn-danger"> Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div> <!-- card.// -->

            </aside> <!-- col.// -->
            <aside class="col-lg-3">

                <div class="card">
                    <div class="card-body">
                        <dl class="dlist-align">
                            <dt>Total price:</dt>
                            <dd class="text-right">$<?= $total ?></dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Tax:</dt>
                            <dd class="text-right"> $<?= $tax ?></dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Total:</dt>
                            <dd class="text-right text-dark b"><strong>$<?= $total + $tax ?></strong></dd>
                        </dl>
                        <hr>
                        <p class="text-center mb-3">
                            <img src="./public/images/misc/payments.png" height="26">
                        </p>
                        <a href="./place-order.php" class="btn btn-primary btn-block"> Checkout </a>
                        <a href="./store.php" class="btn btn-light btn-block">Continue Shopping</a>
                    </div> <!-- card-body.// -->
                </div> <!-- card.// -->

            </aside> <!-- col.// -->


        </div> <!-- row.// -->
        <!-- ============================ COMPONENT 1 END .// ================================= -->

    </div> <!-- container .//  -->
</section>
<?php require_once './includes/footer.php' ?>