<?php require_once './includes/header.php' ?>
<?php require './autoload.classes.php' ?>
<?php
$obj = new CategoryView();
$categories = $obj->getAllCategories();

?>
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
                            <?php foreach ($categories as $category) : ?>
                                <a class="dropdown-item" href="store.php?category=<?php echo $category->name ?>"><?php echo $category->name ?> </a>
                            <?php endforeach; ?>
                        </div>
                    </div> <!-- category-wrap.// -->
                </div> <!-- col.// -->
                <a href="./store.html" class="btn btn-outline-primary">Store</a>
                <div class="col-lg  col-md-6 col-sm-12 col">
                    <form action="#" class="search">
                        <div class="input-group w-100">
                            <input type="text" class="form-control" style="width:60%;" placeholder="Search">

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
                            <small class="title text-muted">Welcome guest!</small>
                            <div>
                                <a href="./signin.html">Sign in</a> <span class="dark-transp"> | </span>
                                <a href="./register.html"> Register</a>
                            </div>
                        </div>
                        <a href="./cart.html" class="widget-header pl-3 ml-3">
                            <div class="icon icon-sm rounded-circle border"><i class="fa fa-shopping-cart"></i></div>
                            <span class="badge badge-pill badge-danger notify">0</span>
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
                                    <?php foreach ($categories as $category) : ?>

                                        <li><a href="store.php?category<?= $category->name ?>"><?= $category->name ?> </a></li>
                                    <?php endforeach; ?>
                                </ul>

                            </div> <!-- card-body.// -->
                        </div>
                    </article> <!-- filter-group  .// -->
                    <article class="filter-group">
                        <header class="card-header">
                            <a href="#" data-toggle="collapse" data-target="#collapse_4" aria-expanded="true" class="">
                                <i class="icon-control fa fa-chevron-down"></i>
                                <h6 class="title">Sizes </h6>
                            </a>
                        </header>
                        <div class="filter-content collapse show" id="collapse_4">
                            <div class="card-body">
                                <label class="checkbox-btn">
                                    <input type="checkbox">
                                    <span class="btn btn-light"> XS </span>
                                </label>

                                <label class="checkbox-btn">
                                    <input type="checkbox">
                                    <span class="btn btn-light"> SM </span>
                                </label>

                                <label class="checkbox-btn">
                                    <input type="checkbox">
                                    <span class="btn btn-light"> LG </span>
                                </label>

                                <label class="checkbox-btn">
                                    <input type="checkbox">
                                    <span class="btn btn-light"> XXL </span>
                                </label>
                            </div><!-- card-body.// -->
                        </div>
                    </article> <!-- filter-group .// -->

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
                                        <select class="mr-2 form-control">
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
                                        <select class="mr-2 form-control">
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
                                <button class="btn btn-block btn-primary">Apply</button>
                            </div><!-- card-body.// -->
                        </div>
                    </article> <!-- filter-group .// -->

                </div> <!-- card.// -->

            </aside> <!-- col.// -->
            <main class="col-md-9">

                <header class="border-bottom mb-4 pb-3">
                    <div class="form-inline">
                        <span class="mr-md-auto">32 Items found </span>

                    </div>
                </header><!-- sect-heading -->

                <div class="row">
                    <div class="col-md-4">
                        <figure class="card card-product-grid">
                            <div class="img-wrap">

                                <img src="images/items/1.jpg">

                            </div> <!-- img-wrap.// -->
                            <figcaption class="info-wrap">
                                <div class="fix-height">
                                    <a href="./product-detail.html" class="title">Great item name goes here</a>
                                    <div class="price-wrap mt-2">
                                        <span class="price">$1280</span>
                                        <del class="price-old">$1980</del>
                                    </div> <!-- price-wrap.// -->
                                </div>
                                <a href="#" class="btn btn-block btn-success">Added to cart </a>
                            </figcaption>
                        </figure>
                    </div> <!-- col.// -->

                    <div class="col-md-4">
                        <figure class="card card-product-grid">
                            <div class="img-wrap">
                                <img src="images/items/2.jpg">

                            </div> <!-- img-wrap.// -->
                            <figcaption class="info-wrap">
                                <div class="fix-height">
                                    <a href="./product-detail.html" class="title">Product name goes here just for demo item</a>
                                    <div class="price-wrap mt-2">
                                        <span class="price">$1280</span>
                                    </div> <!-- price-wrap.// -->
                                </div>
                                <a href="#" class="btn btn-block btn-primary">Add to cart </a>
                            </figcaption>
                        </figure>
                    </div> <!-- col.// -->

                    <div class="col-md-4">
                        <figure class="card card-product-grid">
                            <div class="img-wrap">
                                <img src="images/items/3.jpg">

                            </div> <!-- img-wrap.// -->
                            <figcaption class="info-wrap">
                                <div class="fix-height">
                                    <a href="./product-detail.html" class="title">Product name goes here just for demo item</a>
                                    <div class="price-wrap mt-2">
                                        <span class="price">$1280</span>
                                    </div> <!-- price-wrap.// -->
                                </div>
                                <a href="#" class="btn btn-block btn-primary">Add to cart </a>
                            </figcaption>
                        </figure>
                    </div> <!-- col.// -->

                    <div class="col-md-4">
                        <figure class="card card-product-grid">
                            <div class="img-wrap">
                                <img src="images/items/4.jpg">

                            </div> <!-- img-wrap.// -->
                            <figcaption class="info-wrap">
                                <div class="fix-height">
                                    <a href="./product-detail.html" class="title">Product name goes here just for demo item</a>
                                    <div class="price-wrap mt-2">
                                        <span class="price">$1280</span>
                                    </div> <!-- price-wrap.// -->
                                </div>
                                <a href="#" class="btn btn-block btn-primary">Add to cart </a>
                            </figcaption>
                        </figure>
                    </div> <!-- col.// -->

                    <div class="col-md-4">
                        <figure class="card card-product-grid">
                            <div class="img-wrap">
                                <img src="images/items/5.jpg">

                            </div> <!-- img-wrap.// -->
                            <figcaption class="info-wrap">
                                <div class="fix-height">
                                    <a href="./product-detail.html" class="title">Product name goes here just for demo item</a>
                                    <div class="price-wrap mt-2">
                                        <span class="price">$1280</span>
                                    </div> <!-- price-wrap.// -->
                                </div>
                                <a href="#" class="btn btn-block btn-primary">Add to cart </a>
                            </figcaption>
                        </figure>
                    </div> <!-- col.// -->

                    <div class="col-md-4">
                        <figure class="card card-product-grid">
                            <div class="img-wrap">
                                <img src="images/items/6.jpg">

                            </div> <!-- img-wrap.// -->
                            <figcaption class="info-wrap">
                                <div class="fix-height">
                                    <a href="./product-detail.html" class="title">Product name goes here just for demo item</a>
                                    <div class="price-wrap mt-2">
                                        <span class="price">$1280</span>
                                    </div> <!-- price-wrap.// -->
                                </div>
                                <a href="#" class="btn btn-block btn-primary">Add to cart </a>
                            </figcaption>
                        </figure>
                    </div> <!-- col.// -->

                    <div class="col-md-4">
                        <figure class="card card-product-grid">
                            <div class="img-wrap">
                                <img src="images/items/7.jpg">

                            </div> <!-- img-wrap.// -->
                            <figcaption class="info-wrap">
                                <div class="fix-height">
                                    <a href="./product-detail.html" class="title">Product name goes here just for demo item</a>
                                    <div class="price-wrap mt-2">
                                        <span class="price">$1280</span>
                                    </div> <!-- price-wrap.// -->
                                </div>
                                <a href="#" class="btn btn-block btn-primary">Add to cart </a>
                            </figcaption>
                        </figure>
                    </div> <!-- col.// -->

                    <div class="col-md-4">
                        <figure class="card card-product-grid">
                            <div class="img-wrap">
                                <img src="images/items/1.jpg">

                            </div> <!-- img-wrap.// -->
                            <figcaption class="info-wrap">
                                <div class="fix-height">
                                    <a href="./product-detail.html" class="title">Product name goes here just for demo item</a>
                                    <div class="price-wrap mt-2">
                                        <span class="price">$1280</span>
                                    </div> <!-- price-wrap.// -->
                                </div>
                                <a href="#" class="btn btn-block btn-primary">Add to cart </a>
                            </figcaption>
                        </figure>
                    </div> <!-- col.// -->
                </div> <!-- row end.// -->


                <nav class="mt-4" aria-label="Page navigation sample">
                    <ul class="pagination">
                        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>

            </main> <!-- col.// -->

        </div>

    </div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
<?php require_once './includes/footer.php' ?>