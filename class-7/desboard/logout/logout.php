<?php
session_start();

session_unset();

header('location: ../../Authentication/loging.php');

?>