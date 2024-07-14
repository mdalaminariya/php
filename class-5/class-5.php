<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>class-5</title>
</head>
<body>
    <form action="index_post.php" method= "POST">
        <input type= "number" placeholder= "enter your value" name = "year">
        <!-- session error start -->
        <?php if(isset($_SESSION['year_error'])) { ?>
            <p style= "color: red; font-size: 12px;" ><?php echo $_SESSION['year_error'] ?> </p>
            <?php } unset($_SESSION['year_error']) ?>
                <!-- session succes start -->
            <?php if(isset($_SESSION['success'])) { ?>
            <p style= "color: red; font-size: 12px;" ><?php echo $_SESSION['success'] ?> </p>
            <?php } unset($_SESSION['success']) ?>

            <button name = "submit" type= "submit" > submit </button>
    </form>
</body>
</html>

<?php

