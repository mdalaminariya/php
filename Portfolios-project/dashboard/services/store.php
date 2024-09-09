<?php

include "../../config/database.php";
session_start();

if(isset($_POST['create'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $icon = $_POST['icon'];

    if($title && $description && $icon){
       $query = "INSERT INTO services (title,description,icon) VALUE ('$title','$description','$icon')";
       mysqli_query($db,$query);

        $_SESSION['survice_add'] = "Successfully added your Service..!";
        header("location: service.php");
    }
}

if(isset($_GET['id'])){
   $id = $_GET['id'];
   $delete_query = "DELETE FROM services WHERE id='$id'";
   $delete = mysqli_query($db,$delete_query);

   $_SESSION['survice_delete'] = "Successfully Deleted your Service..!";
   header("location: service.php");
}


if(isset($_GET['alamin'])){
    $id = $_GET['alamin'];
    
    $select_query = "SELECT * FROM services WHERE id='$id'";
    $connect = mysqli_query($db,$select_query);
    $service = mysqli_fetch_assoc($connect);

    if($service['status'] == 'deactive'){
        $update_query = "UPDATE `services` SET `status`='active' WHERE id = '$id'";
        mysqli_query($db,$update_query);
        $_SESSION['survice_status'] = "Successfully status Updated..!";
        header("location: service.php");
    }else{
        $update_query = "UPDATE `services` SET `status`='deactive' WHERE id = '$id'";
        mysqli_query($db,$update_query);
        $_SESSION['survice_status'] = "Successfully status Updated..!";
        header("location: service.php");
    }
}

if(isset($_POST['update'])){
    if(isset($_GET['edit_id'])){
        $id = $_GET['edit_id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $icon = $_POST['icon'];
        
        $update_query = "UPDATE `services` SET title='$title',description= '$description',icon= '$icon' WHERE id = '$id'";
        mysqli_query($db,$update_query);
        $_SESSION['survice_status'] = "Successfully service Update..!";
        header("location: service.php");
    }
}

?>