<?php require_once './includes/header.php' ?>
<?php require './autoload.classes.php'; ?>
<!-- instanciate from category view -->
<?php $cat = new Category(); ?>
<!-- get all categories from category view  -->
<?php $categories = $cat->getCategories(); ?>
<!-- get products  -->
<?php
$paginator = new Paginator('products', 3);

?>
<?php $prod = new Product();
// $products = $prod->getProducts(null);
$products = $paginator->getObjects();
?>
<!-- displaying products and filtr by category  -->
<?php
if (isset($_GET['category']) && !empty($_GET['category'])) {
    $categoryName = $_GET['category'];
    $category = $cat->getCategoryByName($categoryName);
    $products = $prod->getProducts($category->id);
}

?>

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
                    <form action="" method="post" class="search">
                        <div class="input-group w-100">
                            <input type="text" id="search_query" class="form-control" style="width:60%;" placeholder="Search">

                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form> <!-- search-wrap .end// -->
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



<!-- ========================= SECTION PAGETOP ========================= -->
<section class="section-pagetop bg">
    <div class="container">
        <h2 class="title-page">Our Store</h2>

    </div> <!-- container //  -->
</section>
<!-- ========================= SECTION INTRO END// ========================= -->

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
    <div class="container">

        <div class="row">
            <aside class="col-md-3">

                <div class="card">
                    <article class="filter-group">
                        <header class="card-header">
                            <a href="#" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true" class="">
                                <i class="icon-control fa fa-chevron-down"></i>
                                <h6 class="title">Categories</h6>
                            </a>
                        </header>
                        <div class="filter-content collapse show" id="collapse_1">
                            <div class="card-body">

                                <ul class="list-menu">
                                    <li><a href="store.php">all</a></li>
                                    <?php foreach ($categories as $category) : ?>

                                        <li><a href="store.php?category=<?= $category->name ?>"><?= $category->name ?> </a></li>
                                    <?php endforeach; ?>
                                </ul>

                            </div> <!-- card-body.// -->
                        </div>
                    </article> <!-- filter-group  .// -->


                    <article class="filter-group">
                        <header class="card-header">
                            <a href="#" data-toggle="collapse" data-target="#collapse_3" aria-expanded="true" class="">
                                <i class="icon-control fa fa-chevron-down"></i>
                                <h6 class="title">Price range </h6>
                            </a>
                        </header>
                        <div class="filter-content collapse show" id="collapse_3">
                            <div class="card-body">

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Min</label>
                                        <!-- <input class="form-control" placeholder="$0" type="number"> -->
                                        <select class="mr-2 form-control" id="search-price-1">
                                            <option value="0">$0</option>
                                            <option value="50">$50</option>
                                            <option value="100">$100</option>
                                            <option value="150">$150</option>
                                            <option value="200">$200</option>
                                            <option value="500">$500</option>
                                            <option value="1000">$1000</option>
                                        </select>
                                    </div>
                                    <div class="form-group text-right col-md-6">
                                        <label>Max</label>
                                        <select class="mr-2 form-control" id="search-price-2">
                                            <option value="50">$50</option>
                                            <option value="100">$100</option>
                                            <option value="150">$150</option>
                                            <option value="200">$200</option>
                                            <option value="500">$500</option>
                                            <option value="1000">$1000</option>
                                            <option value="2000">$2000+</option>
                                        </select>
                                    </div>
                                </div> <!-- form-row.// -->
                                <button class="btn btn-block btn-primary" id="search-price">Apply</button>
                            </div><!-- card-body.// -->
                        </div>
                    </article> <!-- filter-group .// -->

                </div> <!-- card.// -->

            </aside> <!-- col.// -->
            <main class="col-md-9" id="product_row">

                <header class="border-bottom mb-4 pb-3">
                    <div class="form-inline">
                        <span class="mr-md-auto" id="count"><?php echo count($prod->getProducts(null)) ?> Items found </span>

                    </div>
                </header><!-- sect-heading -->

                <div class="row" id="">
                    <?php foreach ($products as $product) : ?>
                        <div class="col-md-4">
                            <figure class="card card-product-grid">
                                <div class="img-wrap">

                                    <img src="<?php echo $product->image ?>" alt="image">

                                </div> <!-- img-wrap.// -->
                                <figcaption class="info-wrap">
                                    <div class="fix-height">
                                        <a href="./single-product.php?id=<?= $product->id ?>" class="title"><?= $product->name ?></a>
                                        <div class="price-wrap mt-2">
                                            <span class="price">$<?= $product->price ?></span>
                                            <del class="price-old">$80</del>
                                        </div> <!-- price-wrap.// -->
                                    </div>

                                    <?php if (in_array($product->id, array_column($order_items, 'product'))) : ?>
                                        <button class="btn btn-block btn-success" onclick="alert('product already add')">Added to cart </button>
                                    <?php else : ?>
                                        <form action="./admin/formHandling/order-form.php" method="post">
                                            <input type="hidden" name="product_id" value="<?= $product->id ?>">
                                            <button type="submit" name="add" class="btn btn-block btn-primary"> Add to cart</button>
                                        </form>
                                    <?php endif; ?>
                                </figcaption>
                            </figure>
                        </div> <!-- col.// -->
                    <?php endforeach; ?>
                </div> <!-- row end.// -->


                <nav class="mt-4" aria-label="Page navigation sample">
                    <ul class="pagination">

                        <?php for ($i = 1; $i <= $paginator->pages; $i++) : ?>
                            <?php if ($paginator->page == $i) : ?>

                                <li class="page-item active"><a class="page-link" href="./store.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>
                            <?php else : ?>
                                <li class="page-item"><a class="page-link" href="./store.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </ul>
                </nav>

            </main> <!-- col.// -->

        </div>

    </div> <!-- container .//  -->
</section>
<script>
    $(document).ready(function() {
        $('#search_query').keypress(function() {
            $.ajax({
                type: 'POST',
                url: './search/search.php',
                data: {
                    name: $("#search_query").val(),
                    id: <?php echo $_SESSION['customer_id'] ?>,
                },
                success: function(data) {
                    $('#product_row').html(data);

                }
            })
        })
    })
    $(document).ready(function() {
        $('#search-price ').click(function() {
            $.ajax({
                type: 'POST',
                url: 'search/search-price.php',
                data: {
                    first_option: $("#search-price-1").val(),
                    second_option: $("#search-price-2").val(),
                    id: <?php echo $_SESSION['customer_id'] ?>,
                },
                success: function(data) {
                    $('#product_row').html(data);

                }
            })
        })
    })
</script>
<!-- === === === === === === === === = SECTION CONTENT END / / === === === === === === === === = -- >
        <?php require_once './includes/footer.php' ?>