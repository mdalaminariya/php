<?php

session_start();

if(isset($_POST["submit"])){
    $year = $_POST["year"];


    if($year){
        if(strlen($year)==4){
            if(is_numeric($year)){
                if($year % 4 == 0 && $year % 400 == 0 || $year % 100 == 0){
                    $_SESSION["success"] = "This is leap year";
                    header("location: class-5.php");
                }else{
                    $_SESSION["success"] = "This is not a leap year";
                    header("location: class-5.php");
                }
            }else{
                $_SESSION["year_error"] = "This field can't be accept string";
                header("location: class-5.php");
            }
        }else{
            $_SESSION["year_error"] = "invalid number / year";
            header("location: class-5.php");
        }
    }else{
        $_SESSION["year_error"] = "this field can't be null or empty";
        header("location: class-5.php");
    }
}

?>