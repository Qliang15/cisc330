<?php
$array = [
    "fruit" => "apple",
    "color" => "red",
    "weight" => 5,
    "Farm" => "Kevins Inc"
];

foreach ($array as $key => $value) {
    echo "$key: $value<br>";
}

function describeItem(string $item, string $description = "This is"): string {
    return "$description, $item!";
}

echo describeItem("apple");
echo "<br>";
echo describeItem("apple", "The fruit is");
echo "<br>";
echo describeItem("red", "The color is");
echo "<br>";
echo describeItem("5lb", "The weight is");
echo "<br>";
echo describeItem("Kevins Inc", "The farm is from");
?>



