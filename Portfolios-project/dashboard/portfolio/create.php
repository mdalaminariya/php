<?php
include '../master/header.php';

include '../../public/fonts/font.php';

?>
<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                Portfolio Create
            </div>
            <div class="card-body">
            <form action="store.php" method="post" enctype="multipart/form-data">
                    <div class="example-content">
                        <label for="exampleInputEmail1" class="form-label">Project Title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <label for="exampleInputEmail1" class="form-label">Project sub-Title</label>
                        <input type="text" name="sub" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <label for="exampleInputEmail1" class="form-label">Project Description</label>
                        <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <label for="exampleInputEmail1" class="form-label">Project Image</label>
                        
                        <picture class="d-block my-2">
                            <img id="port_img" src="../../public//default/default.jpg" style="width: 250px; height: 200px;object-fit:contain" alt="">
                           
                        </picture>

                        <input onchange="document.getElementById('port_img').src = window.URL.createObjectURL(this.files[0])" type="file" name="image" class="form-control hudai" id="exampleInputEmail1" aria-describedby="emailHelp">
                     
                    
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


<?php
include '../master/footer.php';
?>