<?php
require_once '../../app/Database.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if (!empty($data['id'])) {
    $recipe_id = intval($data['id']);

    try {
        $database = new Database();
        $db = $database->getConnection();

        $query = "DELETE FROM recipes WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $recipe_id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo json_encode(['message' => 'Recipe deleted successfully.']);
        } else {
            echo json_encode(['error' => 'Failed to delete recipe.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'Invalid recipe ID.']);
}
?>

