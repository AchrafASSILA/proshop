<?php require_once './includes/header.php' ?>
<?php require './autoload.classes.php'; ?>

<!-- instanciate order  -->
<?php $order = new Order() ?>
<!-- get all order items  -->
<?php $order_items = $order->getOrderItems() ?>
<!-- total  -->
<?php $total = 0 ?>
<?php $tax = 0 ?>
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



		<!-- ============================ COMPONENT 2 ================================= -->
		<div class="row">
			<main class="col-md-8">

				<article class="card mb-4">
					<div class="card-body">
						<h4 class="card-title mb-4">Review cart</h4>
						<div class="row">
							<?php foreach ($order_items as $order_item) : ?>
								<?php $product_obj = new Product() ?>
								<?php $product = $product_obj->getSingleProduct($order_item->product) ?>
								<?php $total += ($order_item->quantity * $product->price) ?>

								<div class="col-md-6">
									<figure class="itemside  mb-4">
										<div class="aside"><img src="<?= $product->image ?>" class="border img-sm"></div>
										<figcaption class="info">
											<p><?= $product->name ?> </p>
											<span class="text-muted"><?= $order_item->quantity ?>x = $<?= $order_item->quantity * $product->price ?> </span>
										</figcaption>
									</figure>
								</div> <!-- col.// -->

							<?php endforeach; ?>
						</div> <!-- row.// -->
					</div> <!-- card-body.// -->
				</article> <!-- card.// -->





				<article class="card mb-4">
					<div class="card-body">
						<h4 class="card-title mb-4">Delivery info</h4>
						<form action="">


							<div class="row">
								<div class="form-group col-sm-6">
									<label>Country*</label>
									<select name="" class="form-control">
										<option value="">India</option>
										<option value="">United States</option>
										<option value="">France</option>
										<option value="">Italy</option>
									</select>
								</div>
								<div class="form-group col-sm-6">
									<label>State*</label>
									<input type="text" placeholder="Type here" class="form-control">
								</div>
								<div class="form-group col-sm-8">
									<label>Street*</label>
									<input type="text" placeholder="Type here" class="form-control">
								</div>
								<div class="form-group col-sm-4">
									<label>Building</label>
									<input type="text" placeholder="" class="form-control">
								</div>
								<div class="form-group col-sm-4">
									<label>House</label>
									<input type="text" placeholder="Type here" class="form-control">
								</div>
								<div class="form-group col-sm-4">
									<label>Postal code</label>
									<input type="text" placeholder="" class="form-control">
								</div>
								<div class="form-group col-sm-4">
									<label>Zip</label>
									<input type="text" placeholder="" class="form-control">
								</div>
							</div> <!-- row.// -->
						</form>
					</div> <!-- card-body.// -->
				</article> <!-- card.// -->


				<article class="accordion" id="accordion_pay">
					<!-- <div class="card">
						<header class="card-header">
							<img src="./public/images/misc/payment-paypal.png" class="float-right" height="24">
							<label class="form-check collapsed" data-toggle="collapse" data-target="#pay_paynet">
								<input class="form-check-input" name="payment-option" checked type="radio" value="option2">
								<h6 class="form-check-label">
									Paypal
								</h6>
							</label>
						</header>
						<div id="pay_paynet" class="collapse show" data-parent="#accordion_pay">
							<div class="card-body">
								<p class="text-center text-muted">Connect your PayPal account and use it to pay your bills. You'll be redirected to PayPal to add your billing information.</p>
								<p class="text-center">
									<a href="#"><img src="./public/images/misc/btn-paypal.png" height="32"></a>
									<br><br>
								</p>
							</div> 
						</div> 
					</div>  -->
					<div class="card">
						<header class="card-header">
							<img src="./public/images/misc/payment-card.png" class="float-right" height="24">
							<label class="form-check" data-toggle="collapse" data-target="#pay_payme">
								<input class="form-check-input" name="payment-option" type="radio" value="Cash_on_delivery">
								<h6 class="form-check-label"> Cash on delivery </h6>
							</label>
						</header>
						<!-- <div id="pay_payme" class="collapse" data-parent="#accordion_pay"> -->
						<!-- <div class="card-body"> -->
						<!-- <p class="alert alert-success">Some information or instruction</p> -->
						<!-- <form class="form-inline">
									<input type="text" class="form-control mr-2" placeholder="xxxx-xxxx-xxxx-xxxx" name="">
									<input type="text" class="form-control mr-2" style="width: 100px" placeholder="dd/yy" name="">
									<input type="number" maxlength="3" class="form-control mr-2" style="width: 100px" placeholder="cvc" name="">
									<button class="btn btn btn-success">Button</button>
								</form> -->
						<!-- </div> card body .// -->
						<!-- </div> collapse .// -->
					</div> <!-- card.// -->

				</article>
				<!-- accordion end.// -->

			</main> <!-- col.// -->
			<aside class="col-md-4">
				<div class="card">
					<div class="card-body">
						<dl class="dlist-align">
							<dt>Total price:</dt>
							<dd class="text-right">$<?= $total ?></dd>
						</dl>
						<dl class="dlist-align">
							<dt>Tax:</dt>
							<dd class="text-right"> $0.00</dd>
						</dl>
						<dl class="dlist-align">
							<dt>Total:</dt>
							<dd class="text-right text-dark b"><strong>$<?= $total + $tax ?></strong></dd>
						</dl>
						<hr>
						<p class="text-center mb-3">
							<img src="./public/images/misc/payments.png" height="26">
						</p>
						<a href="./place-order.html" class="btn btn-primary btn-block"> Place Order </a>

					</div> <!-- card-body.// -->
				</div> <!-- card.// -->
			</aside> <!-- col.// -->
		</div> <!-- row.// -->

		<!-- ============================ COMPONENT 2 END//  ================================= -->




	</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->


<!-- ========================= SECTION CONTENT END// ========================= -->
</body>

</html>