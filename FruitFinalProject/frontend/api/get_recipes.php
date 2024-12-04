<?php

require_once '../../app/Database.php';
require_once '../../app/controllers/RecipeController.php';

header('Content-Type: application/json');

$database = new Database();
$db = $database->getConnection();

$recipeController = new RecipeController($db);

if (isset($_GET['fruit_id'])) {
    $fruit_id = htmlspecialchars(strip_tags($_GET['fruit_id']));
    $recipeController->getRecipesByFruit($fruit_id);
} else {
    echo json_encode(['message' => 'Fruit ID is required.']);
}

?>

