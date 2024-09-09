<?php
include '../master/header.php';
include '../../public/fonts/font.php';
include "../../config/database.php";

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    
    $select_query = "SELECT * FROM `educations` WHERE id = '$id'";
    $connect = mysqli_query($db,$select_query);
    $education = mysqli_fetch_assoc($connect);
}

?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Education Page Edit
            </div>
            <div class="card-body">
            <form action="store.php?edit_id=<?= $education['id']?>" method="post">
                    <div class="example-content">
                        <label for="exampleInputEmail1" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $education['title']?>">
                        <label for="exampleInputEmail1" class="form-label">Year</label>
                        <input type="text" name="year" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $education['year']?>">
                        <label for="exampleInputEmail1" class="form-label">Ratio</label>

                        <select name="ratio" class="form-select">
                            <option value="0">Select Your Ratio</option>
                            <?php for($i=1;$i<=100;$i++) : ?>
                            <option value="<?= $i ?>">
                                <?= $i ?>%
                            </option>
                            <?php endfor;?>
                        </select>
                    </div>
                        <div>
                            <button type="submit" name="update" class="btn btn-primary my-3"><i class="material-icons">add</i>Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    let hudai = document.querySelector('.hudai')
    function myFun(e){
        hudai.value= e.target.classList.value;
    }
</script>

<?php
include '../master/footer.php';
?>