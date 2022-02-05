<?php require_once '../autoload.classes.php' ?>
<!-- instanciate from category view -->
<?php $cat = new CategoryView(); ?>
<!-- get all categories from category view  -->
<?php $categories = $cat->getAllCategories(); ?>

<!-- start main  -->
<?php require_once './includes/header.php' ?>
<div class="main">
    <div class="topbar">
        <div class="toggle">
            <i class="fas fa-bars" id="toggle"></i>
        </div>
        <div class="search">
            <input type="text" placeholder="Search Here" name="search" id="" />
        </div>
        <div class="user">
            <img src="./public/images/user.jpg" width="150px" alt="" />
        </div>
    </div>
    <!-- start form  -->
    <section class="form" id="form">
        <div class="form-container">
            <div class="head">
                <h3>Add Product</h3>
            </div>
            <form action="./formHandling/product-form.php" method="post" enctype="multipart/form-data">
                <div class="field">
                    <label for="name">Product Name : </label> <br>
                    <input type="text" name="name" id="name" placeholder="Product Name" />
                </div>

                <div class="field">
                    <label for="price">price : </label> <br>
                    <input type="number" step="0.01" name="price" id="price" placeholder="Product Price" />
                </div>
                <div class="field">
                    <label for="stock">Stock : </label> <br>
                    <input type="number" name="stock" id="stock" placeholder="Product Stock" />
                </div>
                <div class="field">
                    <label for="description">Product Description : </label> <br> <br>
                    <textarea name="description" cols="20" rows="10" placeholder="Description"></textarea>
                </div> <br>
                <div class="field">
                    <label for="image">Product Image : </label> <br>
                    <input type="file" name="image" id="image" placeholder="Product Image" />
                </div>
                <div class="field">
                    <label for="categories">Choose a category:</label><br><br>

                    <select name="category" id="categories">
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?= $category->id ?>"><?= $category->name ?></option>
                        <?php endforeach; ?>
                    </select><br><br>

                    <?php if (isset($_GET['error'])) { ?>
                        <span style="color: red;font-weight:bold;;text-align:center;display:block;"><?= $_GET['error'] ?></span>
                    <?php } ?>
                    <?php if (isset($_GET['succes'])) { ?>
                        <span style="color: #4caf50;font-weight:bold;;text-align:center;display:block;"><?= $_GET['succes'] ?></span>
                    <?php } ?>
                </div>
                <input type="submit" class="btn" name="submit" value="Add Product" />
            </form>
        </div>
    </section>
    <!-- end form  -->
</div>
<!-- end main  -->
<?php require_once './includes/footer.php' ?>