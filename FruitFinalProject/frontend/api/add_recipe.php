k<?php

require_once '../../app/Database.php';
require_once '../../app/controllers/RecipeController.php';

header('Content-Type: application/json');

$database = new Database();
$db = $database->getConnection();

$recipeController = new RecipeController($db);

$data = json_decode(file_get_contents('php://input'), true);

if (!empty($data['fruit_id']) && !empty($data['title']) && !empty($data['ingredients']) && !empty($data['instructions'])) {
    $recipeController->addRecipe($data);
} else {
    echo json_encode(['message' => 'All fields are required.']);
}

?>

