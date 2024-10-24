<?php
$array = [
    "fruit" => "apple",
    "color" => "red",
    "weight" => "5lb",
    "Farm" => "Kevins Inc"
];

header('Content-Type: application/json');
echo json_encode($array);
?>

