<?php session_start();
if (isset($_SESSION['admin_username'])) {
    header('Location: ./index.php');
} else { ?>
    <!DOCTYPE HTML>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="pragma" content="no-cache" />
        <meta http-equiv="cache-control" content="max-age=604800" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>GreatKart | One of the Biggest Online Shopping Platform</title>

        <link href="../public/images/favicon.ico" rel="shortcut icon" type="image/x-icon">

        <!-- jQuery -->
        <script src="../public/js/jquery-2.0.0.min.js" type="text/javascript"></script>

        <!-- Bootstrap4 files-->
        <script src="../public/js/bootstrap.bundle.min.js" type="text/javascript"></script>
        <link href="../public/css/bootstrap.css" rel="stylesheet" type="text/css" />

        <!-- Font awesome 5 -->
        <link href="../public/fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">

        <!-- custom style -->
        <link href="../public/css/ui.css" rel="stylesheet" type="text/css" />
        <link href="../public/css/responsive.css" rel="stylesheet" media="only screen and (max-width: 1200px)" />

        <!-- custom javascript -->
        <script src="../public/js/script.js" type="text/javascript"></script>

        <script type="text/javascript">
            /// some script

            // jquery ready start
            $(document).ready(function() {
                // jQuery code

            });
            // jquery end
        </script>

    </head>

    <body>






        <!-- ========================= SECTION CONTENT ========================= -->
        <section class="section-conten padding-y" style="min-height:84vh">

            <!-- ============================ COMPONENT LOGIN   ================================= -->
            <div class="card mx-auto" style="max-width: 380px; margin-top:100px;">
                <div class="card-body">
                    <h4 class="card-title mb-4">Sign in</h4>
                    <form action="./formHandling/login-form.php" method="post">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Username Address">
                        </div> <!-- form-group// -->
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <?php if (isset($_GET['error'])) { ?>
                                <span style="color: red;font-weight:bold;;text-align:center;display:block;"><?= $_GET['error'] ?></span>
                            <?php } ?>
                        </div> <!-- form-group// -->

                        <!-- <div class="form-group">
                        <a href="#" class="float-right">Forgot password?</a>

                    </div> form-group form-check .// -->
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary btn-block"> Login </button>
                        </div> <!-- form-group// -->
                    </form>
                </div> <!-- card-body.// -->
            </div> <!-- card .// -->

            <!-- <p class="text-center mt-4">Don't have account? <a href="#">Sign up</a></p> -->
            <br><br>
            <!-- ============================ COMPONENT LOGIN  END.// ================================= -->


        </section>
        <!-- ========================= SECTION CONTENT END// ========================= -->


        <!-- ========================= FOOTER ========================= -->
        <!-- <footer class="section-footer border-top padding-y">
        <div class="container">
            <p class="float-md-right">
                &copy Copyright 2019 All rights reserved
            </p>
            <p>
                <a href="#">Terms and conditions</a>
            </p>
        </div>
        
    </footer> -->
        <!-- ========================= FOOTER END // ========================= -->



    </body>

    </html>
<?php } ?>