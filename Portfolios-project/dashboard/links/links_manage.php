<?php

include "../../config/database.php";
session_start();

if (isset($_POST['link_btn'])) {
    $id = $_SESSION['auth_id'];
    $facebook = $_POST['facebook'];
    $twitter = $_POST['twitter'];
    $instagram =$_POST['instagram'];
    $painterest =$_POST['pinterest'];

        $query = "INSERT INTO links (user_id,facebook,tweter,instagram,pinterest) VALUES ('$id','$facebook','$twitter','$instagram','$painterest')";
        mysqli_query($db, $query);
        $_SESSION["links_add"] = "Link successfully added!!!";
        header("location: links.php");
}

?>