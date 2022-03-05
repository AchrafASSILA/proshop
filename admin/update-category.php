<?php require_once './includes/header.php' ?>
<?php require_once './autoload.class.php' ?>


<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <!-- <h4 class="card-title">Basic form elements</h4>
            <p class="card-description">
                Basic form elements
            </p> -->
            <form class="forms-sample" action="../admin/formHandling/category-form.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Category Name:</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Category Name">
                </div>
                <div class="form-group">
                    <label for="description">Category Description : </label> <br> <br>
                    <textarea class="form-control" name="description" rows="4" placeholder="Description"></textarea>
                </div>

                <div class="form-group">
                    <?php if (isset($_GET['error'])) : ?>
                        <span style="color: red;font-weight:bold;;text-align:center;display:block;"><?= $_GET['error'] ?></span>
                    <?php endif; ?>
                    <?php if (isset($_GET['succes'])) : ?>
                        <span style="color: #4caf50;font-weight:bold;;text-align:center;display:block;"><?= $_GET['succes'] ?></span>
                    <?php endif; ?>
                </div>
                <button type="submit" name="submit" class="btn btn-primary me-2">Submit</button>
                <!-- <button class="btn btn-light">Cancel</button> -->
            </form>
        </div>
    </div>
</div>
<?php require_once './includes/footer.php' ?>