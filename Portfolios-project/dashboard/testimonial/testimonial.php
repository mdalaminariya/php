<?php
include '../master/header.php';
include "../../config/database.php";

$testimonial_read = "SELECT * FROM testimonials";
$testimonials = mysqli_query($db,$testimonial_read);

$result = mysqli_fetch_assoc($testimonials);


?>

<div class="row">
    <div class="col">
    <div class="page-description">
         <h1>Testimonial Page</h1>
  </div>
    </div>
</div>

<!-- portfolio  masage start -->
<div class="coll-12">
            <?php if(isset($_SESSION['port_created'])) : ?>
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title"><?= $_SESSION['port_created'] ?></span>
            </div>
        </div>
        <?php endif ; unset($_SESSION['port_created']);?>
    </div>
    <!-- portfolio  massage end -->

<!-- portfolio status masage start -->
<div class="coll-12">
            <?php if(isset($_SESSION['portfolio_status'])) : ?>
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title"><?= $_SESSION['portfolio_status'] ?></span>
            </div>
        </div>
        <?php endif ; unset($_SESSION['portfolio_status']);?>
    </div>
    <!-- portfolio status massage end -->

<!-- portfolio delete masage start -->
<div class="coll-12">
            <?php if(isset($_SESSION['portfolio_delete'])) : ?>
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title"><?= $_SESSION['portfolio_delete'] ?></span>
            </div>
        </div>
        <?php endif ; unset($_SESSION['portfolio_delete']);?>
    </div>
    <!-- portfolio delete massage end -->

<div class="row">
    
    </div>
 

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Testimonial List.</h4>
            <a href="create.php" name="name_btn" class="btn btn-primary my-3"><i class="material-icons">add</i>creater</a>
            </div>
            <div class="card-body">
            <div class="example-content">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Serial No.</th>
                            <th scope="col">Image</th>
                            <!-- <th scope="col">Description</th> -->
                            <th scope="col">Status</th>
                            <th scope="col">Name</th>
                            <th scope="col">Sub</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $num = 1;
                        if(empty($result)) :
                        ?>
                        <tr>
                            <td colspan="5" class="text-center text-danger">No Data Found..!</td>
                        </tr>
                        <?php
                        else :
                        foreach($testimonials as $testimonial):
                            ?>
                        <tr>
                            <th scope="row">
                                <?= $num++ ?>
                            </th>
                            <td>
                                <img src="../../public/Testimonial/<?= $testimonial['image'] ?>" style="width: 40px; height: 40px;" alt="">
                            </td>
                            
                            <!-- <td>
                            <?= $testimonial['description'] ?>
                            </td> -->
                            <td>
                            <a href="store.php?statusid=<?= $testimonial['id'] ?>" class='<?= ($testimonial['status'] == 'deactive') ? 'badge bg-danger text-white' : 'badge bg-success text-white'?>'>
                            <?= $testimonial['status'] ?>
                            </a>
                            </td>
                            <td>
                            <?= $testimonial['sub'] ?>
                            </td>
                            <td>
                            <?= $testimonial['name'] ?>
                            </td>
                            <td>
                                <div class="d-flex justify-content-around">
                                <a href="edit.php?edit_id=<?= $testimonial['id'] ?>">
                                    <i class="fa fa-chain text-info fa-2x"></i>
                                </a>
                                <a href="store.php?delete_id=<?= $testimonial['id']?>">
                                    <i class="fa fa-trash text-danger fa-2x"></i>
                                </a>
                                </div>
                            </td>
                        </tr>
                            <?php endforeach; endif;?>
                    </tbody>
                </table>
            </div>
    </div>
</div>
</div>
</div>
</div>

<?php
include '../master/footer.php';
?>