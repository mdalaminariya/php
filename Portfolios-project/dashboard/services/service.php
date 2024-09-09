<?php
include '../master/header.php';
include "../../config/database.php";

$service_read = "SELECT * FROM services";
$services = mysqli_query($db,$service_read);


?>

<div class="row">
    <div class="col">
    <div class="page-description">
         <h1>Services</h1>
  </div>
    </div>
</div>

<div class="row">
    <!-- service add massage start -->
        <div class="coll-12">
            <?php if(isset($_SESSION['survice_add'])) : ?>
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title"><?= $_SESSION['survice_add'] ?></span>
            </div>
        </div>
        <?php endif ; unset($_SESSION['survice_add']);?>
    </div>
    <!-- service add masaage end -->

    <!-- serivice delete masage start -->
        <div class="coll-12">
            <?php if(isset($_SESSION['survice_delete'])) : ?>
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title"><?= $_SESSION['survice_delete'] ?></span>
            </div>
        </div>
        <?php endif ; unset($_SESSION['survice_delete']);?>
    </div>
    <!-- services delete massage end -->

    <!-- serivice status masage start -->
        <div class="coll-12">
            <?php if(isset($_SESSION['survice_status'])) : ?>
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title"><?= $_SESSION['survice_status'] ?></span>
            </div>
        </div>
        <?php endif ; unset($_SESSION['survice_status']);?>
    </div>
    <!-- services status massage end -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Services List.</h4>
            <a href="../services/create.php" name="name_btn" class="btn btn-primary my-3"><i class="material-icons">add</i>creater</a>
            </div>
            <div class="card-body">
            <div class="example-content">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Serial No.</th>
                            <th scope="col">Icon</th>
                            <th scope="col">Title</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                     $serial = 1;
                    foreach($services as $service) 
                    :?>
                        <tr>
                            <th scope="row">
                                <?= $serial ++?>
                            </th>
                            <td>
                            <i class="fa-3x <?= $service['icon'] ?> "></i>
                            </td>
                            <td>
                                <?= $service['title'] ?>
                            </td>
                            <td>
                            <a href="store.php?alamin=<?=$service['id']?>"class='<?= ($service['status'] == 'deactive') ? 'badge bg-danger text-white' : 'badge bg-success text-white'?>'>
                            <?= $service['status'] ?>
                            </a>
                            </td>
                            <td>
                                <div class="d-flex justify-content-around">
                                <a href="edit.php?edit=<?= $service['id']?>">
                                    <i class="fa fa-chain text-info fa-2x"></i>
                                </a>
                                <a href="store.php?id=<?= $service['id']?>">
                                    <i class="fa fa-trash text-danger fa-2x"></i>
                                </a>
                                </div>
                                
                            </td>
                            <?php endforeach;?>
                        </tr>
                     
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