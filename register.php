<?php require_once './includes/header.php' ?>
<?php if (isset($_SESSION['customer_username']) && isset($_SESSION['customer_id'])) {
    header('Location: /proshop/store.php');
} else { ?>
    <!-- ========================= SECTION CONTENT ========================= -->
    <section class="section-content padding-y">

        <!-- ============================ COMPONENT REGISTER   ================================= -->
        <div class="card mx-auto" style="max-width:520px; margin-top:40px;">
            <article class="card-body">
                <header class="mb-4">
                    <h4 class="card-title">Sign up</h4>
                </header>
                <form method="post" enctype="multipart/form-data" action="./admin/formHandling/authentication-handl.php">
                    <div class="form-row">
                        <div class="col form-group">
                            <label>First name</label>
                            <input type="text" name="first_name" class="form-control" placeholder="">
                        </div> <!-- form-group end.// -->
                        <div class="col form-group">
                            <label>Last name</label>
                            <input type="text" name="last_name" class="form-control" placeholder="">
                        </div> <!-- form-group end.// -->
                    </div> <!-- form-row end.// -->
                    <div class="form-group">
                        <label>Tel</label>
                        <input type="text" name="tel" class="form-control" placeholder="">
                    </div> <!-- form-group end.// -->
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="">
                    </div> <!-- form-group end.// -->

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Create password</label>
                            <input class="form-control" name="password" type="password">
                        </div> <!-- form-group end.// -->
                        <div class="form-group col-md-6">
                            <label>Repeat password</label>
                            <input class="form-control" name="password2" type="password">
                        </div> <!-- form-group end.// -->
                    </div>
                    <?php if (isset($_GET['error'])) { ?>
                        <span style="color: red;font-weight:bold;text-align:center;display:block;"><?= $_GET['error'] ?></span>
                    <?php } ?>
                    <div class="form-group">
                        <button type="submit" name="register" class="btn btn-primary btn-block"> Register </button>
                    </div> <!-- form-group// -->

                </form>
            </article><!-- card-body.// -->
        </div> <!-- card .// -->
        <p class="text-center mt-4">Have an account? <a href="./login.php">Log In</a></p>
        <br><br>
        <!-- ============================ COMPONENT REGISTER  END.// ================================= -->


    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->
    <?php require_once './includes/footer.php' ?>\
<?php } ?>