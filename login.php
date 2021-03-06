<?php require_once './includes/header.php' ?>
<?php if (isset($_SESSION['customer_username']) && isset($_SESSION['customer_id'])) {
    header('Location: /proshop/store.php');
} else { ?>
    <!-- ========================= SECTION CONTENT ========================= -->
    <section class="section-conten padding-y" style="min-height:84vh">

        <!-- ============================ COMPONENT LOGIN   ================================= -->
        <div class="card mx-auto" style="max-width: 380px; margin-top:100px;">
            <div class="card-body">
                <h4 class="card-title mb-4">Sign in</h4>
                <form method="post" enctype="multipart/form-data" action="./admin/formHandling/authentication-handl.php">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="username">
                    </div> <!-- form-group// -->
                    <div class="form-group">
                        <input type="password" name=password class="form-control" placeholder="Password">
                    </div> <!-- form-group// -->

                    <div class="form-group">
                        <a href="#" class="float-right">Forgot password?</a>

                    </div> <!-- form-group form-check .// -->
                    <?php if (isset($_GET['error'])) { ?>
                        <span style="color: red;font-weight:bold;text-align:center;display:block;"><?= $_GET['error'] ?></span>
                    <?php } ?>
                    <div class="form-group">
                        <button type="submit" name="login" class="btn btn-primary btn-block"> Login </button>
                    </div> <!-- form-group// -->
                </form>
            </div> <!-- card-body.// -->
        </div> <!-- card .// -->

        <p class="text-center mt-4">Don't have account? <a href="./register.php">Sign up</a></p>
        <br><br>
        <!-- ============================ COMPONENT LOGIN  END.// ================================= -->


    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->
    <?php require_once './includes/footer.php' ?>
<?php } ?>