<?php
include '../master/header.php';
include "../../config/database.php";

$education_read = "SELECT * FROM educations";
$educations = mysqli_query($db,$education_read);
$education = mysqli_fetch_assoc($educations);


?>

<div class="row">
    <div class="col">
    <div class="page-description">
         <h1>Education</h1>
  </div>
    </div>
</div>

 <div class="row">
    <!-- education error masage start -->
        <div class="coll-12">
            <?php if(isset($_SESSION['education_error'])) : ?>
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title"><?= $_SESSION['education_error'] ?></span>
            </div>
        </div>
        <?php endif ; unset($_SESSION['education_error']);?>
    </div>
    <!-- education error massage end -->

    <!-- education masage start -->
        <div class="coll-12">
            <?php if(isset($_SESSION['education_success'])) : ?>
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title"><?= $_SESSION['education_success'] ?></span>
            </div>
        </div>
        <?php endif ; unset($_SESSION['education_success']);?>
    </div>
    <!--education massage end -->

    <!-- education delete masage start -->
        <div class="coll-12">
            <?php if(isset($_SESSION['delete_msg'])) : ?>
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title"><?= $_SESSION['delete_msg'] ?></span>
            </div>
        </div>
        <?php endif ; unset($_SESSION['delete_msg']);?>
    </div>
    <!--education delete massage end -->

    <!-- education update masage start -->
        <div class="coll-12">
            <?php if(isset($_SESSION['education_update'])) : ?>
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title"><?= $_SESSION['education_update'] ?></span>
            </div>
        </div>
        <?php endif ; unset($_SESSION['education_update']);?>
    </div>
    <!--education update massage end -->

    <!-- education status masage start -->
        <div class="coll-12">
            <?php if(isset($_SESSION['education_status'])) : ?>
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title"><?= $_SESSION['education_status'] ?></span>
            </div>
        </div>
        <?php endif ; unset($_SESSION['education_status']);?>
    </div>
    <!--education status massage end -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Services List.</h4>
            <a href="../education/create.php" name="name_btn" class="btn btn-primary my-3"><i class="material-icons">add</i>creater</a>
            </div>
            <div class="card-body">
            <div class="example-content">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Serial No.</th>
                            <th scope="col">Title</th>
                            <th scope="col">Year</th>
                            <th scope="col">Ratio</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($education)) : ?>
                            <tr>
                                <th colspan="5" class="text-center text-danger">
                                    No Data found.!
                                </th>
                            </tr>
                            <?php else :?>
                    <?php 
                     $num = 1;
                    foreach($educations as $education) 
                     :?>
                        <tr>
                            <th scope="row">
                                 <?= $num++?>
                            </th>
                            <td>
                             <?= $education['title'] ?>
                            </td>
                            <td>
                                <?= $education['year'] ?> 
                            </td>
                            <td>
                                <?= $education['ratio'] ?> %
                            </td>
                            <td>
                            <a href="store.php?statusid=<?= $education['id'] ?>" class='<?= ($education['status'] == 'deactive') ? 'badge bg-danger text-white' : 'badge bg-success text-white'?>'>
                            <?= $education['status'] ?>
                            </a>
                            </td>
                            <td>
                                <div class="d-flex justify-content-around">
                                <a href="edit.php?edit=<?= $education['id']?>">
                                    <i class="fa fa-chain text-info fa-2x"></i>
                                </a>
                                <a href="store.php?id=<?= $education['id']?>">
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