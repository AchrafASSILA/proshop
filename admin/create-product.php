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
                <h3>Add Developer</h3>
            </div>
            <form action="">
                <div class="field">
                    <input type="text" name="name" placeholder="Full Name" />
                </div>
                <div class="field">
                    <input type="email" name="email" placeholder="Email" />
                </div>
                <div class="field">
                    <textarea name="message" cols="20" rows="10" placeholder="Description"></textarea>
                </div>
                <input type="submit" class="btn" value="Add" />
            </form>
        </div>
    </section>
    <!-- end form  -->
</div>
<!-- end main  -->
<?php require_once './includes/footer.php' ?>