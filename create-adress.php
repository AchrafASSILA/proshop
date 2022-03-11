<?php require_once './includes/header.php' ?>
<?php require './autoload.classes.php'; ?>

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-conten padding-y" style="min-height:84vh">

    <!-- ============================ COMPONENT LOGIN   ================================= -->
    <div class="card mx-auto" style="max-width: 380px; margin-top:100px;">
        <div class="card-body">
            <h4 class="card-title mb-4">Delivery info</h4>
            <form method="post" action="./admin/formHandling/adress.form.php">
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


                <div class="form-group">

                </div> <!-- form-group form-check .// -->
                <?php if (isset($_GET['error'])) { ?>
                    <span style="color: red;font-weight:bold;text-align:center;display:block;"><?= $_GET['error'] ?></span>
                <?php } ?>
                <div class="form-group">
                    <button type="submit" name="createAdress" class="btn btn-primary btn-block"> Checkout </button>
                </div> <!-- form-group// -->
            </form>
        </div> <!-- card-body.// -->
    </div> <!-- card .// -->

    <!-- ============================ COMPONENT LOGIN  END.// ================================= -->


</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
<?php require_once './includes/footer.php' ?>