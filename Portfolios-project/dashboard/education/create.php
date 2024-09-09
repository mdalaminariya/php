<?php
include '../master/header.php';

include '../../public/fonts/font.php';

?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Education Create Page
            </div>
            <div class="card-body">
            <form action="store.php" method="post">
                    <div class="example-content">
                        <label for="exampleInputEmail1" class="form-label">Education Title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <label for="exampleInputEmail1" class="form-label">Education Year</label>
                        <input type="text" name="year" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <label for="exampleInputEmail1" class="form-label">Education Ratio/Parsentage</label>
                        
                        <select name="ratio" class="form-select">
                            <option value="0">Select Your Ratio</option>
                            <?php for($i=1;$i<=100;$i++) : ?>
                            <option value="<?= $i ?>">
                                <?= $i ?>%
                            </option>
                            <?php endfor;?>
                        </select>
                        <div>
                            <button type="submit" name="create" class="btn btn-primary my-3"><i class="material-icons">add</i>add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?php
include '../master/footer.php';
?>