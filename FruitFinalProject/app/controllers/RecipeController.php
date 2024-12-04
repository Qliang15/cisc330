<?php

require_once __DIR__ . '/../models/Recipe.php';

class RecipeController {
    private $db;
    private $recipe;

    public function __construct($db) {
        $this->db = $db;
        $this->recipe = new Recipe($db);
    }

    public function getRecipesByFruit($fruit_id) {
        $stmt = $this->recipe->readByFruit($fruit_id);
        $recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($recipes);
    }

    public function addRecipe($data) {
        $this->recipe->fruit_id = $data['fruit_id'];
        $this->recipe->title = $data['title'];
        $this->recipe->description = $data['description'];
        $this->recipe->ingredients = $data['ingredients'];
        $this->recipe->instructions = $data['instructions'];

        if ($this->recipe->create()) {
            echo json_encode(['message' => 'Recipe added successfully.']);
        } else {
            echo json_encode(['message' => 'Failed to add recipe.']);
        }
    }
}

?>

