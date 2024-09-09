
<?php

include "../master/header.php";

?>


<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Settings Page</h1>
        </div>
    </div>
</div>


<div class="row">
    <!-- name update start -->
    <div class="col-md-6">
        <div class="card" style="overflow-y: scroll; height: 250px;">
            <div class="card-header">
                USER-NAME
            </div>
            <div class="card-body">
                <form action="update.php" method="post">
                    <div class="example-content">
                        <label for="exampleInputEmail1" class="form-label">UserName</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                        <!-- name error start -->
                        <?php if (isset($_SESSION["name_error"])) :
                        ?>
                            <div id="emailHelp" class="form-text text-danger fs-6 mt-3"><?= $_SESSION["name_error"] ?></div>
                        <?php endif;
                        unset($_SESSION["name_error"]); ?>
                        <!-- name error end -->

                        <!-- name update start -->
                        <?php if (isset($_SESSION["name_update"])) :
                        ?>
                            <div id="emailHelp" class="form-text text-success fs-6 mt-3"><?= $_SESSION["name_update"] ?></div>
                        <?php endif;
                        unset($_SESSION["name_update"]); ?>
                        <!-- name update end -->
                        <div>

                            <button type="submit" name="name_btn" class="btn btn-primary my-3"><i class="material-icons">refresh</i>Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- name update end -->

    <!-- email update start -->
    <div class="col-md-6">
        <div class="card" style="overflow-y: scroll; height: 250px;">
            <div class="card-header">
                USER-EMAIL
            </div>
            <div class="card-body">
                <form action="update.php" method="post">
                    <div class="example-content">
                        <label for="exampleInputEmail1" class="form-label">UserEmail</label>
                        <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                        <!-- email_update start -->
                        <?php if (isset($_SESSION["email_error"])) :
                        ?>
                            <div id="emailHelp" class="form-text text-danger fs-6 mt-3"><?= $_SESSION["email_error"] ?></div>
                        <?php endif;
                        unset($_SESSION["email_error"]); ?>
                        <!-- email_update end -->

                        <!-- email_update start -->
                        <?php if (isset($_SESSION["update_email"])) :
                        ?>
                            <div id="emailHelp" class="form-text text-success fs-6 mt-3"><?= $_SESSION["update_email"] ?></div>
                        <?php endif;
                        unset($_SESSION["update_email"]); ?>
                        <!-- email_update end -->

                        <div>
                            <button type="submit" name="email_btn" class="btn btn-primary my-3"><i class="material-icons">refresh</i>Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- email update end -->

    <!-- password update start -->
    <div class="col-md-6">
        <div class="card" style="overflow-y: scroll; height: 250px;">
            <div class="card-header">
                USER-PASSWORD
            </div>
            <div class="card-body">
                <form action="update.php" method="post">
                    <div class="example-content">

                        <label for="exampleInputEmail1" class="form-label">Old Password</label>
                        <input type="text" name="old_password" class="form-control my-1" id="exampleInputEmail1" aria-describedby="emailHelp">

                        <!-- old_pass_error start -->
                        <?php if (isset($_SESSION["old_pass_error"])) :
                        ?>
                            <div id="emailHelp" class="form-text text-danger fs-6 mt-3"><?= $_SESSION["old_pass_error"] ?></div>
                        <?php endif;
                        unset($_SESSION["old_pass_error"]); ?>
                        <!-- old_pass_error end -->

                        <!-- old_password_update start -->
                        <?php if (isset($_SESSION["old_password_update"])) :
                        ?>
                            <div id="emailHelp" class="form-text text-success fs-6 mt-3"><?= $_SESSION["old_password_update"] ?></div>
                        <?php endif;
                        unset($_SESSION["old_password_update"]); ?>
                        <!-- old_password_update end -->

                        <label for="exampleInputEmail1" class="form-label">New Password</label>
                        <input type="text" name="new_password" class="form-control my-1" id="exampleInputEmail1" aria-describedby="emailHelp">


                        <!-- new_pass_error start -->
                        <?php if (isset($_SESSION["new_pass_error"])) :
                        ?>
                            <div id="emailHelp" class="form-text text-danger fs-6 mt-3"><?= $_SESSION["new_pass_error"] ?></div>
                        <?php endif;
                        unset($_SESSION["new_pass_error"]); ?>
                        <!-- new_pass_error end -->

                        <!-- new_password_update start -->
                        <?php if (isset($_SESSION["new_password_update"])) :
                        ?>
                            <div id="emailHelp" class="form-text text-success fs-6 mt-3"><?= $_SESSION["new_password_update"] ?></div>
                        <?php endif;
                        unset($_SESSION["new_password_update"]); ?>
                        <!-- new_password_update end -->


                        <label for="exampleInputEmail1" class="form-label">Confirm</label>
                        <input type="text" name="confirm_password" class="form-control my-1" id="exampleInputEmail1" aria-describedby="emailHelp">

                        <!-- confirm_error start -->
                        <?php if (isset($_SESSION["confirm_error"])) :
                        ?>
                            <div id="emailHelp" class="form-text text-danger fs-6 mt-3"><?= $_SESSION["confirm_error"] ?></div>
                        <?php endif;
                        unset($_SESSION["confirm_error"]); ?>
                        <!-- confirm_error end -->

                        <!-- confirm_update start -->
                        <?php if (isset($_SESSION["confirm_update"])) :
                        ?>
                            <div id="emailHelp" class="form-text text-success fs-6 mt-3"><?= $_SESSION["confirm_update"] ?></div>
                        <?php endif;
                        unset($_SESSION["confirm_update"]); ?>
                        <!-- confirm_update end -->

                        <div>
                            <button type="submit" name="password_btn" class="btn btn-primary my-3"><i class="material-icons">refresh</i>Update</button>
                        </div>

                        <!-- password_update start -->
                        <?php if (isset($_SESSION["pass_error"])) :
                        ?>
                            <div id="emailHelp" class="form-text text-danger fs-6 mt-3"><?= $_SESSION["pass_error"] ?></div>
                        <?php endif;
                        unset($_SESSION["pass_error"]); ?>
                        <!-- password_update end -->

                        <!-- password_update_error start -->
                        <?php if (isset($_SESSION["pass_update"])) :
                        ?>
                            <div id="emailHelp" class="form-text text-success fs-6 mt-3"><?= $_SESSION["pass_update"] ?></div>
                        <?php endif;
                        unset($_SESSION["pass_update"]); ?>
                        <!-- password_update_error end -->

                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- password update end -->

    <!-- Image update start -->
    <div class="col-md-6">
        <div class="card" style="overflow-y: scroll; height: 250px;">
            <div class="card-header">
                USER-IMAGE
            </div>
            <div class="card-body">
                <form action="update.php" method="post" enctype="multipart/form-data">
                    <div class="example-content">
                        <label for="exampleInputEmail1" class="form-label">UserName</label>
                        <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                        <!-- Image error start -->
                        <?php if (isset($_SESSION["image_error"])) :
                        ?>
                            <div id="emailHelp" class="form-text text-danger fs-6 mt-3"><?= $_SESSION["image_error"] ?></div>
                        <?php endif;
                        unset($_SESSION["image_error"]); ?>
                        <!-- Image error end -->

                        <!-- Image update start -->
                        <?php if (isset($_SESSION["image_update"])) :
                        ?>
                            <div id="emailHelp" class="form-text text-success fs-6 mt-3"><?= $_SESSION["image_update"] ?></div>
                        <?php endif;
                        unset($_SESSION["image_update"]); ?>
                        <!-- Image update end -->
                        <div>

                            <button type="submit" name="image_btn" class="btn btn-primary my-3"><i class="material-icons">refresh</i>Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Image update end -->

</div>






<?php

include "../master/footer.php";

?>
