<?php
include '../master/header.php';
include "../../config/database.php";

$sponsor_read = "SELECT * FROM sponsors";
$sponsors = mysqli_query($db,$sponsor_read);

$result = mysqli_fetch_assoc($sponsors);


?>

<div class="row">
    <div class="col">
    <div class="page-description">
         <h1>Sponsor Page</h1>
  </div>
    </div>
</div>

<!-- sponsor  masage start -->
<div class="coll-12">
            <?php if(isset($_SESSION['sponsor_created'])) : ?>
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title"><?= $_SESSION['sponsor_created'] ?></span>
            </div>
        </div>
        <?php endif ; unset($_SESSION['sponsor_created']);?>
    </div>
    <!-- sponsor massage end -->

<!-- sponsor status masage start -->
<div class="coll-12">
            <?php if(isset($_SESSION['sponsor_status'])) : ?>
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title"><?= $_SESSION['sponsor_status'] ?></span>
            </div>
        </div>
        <?php endif ; unset($_SESSION['sponsor_status']);?>
    </div>
    <!-- sponsor status massage end -->

<!-- sponsor delete masage start -->
<div class="coll-12">
            <?php if(isset($_SESSION['sponsor_delete'])) : ?>
        <div class="alert alert-custom" role="alert">
            <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
            <div class="alert-content">
                <span class="alert-title"><?= $_SESSION['sponsor_delete'] ?></span>
            </div>
        </div>
        <?php endif ; unset($_SESSION['sponsor_delete']);?>
    </div>
    <!-- sponsor delete massage end -->

<div class="row">
    
    </div>
 

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Sponsor List.</h4>
            <a href="create.php" name="name_btn" class="btn btn-primary my-3"><i class="material-icons">add</i>creater</a>
            </div>
            <div class="card-body">
            <div class="example-content">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Serial No.</th>
                            <th scope="col">Image</th>
                            <th scope="col">Status</th>
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
                        foreach($sponsors as $sponsor):
                            ?>
                        <tr>
                            <th scope="row">
                                <?= $num++ ?>
                            </th>
                            <td>
                                <img src="../../public/Sponsors/<?= $sponsor['image'] ?>" style="width: 80px; height: 40px;" alt="">
                            </td>
                            <td>
                            <a href="store.php?statusid=<?= $sponsor['id'] ?>" class='<?= ($sponsor['status'] == 'deactive') ? 'badge bg-danger text-white' : 'badge bg-success text-white'?>'>
                            <?= $sponsor['status'] ?>
                            </a>
                            </td>
                            <td>
                                <div class="d-flex justify-content-around">
                                <a href="edit.php?edit_id=<?= $sponsor['id'] ?>">
                                    <i class="fa fa-chain text-info fa-2x"></i>
                                </a>
                                <a href="store.php?delete_id=<?= $sponsor['id']?>">
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