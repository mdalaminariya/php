<?php
include '../master/header.php';

include '../../public/fonts/font.php';

if(isset($_GET['edit_id'])){
    $id = $_GET['edit_id'];
    
    $port_query = "SELECT * FROM portfolios WHERE id='$id'";
    $connect = mysqli_query($db,$port_query);
    $port = mysqli_fetch_assoc($connect);
}

?>
<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                Portfolio update
            </div>
            <div class="card-body">
            <form action="store.php?update_id=<?= $port['id'] ?>" method="post" enctype="multipart/form-data">
                    <div class="example-content">
                        <label for="exampleInputEmail1" class="form-label">Project Title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $port['title'] ?>">
                        <label for="exampleInputEmail1" class="form-label">Project sub-Title</label>
                        <input type="text" name="sub" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $port['sub'] ?>">
                        <label for="exampleInputEmail1" class="form-label">Project Description</label>
                        <textarea type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" <?= $port['description'] ?>></textarea>
                       
                        <label for="exampleInputEmail1" class="form-label">Project Image</label>
                        
                        <picture class="d-block my-2">
                            <img id="port_img" src="../../public/portfolio/<?= $port['image'] ?>" style="width: 250px; height: 200px;object-fit:contain" alt="">
                           
                        </picture>

                        <input onchange="document.getElementById('port_img').src = window.URL.createObjectURL(this.files[0])" type="file" name="image" class="form-control hudai" id="exampleInputEmail1" aria-describedby="emailHelp">
                     
                    
                    </div>
                        <div>
                            <button type="submit" name="update" class="btn btn-primary my-3"><i class="material-icons">add</i>update</button>
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