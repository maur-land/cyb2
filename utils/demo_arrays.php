<?php

$data = [1,2,3,44,55,66,77];
echo($data[1]. "<br >");
$data[] = 88;

echo($data[7]. "<br >");

for($i=0; $i < 8; $i++) {

    echo($data[$i]. "<br >");

}

// $people = [
//     ["Adam", "Turluev", 130000],
//     ["Mezami", "Aliev", 140000],
//     ["Rostislav", "love", 155000],

// ];

// for($i = 0; $i < count($people); $i++) {

//     echo($people[$i] [0]. " - " .$people[$i] [2]. "<br >");
// }

$people = [
    array("FirstName"=>"Adam", "LastName"=>"Turluev","salary"=>130000),
    array("FirstName"=>"Mezami", "LastName"=>"Aliev", "salary"=>142000),
    array("FirstName"=>"Rostislav", "LastName"=>"love","salary"=> 155000)

];

for($i = 0; $i < count($people); $i++) {

       echo($people[$i] ["FirstName"]. " - " .$people[$i] ["salary"]. "<br >");
    }