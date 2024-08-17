<?php

require "../config/database.php";

session_start();


    if(isset($_POST["loginButton"])){


    $email = $_POST["email"];
    $email_regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
    
    $password = $_POST["password"];
    $password_regex_length = '/^(?=\S{8,})/';
    $password_regex_uppercase = '/^(?=\S*[A-Z])/';
    $password_regex_lowercase = '/^(?=\S*[a-z])/';
    $password_regex_number = '/^(?=\S*[\d])/';
    $password_regex_special = '/^(?=\S*[\W])/';
    $flag = false;


    if (!$email) {
        $_SESSION["email_error"] = "email Field is Required!!!";
        $flag = true;
        header("location: loging.php");
    } elseif (!preg_match($email_regex, $email)) {
        $_SESSION["email_error"] = "Invalid email provide!!!";
        $flag = true;
        header("location: loging.php");
    }


    if (!$password) {
        $_SESSION['password_error'] = "Password Field is Required!!";
        $flag = true;
        header("location: loging.php");
    } else if (!preg_match($password_regex_length, $password)) {
        $_SESSION['password_error'] = "Password must be minimum 8 characters length!!";
        $flag = true;
        header("location: loging.php");
    } else if (!preg_match($password_regex_uppercase, $password)) {
        $_SESSION['password_error'] = "Password must be at least one uppercase letter!!";
        $flag = true;
        header("location: loging.php");
    } else if (!preg_match($password_regex_lowercase, $password)) {
        $_SESSION['password_error'] = "Password must be at least one lowercase letter!!";
        $flag = true;
        header("location: loging.php");
    } else if (!preg_match($password_regex_number, $password)) {
        $_SESSION['password_error'] = "Password must be at least one number!!";
        $flag = true;

        header("location: loging.php");
    } else if (!preg_match($password_regex_special, $password)) {
        $_SESSION['password_error'] = "Password must be have one special character!!";
        $flag = true;
        header("location: loging.php");
    }

    if(!$flag){
        $encript = sha1($password);
        $count_query = "SELECT COUNT(*) AS 'result' FROM users WHERE email='$email' AND password='$encript'" ;

       $connect = mysqli_query($db , $count_query);

       if(mysqli_fetch_assoc($connect)['result'] == 1){
        $get_data_query = "SELECT * FROM users WHERE email='$email'";
        $connect = mysqli_query($db,$get_data_query);
        $user = mysqli_fetch_assoc($connect);
        $_SESSION['auth_id'] = $user['id'];
        $_SESSION['auth_name'] = $user['name'];
        $_SESSION['temp_name'] = $user['name'];
        $_SESSION['auth_email'] = $user['email'];
        header("location: ../desboard/home/home.php");
       }else{
        $_SESSION['loging_error'] = "Credentical Does'nt match!!";
        header("location: loging.php");
       }
       
    }

    }
?>