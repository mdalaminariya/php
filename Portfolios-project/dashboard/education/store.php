<?php

session_start();

include "../../config/database.php";

if(isset($_POST['create'])){
    $title = $_POST['title'];
    $year = $_POST['year'];
    $ratio = $_POST['ratio'];

    if($title && $year && $ratio){
        if($ratio != '0'){
            $insert = "INSERT INTO `educations`(`title`,`year`,`ratio`) VALUES ('$title','$year','$ratio')";
            mysqli_query($db,$insert);
            $_SESSION['education_success'] = "Successfully Education Added..!";
            header("location: education.php");
        }else{
            $_SESSION['education_error'] = "Please select Ratio..!";
            header("location: education.php");
        }
    }
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $delete_query = "DELETE FROM `educations` WHERE id = '$id'";
    $delete = mysqli_query($db,$delete_query);
    $_SESSION['delete_msg'] = "Successfully delete Education.!";
    header("location: education.php");
}

if(isset($_POST['update'])){
    if(isset($_GET['edit_id'])){
        $id = $_GET['edit_id'];
        $title = $_POST['title'];
        $year = $_POST['year'];
        $ratio = $_POST['ratio'];
        
        $update_query = "UPDATE `educations` SET `title`='$title',`year`='$year ',`ratio`='$ratio' WHERE id = '$id'";
        mysqli_query($db,$update_query);
        $_SESSION['education_update'] = "Successfully Education Update..!";
        header("location: education.php");
    }
}

if(isset($_GET['statusid'])){

    $id = $_GET['statusid'];
    
    $query = "SELECT * FROM educations WHERE id = '$id'";
    $connectdb = mysqli_query($db,$query);
    $port = mysqli_fetch_assoc($connectdb);

    if($port['status'] == 'deactive'){
        $update_query = "UPDATE `educations` SET `status`='active' WHERE id = '$id'";
        mysqli_query($db,$update_query);
        $_SESSION['education_status'] = "Successfully status Updated..!";
        header("location: education.php");
    }else{
        $update_query = "UPDATE `educations` SET `status`='deactive' WHERE id = '$id'";
        mysqli_query($db,$update_query);
        $_SESSION['education_status'] = "Successfully status Updated..!";
        header("location: education.php");
    }
}

?>