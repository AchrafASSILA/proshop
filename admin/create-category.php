<?php require_once './includes/header.php' ?>
<!-- start main  -->
<div class="main">
    <div class="topbar">
        <div class="toggle">
            <i class="fas fa-bars" id="toggle"></i>
        </div>
        <div class="search">
            <input type="text" placeholder="Search Here" name="search" id="" />
        </div>
        <div class="user">
            <img src="./images/user.jpg" width="150px" alt="" />
        </div>
    </div>
    <!-- start form  -->
    <section class="form" id="form">
        <div class="form-container">
            <div class="head">
                <h3>Add Category</h3>
            </div>
            <form action="./formHandling/category-form.php" method="post">
                <div class="field">
                    <label for="name">Category Name : </label> <br>
                    <input type="text" name="name" id="name" placeholder="Category Name" />
                </div>
                <div class="field">
                    <label for="description">Category Description : </label> <br> <br>
                    <textarea name="description" cols="20" rows="10" placeholder="Description"></textarea><br> <br>
                    <?php if (isset($_GET['error'])) { ?>
                        <span style="color: red;font-weight:bold;;text-align:center;display:block;"><?= $_GET['error'] ?></span>
                    <?php } ?>
                    <?php if (isset($_GET['succes'])) { ?>
                        <span style="color: #4caf50;font-weight:bold;;text-align:center;display:block;"><?= $_GET['succes'] ?></span>
                    <?php } ?>
                </div> <br>
                <input type="submit" class="btn" name="submit" value="Add" />
            </form>
        </div>
    </section>
    <!-- end form  -->
</div>
<!-- end main  -->
<?php require_once './includes/footer.php' ?>