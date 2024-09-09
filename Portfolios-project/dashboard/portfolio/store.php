<?php
include "../../config/database.php";
session_start();

if(isset($_POST['create'])){
    $title = $_POST['title'];
    $sub = $_POST['sub'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $tmp_img = $_FILES['image']['tmp_name'];

    if (!$image) {
        $_SESSION['image_error'] = "Image Field is Required!!";
        header("location: profile.php");
       }else{
        if ($image) {
            $explode = explode('.', $image);
            $extension = end($explode);
            $custom_name_img = $_SESSION['auth_id'].'-'.$title.'-'.date("d-m-Y").".".$extension;
            $local_path = "../../public/portfolio/".$custom_name_img;
    
            if (move_uploaded_file($tmp_img,$local_path)) {
                $query = "INSERT INTO `portfolios`(`title`,`sub`,`description`,`image`) VALUES ('$title','$sub','$description','$custom_name_img')";
                mysqli_query($db,$query);
                $_SESSION["port_created"] = "portfolio successfully upadted!!!";
                header("location: portfolio.php");
            }
        }
       }
}

if(isset($_GET['statusid'])){

    $id = $_GET['statusid'];
    
    $query = "SELECT * FROM portfolios WHERE id = '$id'";
    $connectdb = mysqli_query($db,$query);
    $port = mysqli_fetch_assoc($connectdb);

    if($port['status'] == 'deactive'){
        $update_query = "UPDATE `portfolios` SET `status`='active' WHERE id = '$id'";
        mysqli_query($db,$update_query);
        $_SESSION['portfolio_status'] = "Successfully status Updated..!";
        header("location: portfolio.php");
    }else{
        $update_query = "UPDATE `portfolios` SET `status`='deactive' WHERE id = '$id'";
        mysqli_query($db,$update_query);
        $_SESSION['portfolio_status'] = "Successfully status Updated..!";
        header("location: portfolio.php");
    }
}

if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    $select_port = "SELECT * FROM portfolios WHERE id = '$id'";
    $connectdb = mysqli_query($db,$select_port);
    $port = mysqli_fetch_assoc($connectdb);

    if($port['image']){
        $old_img = $port['image'];
        $old_path = "../../public/portfolio/".$old_img;
        if(file_exists($old_path)){
            unlink($old_path);
        }
        $delete_query = "DELETE FROM portfolios WHERE id='$id'";
        $delete = mysqli_query($db,$delete_query);
    
        $_SESSION['portfolio_delete'] = "Successfully Deleted your Service..!";
        header("location: portfolio.php");
    }

}

if(isset($_POST['update'])){
    if($_GET['update_id']){
        $id = $_GET['update_id'];
        $title = $_POST['title'];
        $sub = $_POST['sub'];
        $description = $_POST['description'];
        $image = $_FILES['image']['name'];
        $tmp_img = $_FILES['image']['tmp_name'];
    
            if ($image) {
            $select_port = "SELECT * FROM portfolios WHERE id = '$id'";
            $connectdb = mysqli_query($db,$select_port);
            $port = mysqli_fetch_assoc($connectdb);

            if($port['image']){
              $old_img = $port['image'];
              $old_path = "../../public/portfolio/".$old_img;
             if(file_exists($old_path)){
             unlink($old_path);
        }
    }
            $explode = explode('.',$image);
            $extension = end($explode);
            $custom_name_img = $_SESSION['auth_id'].'-'.$title.'-'.date("d-m-Y").".".$extension;
            $local_path = "../../public/portfolio/".$custom_name_img;
        
                if (move_uploaded_file($tmp_img,$local_path)) {
                    $query = "UPDATE `portfolios` SET `title`='$title',`sub`='$sub',`description`='$description',`image`='$custom_name_img' WHERE id ='$id'";
                    mysqli_query($db,$query);
                    $_SESSION["port_created"] = "portfolio successfully upadted!!!";
                    header("location: portfolio.php");
                }
            }else{
                $query = "UPDATE `portfolios` SET `title`='$title',`sub`='$sub',`description`='$description' WHERE id ='$id'";
                    mysqli_query($db,$query);
                    $_SESSION["port_created"] = "portfolio successfully upadted!!!";
                    header("location: portfolio.php");
            }
     }
    
    }

?>