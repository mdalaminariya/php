<?php

include '../../dashboard/master/header.php';

?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Links Page</h1>
        </div>
    </div>
</div>


<div class="col-md-6">
        <div class="card" style="overflow-y: scroll; height: 250px;">
            <div class="card-header">
                Links
            </div>
            <div class="card-body">
                <form action="links_manage.php" method="post">
                    <div class="example-content">

                    <!-- email_update start -->
                    <?php if (isset($_SESSION["links_add"])) :
                        ?>
                            <div id="emailHelp" class="form-text text-success fs-6 mt-3"><?= $_SESSION["links_add"] ?></div>
                        <?php endif;
                        unset($_SESSION["links_add"]); ?>
                        <!-- email_update end -->

                        <label for="exampleInputEmail1" class="form-label">Facebook</label>
                        <input type="text" name="facebook" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <label for="exampleInputEmail1" class="form-label">Twitter</label>
                        <input type="text" name="twitter" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <label for="exampleInputEmail1" class="form-label">Instagram</label>
                        <input type="text" name="instagram" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <label for="exampleInputEmail1" class="form-label">Pinterest</label>
                        <input type="text" name="pinterest" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <button type="submit" name="link_btn" class="btn btn-primary my-3"><i class="material-icons">add</i>add</button>

                        <div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php

include '../../dashboard/master/footer.php';

?>