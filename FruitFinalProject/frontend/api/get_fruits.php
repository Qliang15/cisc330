<?php
require_once '../../app/Database.php';

$database = new Database();
$db = $database->getConnection();

try {
    $query = $db->query('SELECT id, name FROM fruits');
    $fruits = $query->fetchAll(PDO::FETCH_ASSOC);

       echo json_encode($fruits);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>

