<?php

require_once '../app/models/Fruit.php';

class FruitController {
    private $db;
    private $fruit;

    public function __construct($db) {
        $this->db = $db;
        $this->fruit = new Fruit($db);
    }

    public function getAllFruits() {
        $stmt = $this->fruit->readAll();
        $fruits = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($fruits);
    }
}

?>

