<?php

class Recipe {
    private $conn;
    private $table = "recipes";

    public $id;
    public $fruit_id;
    public $title;
    public $description;
    public $ingredients;
    public $instructions;
    public $created_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function readByFruit($fruit_id) {
        $query = "SELECT * FROM " . $this->table . " WHERE fruit_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $fruit_id);
        $stmt->execute();

        return $stmt;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table . " 
                  (fruit_id, title, description, ingredients, instructions) 
                  VALUES 
                  (:fruit_id, :title, :description, :ingredients, :instructions)";

        $stmt = $this->conn->prepare($query);

        $this->fruit_id = htmlspecialchars(strip_tags($this->fruit_id));
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->ingredients = htmlspecialchars(strip_tags($this->ingredients));
        $this->instructions = htmlspecialchars(strip_tags($this->instructions));

        $stmt->bindParam(':fruit_id', $this->fruit_id);
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':ingredients', $this->ingredients);
        $stmt->bindParam(':instructions', $this->instructions);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}

?>

