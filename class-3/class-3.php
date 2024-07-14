<!-- loop -->


<!--1. while loop 
    2.do while loop
    3.for loop
    4.foreach loop
-->


<?php
    //  $number = 1;


     $cows = [
        "Bangladesh",
         "White",
         "Ghas",
     ];

    // while loop shudhu math mathical er kaj kore..

    // while($number <= 100){
    //     echo "$number . Good job" . "<br>";
    //     $number++;
    // }        

    // do while loop 

    // do{
    //     echo $number. "<br>";
    //     $number += 1;
    // }
    // while($number <= 100);

    // for loop

//     for($count = 1; $count <= 10; $count++){
//         echo "$number". "x". "$count". "=". " ". $number * $count."<br>";
//  }


        // for($count = 1; $count <= 10; $count++){
        //     if($count == 6){
        //         // break;
        //         continue;
        //     }
        //     echo "$count";
        // }


    //     $length = count($cows);

    // for($count = 0; $count < $length; $count++){
    //         echo $cows[$count];
    //     }
        
     
    //foreach loop

    foreach($cows as $cow){
        echo $cow. "<br>";
    }



?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <?php foreach($cows as $cow){?>
        <li><?php echo $cow ?></li>
        <?php } ?>
    </ul>
</body>
</html> -->