<?php
$result = 1;
switch($result){
    case($result >= 80 && $result <= 100) : echo "you got A+";
    break;
    case($result >= 70 && $result <= 79.9) : echo "you got A";
    break;
    case($result >= 60 && $result <= 60.9) : echo "you got A-";
    break;
    case($result >= 50 && $result <= 50.9) : echo "you got B";
    break;
    case($result >= 40 && $result <= 40.9) : echo "you got c";
    break;
    case($result >= 0 && $result <= 39.9) : echo "you got F";
    break;
    
};
?>
