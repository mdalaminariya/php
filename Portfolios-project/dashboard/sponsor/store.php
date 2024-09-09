<?php

include '../../config/database.php';

session_start();

if(isset($_POST['create'])){
    $image = $_FILES['image']['name'];
    $tmp_img = $_FILES['image']['tmp_name'];

    if (!$image) {
        $_SESSION['image_error'] = "Image Field is Required!!";
        header("location: sponsor.php");
       }else{
        if ($image) {
            $explode = explode('.',$image);
            $extension = end($explode);
            $custom_name_img = $_SESSION['auth_id'].'-'.time().'-'.date("d-m-Y").".".$extension;
            $local_path = "../../public/sponsors/".$custom_name_img;
    
            if (move_uploaded_file($tmp_img,$local_path)) {
                $query = "INSERT INTO `sponsors`(`image`) VALUES ('$custom_name_img')";
                mysqli_query($db,$query);
                $_SESSION["sponsor_created"] = "sponsor successfully upadted!!!";
                header("location: sponsor.php");
            }
        }
       }
}

if(isset($_GET['statusid'])){

    $id = $_GET['statusid'];
    
    $query = "SELECT * FROM sponsors WHERE id = '$id'";
    $connectdb = mysqli_query($db,$query);
    $port = mysqli_fetch_assoc($connectdb);

    if($port['status'] == 'deactive'){
        $update_query = "UPDATE `sponsors` SET `status`='active' WHERE id = '$id'";
        mysqli_query($db,$update_query);
        $_SESSION['sponsor_status'] = "Successfully status Updated..!";
        header("location: sponsor.php");
    }else{
        $update_query = "UPDATE `sponsors` SET `status`='deactive' WHERE id = '$id'";
        mysqli_query($db,$update_query);
        $_SESSION['sponsor_status'] = "Successfully status Updated..!";
        header("location: sponsor.php");
    }
}

if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    $select_port = "SELECT * FROM `sponsors` WHERE id = '$id'";
    $connectdb = mysqli_query($db,$select_port);
    $port = mysqli_fetch_assoc($connectdb);

    if($port['image']){
        $old_img = $port['image'];
        $old_path = "../../public/sponsors/".$old_img;
        if(file_exists($old_path)){
            unlink($old_path);
        }
        $delete_query = "DELETE FROM `sponsors` WHERE id = '$id'";
        $delete = mysqli_query($db,$delete_query);
    
        $_SESSION['sponsor_delete'] = "Successfully Deleted your Sponsor..!";
        header("location: sponsor.php");
    }

}

?>