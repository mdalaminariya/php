<?php
    // $variable = 56;
    // echo "your value is : $variable <br>";


    // $Char = "Bangladesh";
    // echo strrev($Char);

    // $replace = "<br>Hello Bangladesh";
    // echo str_replace("Bangladesh", "CIT <br>", $replace);


    // $first_number = 54;
    // $second_number = 38;

    // $total = $first_number + $second_number;
    //  echo "Addition of two values: $total<br> ";
    //  $total = $first_number * $second_number;
    //  echo "Multipication of two values: $total<br>";
    // $total = $first_number / $second_number;
    // echo "Division of two values: $total <br>";
    // $total = $first_number - $second_number;
    //  echo "Subtraction of two values: $total <br>";


    //  $alphabet = "u";
    // switch($alphabet){
    //     case "a"; echo "Your input is a vowel";
    //     break;
    //     case "e"; echo "Your input is a vowel";
    //     break;
    //     case "i"; echo "Your input is a vowel";
    //    break;
    //    case "o"; echo "Your input is a vowel";
    //      break;
    //    case "u"; echo "Your input is a vowel <br>";
    //     break;
    //     default: 
    //     echo "You input is consonant";
    //  }


    // $table = 1;
    //  $length = 10;
    //  $i = 1;

    //  for($i=1; $i<=$length; $i++)
    //      echo "$i * $table = ".$i * $table. "<br>";


    // function check_number($number){
    //     if($number  <= 10){
    //         echo "25 is greater than 10 <br>";
    //     }
    //     else if ($number <= 20){
    //         echo "25 is greater then 20  <br>";
    //     }
    //     else if ($number <= 30){
    //         echo "25 is less then 30  <br>";
    //     }

    // }

    //        echo check_number(30);
    //        echo check_number(20);
    //        echo check_number(10);



    //     $Array = array(1,1,2,2,3,4,5,5);

    //      print_r(array_unique([$Array]));



        $higest_number = array(360,310,310,330,313,375,456,111,256);

         echo max($higest_number);


        $arr = array("Volvo", "BMW", "Toyota", "Nissan", "Audi");
         $value = "Toyota";


         foreach($arr as $value){
            if($value == $value){
                 $is_found = true;
                 break;
             }
         }

         if ($is_found){
             echo "<br>$value is present in the array";
        }
         else{
             echo "$value is not present in the array";
         };
        
?>