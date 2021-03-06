<?php session_start(); ?>
<?php if (isset($_SESSION['admin_username'])) : ?>
    <?php require_once './autoload.class.php' ?>
    <!-- instanciate from category view -->
    <?php $cat = new Category(); ?>
    <!-- get all categories from category view  -->
    <?php $categories = $cat->getCategories(); ?>

    <!-- check if there valid id in adresse libk  -->
    <?php if (!isset($_GET['id']) || empty($_GET['id'])) header('Location: ./index.php') ?>
    <?php
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // instanciated 
    $obj = new Product();

    // get product 
    $product = $obj->getSingleProduct($id);

    // check if the product in db 
    if ($product) :
    ?>

        <?php require_once './includes/header.php' ?>
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Basic form elements</h4>
                    <p class="card-description">
                        Basic form elements
                    </p>
                    <form class="forms-sample" action="../admin/formHandling/product-form.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Product Name:</label>
                            <input type="text" value="<?= $product->name ?>" class="form-control" name="name" id="name" placeholder="Product Name">
                        </div>
                        <div class="form-group">
                            <label for="price">price : </label> <br>
                            <input type="number" value="<?= $product->price ?>" class="form-control" step="0.01" name="price" id="price" placeholder="Product Price" />
                        </div>
                        <div class="form-group">
                            <label for="stock">Stock : </label> <br>
                            <input type="number" value="<?= $product->stock ?>" class="form-control" name="stock" id="stock" placeholder="Product Stock" />
                        </div>
                        <div class="form-group">
                            <label for="description">Product Description : </label> <br> <br>
                            <textarea class="form-control" name="description" rows="4" placeholder="Description"><?= $product->description ?></textarea>

                        </div>
                        <div class="form-group">
                            <label>File upload</label>
                            <input type="file" name="image" id="image" placeholder="Product Image" class="form-control">


                        </div>
                        <div class="form-group">
                            <label for="categories">Choose a category:</label><br><br>
                            <select class="form-control" name="category" id="categories">
                                <?php foreach ($categories as $category) : ?>
                                    <option value="<?= $category->id ?>"><?= $category->name ?></option>
                                <?php endforeach; ?>
                            </select><br><br>
                            <?php if (isset($_GET['error'])) { ?>
                                <span style="color: red;font-weight:bold;;text-align:center;display:block;"><?= $_GET['error'] ?></span>
                            <?php } ?>
                            <?php if (isset($_GET['succes'])) { ?>
                                <span style="color: #4caf50;font-weight:bold;;text-align:center;display:block;"><?= $_GET['succes'] ?></span>
                            <?php }
                            ?>
                        </div>
                        <input type="hidden" name="id" value="<?= $product->id ?>">
                        <button type="submit" class="btn btn-primary me-2" name="edit">Update Product</button>
                        <!-- <button class="btn btn-light">Cancel</button> -->
                    </form>
                </div>
            </div>
        </div>
        <?php require_once './includes/footer.php' ?>
    <?php else :
        header('Location: ./products.php');
    endif; ?>
<?php else :
    header('Location: ./login.php');
endif; ?>