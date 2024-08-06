<?php

session_start();

if(isset($_POST["sub_btn"])){

    // codding for name error..!

    $name = trim($_POST["name"]);
    $name = preg_replace('/\s+/', '', $name);
    strlen($name);

    $flag = false;

    if(!$name){
        $_SESSION["name_error"] = "Please insert your Name..!";
        $flag = true;
        header("location: singUp.php");
    }else if(!ctype_alpha($name)){
        $_SESSION["name_error"] = "Please don't use any number..!";
        $flag = true;
        header("location: singUp.php");
    }else if(strlen($name) >= 30 ){
        $_SESSION["name_error"] = "Please use avarage 30 charecter..!";
        $flag = true;
        header("location: singUp.php");
    }

    // codding for email error..!

    $email = $_POST["email"];
    $email_regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

    if(!$email){
        $_SESSION["email_error"] = "Please insert your Email..!";
        $flag = true;
        header("location: singUp.php");
    }else if(!preg_match($email_regex, $email)){
        $_SESSION["email_error"] = "Please use @ in your Email..!";
        $flag = true;
        header("location: singUp.php");
    }

    // codding for password..!

    $password = $_POST["password"];

    $password_regex_length = '/^(?=\S{8,})/';
    $password_regex_uppercase = '/^(?=\S*[A-Z])/';
    $password_regex_lowercase = '/^(?=\S*[a-z])/';
    $password_regex_number = '/^(?=\S*[\d])/';
    $password_regex_special = '/^(?=\S*[\W])/';

    if(!$password){
        $_SESSION["password_error"] = "Please insert your Password..!";
        $flag = true;
        header("location: singUp.php");
    }else if(!preg_match($password_regex_length, $password)){
        $_SESSION["password_error"] = "Please at last use 8 charecter..!";
        $flag = true;
        header("location: singUp.php");
    }else if(!preg_match($password_regex_uppercase, $password)){
        $_SESSION["password_error"] = "Please at last use one upper(A) case charecter..!";
        $flag = true;
        header("location: singUp.php");
    }else if(!preg_match($password_regex_lowercase, $password)){
        $_SESSION["password_error"] = "Please at last use one lower(a) case charecter..!";
        $flag = true;
        header("location: singUp.php");
    }else if(!preg_match($password_regex_special, $password)){
        $_SESSION["password_error"] = "Please at last use one speacial charecter(@)..!";
        $flag = true;
        header("location: singUp.php");
    }

    // codding for confirm password..!

    $c_password = $_POST["c_password"];

    if(!$c_password){
        $_SESSION["c_password_error"] = "Please insert your confirm Password..!";
        $flag = true;
        header("location: singUp.php");
    }else if($c_password != $password){
        $_SESSION["c_password_error"] = "Please insert same Password..!";
        $flag = true;
        header("location: singUp.php");
    }
    if($flag){
        echo "Tui pocha";
    }else{
        $encrypt_pass = sha1($password);
        $db = mysqli_connect("localhost", "root", "", "goru");
        $createQuery = "INSERT INTO `users`( name, email, password) VALUES ('$name', '$email', '$encrypt_pass')";
        mysqli_query($db, $createQuery);

        $_SESSION["registration_complete"] = "Your registration successful..!";
        header("location: singUp.php");
    }

}

?>