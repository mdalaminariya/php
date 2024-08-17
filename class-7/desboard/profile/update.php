<?php

include "../../config/database.php";
session_start();


// name update
if (isset($_POST['name_btn'])) {

    $id = $_SESSION['auth_id'];
    $name = $_POST['name'];
    $name = preg_replace('/\s+/', ' ', $name);
    $name = str_replace(' ', '', $name);

    $str_len = strlen($name);

    if (!$name) {
        $_SESSION["name_error"] = "Name Field is Required!!!";

        header("location: profile.php");
    } elseif (!ctype_alpha($name)) {
        $_SESSION["name_error"] = "We can't use any numerical character!!!";

        header("location: profile.php");
    } elseif (strlen($name) >= 30) {
        $_SESSION["name_error"] = "We can't use length 30 grater than!!!";

        header("location: profile.php");
    } elseif ($name) {
        $query = "UPDATE users SET name='$name' WHERE id='$id'";
        mysqli_query($db, $query);
        $_SESSION["name_update"] = "Name successfully update!!!";
        $_SESSION["auth_name"] = "$name";

        header("location: profile.php");
    }
}

// email update
if (isset($_POST['email_btn'])) {

    $id = $_SESSION['auth_id'];
    $email = $_POST['email'];
    $email_regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';


    if (!$email) {
        $_SESSION["email_error"] = "email Field is Required!!!";
        header("location: profile.php");
    } elseif (!preg_match($email_regex, $email)) {
        $_SESSION["email_error"] = "Invalid email provide!!!";
        header("location: profile.php");
    } elseif ($email) {
        $query = "UPDATE users SET email='$email' WHERE id='$id'";
        mysqli_query($db, $query);
        $_SESSION["update_email"] = "Email successfully update!!!";
        $_SESSION['auth_email'] = "$email";

        header("location: profile.php");
    }
}


?>

<?php
if (isset($_POST['password_btn'])) {
    $id = $_SESSION['auth_id'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];


    $flag = false;


    // password regex 
    $password_regex_length = '/^(?=\S{8,})/';
    $password_regex_uppercase = '/^(?=\S*[A-Z])/';
    $password_regex_lowercase = '/^(?=\S*[a-z])/';
    $password_regex_number = '/^(?=\S*[\d])/';
    $password_regex_special = '/^(?=\S*[\W])/';

    // old password validation

    if (!$old_password) {
        $_SESSION['old_pass_error'] = "Password Field is Required!!";
        header("location: profile.php");
    } else if (!preg_match($password_regex_length, $old_password)) {
        $_SESSION['old_pass_error'] = "Password must be minimum 8 characters length!!";
        header("location: profile.php");
    } else if (!preg_match($password_regex_uppercase, $old_password)) {
        $_SESSION['old_pass_error'] = "Password must be at least one uppercase letter!!";
        header("location: profile.php");
    } else if (!preg_match($password_regex_lowercase, $old_password)) {
        $_SESSION['old_pass_error'] = "Password must be at least one lowercase letter!!";
        header("location: profile.php");
    } else if (!preg_match($password_regex_number, $old_password)) {
        $_SESSION['old_pass_error'] = "Password must be at least one number!!";
        header("location: profile.php");
    } else if (!preg_match($password_regex_special, $old_password)) {
        $_SESSION['old_pass_error'] = "Password must be have one special character!!";
        header("location: profile.php");
    } else {
        $_SESSION["old_password_update"] = "Email successfully update !!!";
        $flag = true;
        header("location: profile.php");
    }

    // new password validation
    if (!$new_password) {
        $_SESSION['new_pass_error'] = "Password Field is Required!!";
        header("location: profile.php");
    } else if (!preg_match($password_regex_length, $new_password)) {
        $_SESSION['new_pass_error'] = "Password must be minimum 8 characters length!!";
        header("location: profile.php");
    } else if (!preg_match($password_regex_uppercase, $new_password)) {
        $_SESSION['new_pass_error'] = "Password must be at least one uppercase letter!!";
        header("location: profile.php");
    } else if (!preg_match($password_regex_lowercase, $new_password)) {
        $_SESSION['new_pass_error'] = "Password must be at least one lowercase letter!!";
        header("location: profile.php");
    } else if (!preg_match($password_regex_number, $new_password)) {
        $_SESSION['new_pass_error'] = "Password must be at least one number!!";
        header("location: profile.php");
    } else if (!preg_match($password_regex_special, $new_password)) {
        $_SESSION['new_pass_error'] = "Password must be have one special character!!";
        header("location: profile.php");
    } else {
        $_SESSION["new_password_update"] = "Email successfully update !!!";
        $flag = true;
        header("location: profile.php");
    }

    // confirm password validation
    if (!$confirm_password) {
        $_SESSION['confirm_error'] = "Password Field is Required!!";
        header("location: profile.php");
    } else if ($confirm_password != $new_password) {
        $_SESSION['confirm_error'] = "Confirm password credential doesn't match !!";
        header("location: profile.php");
    } else {
        $_SESSION["confirm_update"] = "Email successfully update !!!";
        $flag = true;
        header("location: profile.php");
    }


    if ($flag) {
        if ($old_password && $new_password && $confirm_password) {
            $old_encrypt = sha1($old_password);
            $old_pass_query = "SELECT COUNT(*) AS result FROM `users` WHERE id='$id' AND password='$old_encrypt'";
            $connect = mysqli_query($db, $old_pass_query);
            $result = mysqli_fetch_assoc($connect)['result'];
            if ($result == 0) {

                if ($new_password == $confirm_password) {
                    $encrypt = sha1($new_password);
                    $query = "UPDATE users SET password='$encrypt' WHERE id='$id'";
                    mysqli_query($db, $query);
                    $_SESSION["pass_update"] = "ok!!!";
                header("location: profile.php");
                }
            } else {
                $_SESSION["pass_error"] = "your giver old password doesn't match with our records !!!";
                header("location: profile.php");
            }
        } else {
            $_SESSION["pass_error"] = "please fill a all field !!!";
            header("location: profile.php");
        }
    }
}

if (isset($_POST['picture_btn'])) {

    if (!$image) {
        $_SESSION['image_error'] = "Image Field is Required!!";
        header("location: profile.php");
       }else{
        if ($image) {
            $explode = explode('.', $image);
            $extension = end($explode);
            $custom_name_img = $_SESSION['auth_id'].'-'.$_SESSION['auth_name'].'-'.date("d-m-Y").".".$extension;
            $local_path = "../../public/profile/".$custom_name_img;
    
            if (move_uploaded_file($tmp_img, $local_path)) {
                $query = "UPDATE users SET image='$custom_name_img' WHERE id='$id'";
                mysqli_query($db, $query);
                $_SESSION["image_update"] = "Password successfully update!!!";
                header("location: profile.php");
            }else {
                $_SESSION["image_error"] = "your giver old password doesn't match with our records !!!";
                header("location: profile.php");
            }
        }
       }
}



?>

