<?php

$char = "Assalamu ALaikum";
$integer = 89;
$float = 18.1;


$info = [
    "House rent" => 200 + "98",
    "water rent" => 260.5 . "tk",
    "maid" => false,

];
$array = [
    "Name" => "Alamin",
    "Batch" => "MIAWD-2403",
    "Blood Group" => "O+",
    "House info" => $info,
];
// print_r($array);
//  echo var_dump($float); //var_dump muloto bebohar kora hoyese amader value ta kon formet e ase ta dekhar jonne..
//  print_r($array ["House info"]["House rent"]); //eita shudhu matro ekta array declar / ekta array niye kaj korar somoy print_r use kora hoy..
echo var_dump($array ["House info"]["water rent"]); // array er modde theke opor array er kono data dekhar niom..

?>