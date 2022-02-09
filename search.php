<?php

require_once './classes/db.class.php';
$db = new Db();
$sql = "select  * from products where name like '%" .  $_POST['name']  . "%'";
$statement = $db->connect()->prepare($sql);
$statement->execute([]);
$products = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<main class="col-md-9" id="product_row" style="max-width: 100%;">

    <header class="border-bottom mb-4 pb-3">
        <div class="form-inline">
            <span class="mr-md-auto" id="count"><?php echo count($products) ?> Items found </span>

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
                        <a href="#" class="btn btn-block btn-primary">Add to cart </a>
                    </figcaption>
                </figure>
            </div> <!-- col.// -->
        <?php endforeach; ?>
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