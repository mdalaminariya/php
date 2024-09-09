<?php
include '../master/header.php';
include '../../public/fonts/font.php';

?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Fact Create Page
            </div>
            <div class="card-body">
            <form action="store.php" method="post">
                    <div class="example-content">
                        <label for="exampleInputEmail1" class="form-label">Fact Title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <label for="exampleInputEmail1" class="form-label">Fact Count</label>
                        <input type="text" name="count" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <label for="exampleInputEmail1" class="form-label">Icon</label>
                        <input type="text" name="icon" class="form-control hudai" id="exampleInputEmail1" aria-describedby="emailHelp">
                        
                        <div class="card-body" style="overflow-y: scroll; height: 250px;">
                            <div class="fa-2x">
                            <?php foreach($fonts as $font):?>
                                <span class="m-2">
                                <i class="<?= $font ?>" onclick="myFun(event)" ></i>
                                </span>
                            <?php endforeach;?>
                            </div>
                        </div>
                        <div>
                            <button type="submit" name="create" class="btn btn-primary my-3"><i class="material-icons">add</i>add</button>
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