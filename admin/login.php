<?php session_start();
if (isset($_SESSION['admin_username'])) :
    header('Location: ./index.php');
else :  ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Star Admin2 </title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="./public/vendors/feather/feather.css">
        <link rel="stylesheet" href="./public/vendors/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="./public/vendors/ti-icons/css/themify-icons.css">
        <link rel="stylesheet" href="./public/vendors/typicons/typicons.css">
        <link rel="stylesheet" href="./public/vendors/simple-line-icons/css/simple-line-icons.css">
        <link rel="stylesheet" href="./public/vendors/css/vendor.bundle.base.css">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="./public/css/vertical-layout-light/style.css">
        <!-- endinject -->
        <link rel="shortcut icon" href="./public/images/favicon.png" />
    </head>

    <body>
        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper full-page-wrapper">
                <div class="content-wrapper d-flex align-items-center auth px-0">
                    <div class="row w-100 mx-0">
                        <div class="col-lg-4 mx-auto">
                            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                                <div class="brand-logo">
                                    <img src="./public/images/logo.svg" alt="logo">
                                </div>
                                <h4>Hello! let's get started</h4>
                                <h6 class="fw-light">Sign in to continue.</h6>
                                <form class="pt-3" action="./formHandling/login-form.php" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-lg" name="username" id="username" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Password">
                                        <?php if (isset($_GET['error'])) { ?>
                                            <span style="color: red;font-weight:bold;;text-align:center;display:block;"><?= $_GET['error'] ?></span>
                                        <?php } ?>
                                    </div>
                                    <div class="mt-3">
                                        <button type="submit" name="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"> Login</button>
                                    </div>
                                    <!-- <div class="my-2 d-flex justify-content-between align-items-center">
                                        <div class="form-check">
                                            <label class="form-check-label text-muted">
                                                <input type="checkbox" class="form-check-input">
                                                Keep me signed in
                                            </label>
                                        </div>
                                        <a href="#" class="auth-link text-black">Forgot password?</a>
                                    </div>
                                    <div class="mb-2">
                                        <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                                            <i class="ti-facebook me-2"></i>Connect using facebook
                                        </button>
                                    </div>
                                    <div class="text-center mt-4 fw-light">
                                        Don't have an account? <a href="register.html" class="text-primary">Create</a>
                                    </div> -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="./public/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="./public/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="./public/js/off-canvas.js"></script>
        <script src="./public/js/hoverable-collapse.js"></script>
        <script src="./public/js/template.js"></script>
        <script src="./public/js/settings.js"></script>
        <script src="./public/js/todolist.js"></script>
        <!-- endinject -->
    </body>

    </html>
<?php endif; ?>