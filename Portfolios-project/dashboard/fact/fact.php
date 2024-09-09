<?php
include '../master/header.php';
include "../../config/database.php";

$fact_read = "SELECT * FROM facts";
$facts = mysqli_query($db,$fact_read);
$fact = mysqli_fetch_assoc($facts);


?>

<div class="row">
    <div class="col">
    <div class="page-description">
         <h1>Fact</h1>
  </div>
    </div>
</div>

 <div class="row">
    <!-- fact status masage start -->
        <div class="coll-12">
            <?php if(isset($_SESSION['fact_status'])) : ?>
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title"><?= $_SESSION['fact_status'] ?></span>
            </div>
        </div>
        <?php endif ; unset($_SESSION['fact_status']);?>
    </div>
    <!-- fact status massage end -->

    <!-- fact masage start -->
        <div class="coll-12">
            <?php if(isset($_SESSION['fact_success'])) : ?>
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title"><?= $_SESSION['fact_success'] ?></span>
            </div>
        </div>
        <?php endif ; unset($_SESSION['fact_success']);?>
    </div>
    <!--fact massage end -->

    <!-- fact delete masage start -->
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
    <!--fact delete massage end -->

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

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Fact List.</h4>
            <a href="create.php" name="name_btn" class="btn btn-primary my-3"><i class="material-icons">add</i>creater</a>
            </div>
            <div class="card-body">
            <div class="example-content">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Serial No.</th>
                            <th scope="col">Icon</th>
                            <th scope="col">count</th>
                            <th scope="col">title</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($fact)) : ?>
                            <tr>
                                <th colspan="5" class="text-center text-danger">
                                    No Data found.!
                                </th>
                            </tr>
                            <?php else :?>
                    <?php 
                     $num = 1;
                    foreach($facts as $fact) 
                     :?>
                        <tr>
                            <th scope="row">
                                 <?= $num++?>
                            </th>
                            <td>
                            <i class="fa-3x <?= $fact['icon'] ?> "></i>
                            </td>
                            <td>
                                <?= $fact['count'] ?>
                            </td>
                            <td>
                                <?= $fact['title'] ?> 
                            </td>
                            <td>
                            <a href="store.php?statusid=<?= $fact['id'] ?>" class='<?= ($fact['status'] == 'deactive') ? 'badge bg-danger text-white' : 'badge bg-success text-white'?>'>
                            <?= $fact['status'] ?>
                            </a>
                            </td>
                            <td>
                                <div class="d-flex justify-content-around">
                                <a href="edit.php?edit=<?= $fact['id']?>">
                                    <i class="fa fa-chain text-info fa-2x"></i>
                                </a>
                                <a href="store.php?id=<?= $fact['id']?>">
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