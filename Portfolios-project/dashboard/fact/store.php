<?php

include '../../config/database.php';

if(isset($_POST['create'])){
    $title = $_POST['title'];
    $count = $_POST['count'];
    $icon = $_POST['icon'];

    if($title && $count){
        if($ratio != '0'){
            $insert = "INSERT INTO `facts`(`title`,`count`,`icon`) VALUES ('$title','$count','$icon')";
            mysqli_query($db,$insert);
            $_SESSION['fact_success'] = "Successfully Education Added..!";
            header("location: fact.php");
        }else{
            $_SESSION['fact_error'] = "Please select Ratio..!";
            header("location: fact.php");
        }
    }
}

if(isset($_GET['statusid'])){

    $id = $_GET['statusid'];
    
    $query = "SELECT * FROM facts WHERE id = '$id'";
    $connectdb = mysqli_query($db,$query);
    $port = mysqli_fetch_assoc($connectdb);

    if($port['status'] == 'deactive'){
        $update_query = "UPDATE `facts` SET `status`='active' WHERE id = '$id'";
        mysqli_query($db,$update_query);
        $_SESSION['fact_status'] = "Successfully status Updated..!";
        header("location: fact.php");
    }else{
        $update_query = "UPDATE `facts` SET `status`='deactive' WHERE id = '$id'";
        mysqli_query($db,$update_query);
        $_SESSION['fact_status'] = "Successfully status Updated..!";
        header("location: fact.php");
    }
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $delete_query = "DELETE FROM `facts` WHERE id = '$id'";
    $delete = mysqli_query($db,$delete_query);
    $_SESSION['delete_msg'] = "Successfully delete Education.!";
    header("location: fact.php");
}

?>