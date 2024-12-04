<?php
require_once '../../app/Database.php';

$database = new Database();
$db = $database->getConnection();


$recipes = [
    ['fruit_id' => 1, 'title' => 'Apple Pie', 'description' => 'A delicious apple pie.', 'ingredients' => 'Apples, sugar, flour', 'instructions' => 'Mix and bake at 350°F.'],
    ['fruit_id' => 2, 'title' => 'Banana Bread', 'description' => 'A moist and tasty banana bread.', 'ingredients' => 'Bananas, flour, sugar, eggs', 'instructions' => 'Mix and bake at 350°F.'],
    ['fruit_id' => 3, 'title' => 'Strawberry Shortcake', 'description' => 'A light and fluffy dessert.', 'ingredients' => 'Strawberries, cake, whipped cream', 'instructions' => 'Layer cake with whipped cream and strawberries.'],
    ['fruit_id' => 4, 'title' => 'Orange Juice', 'description' => 'Freshly squeezed orange juice.', 'ingredients' => 'Oranges, sugar, water', 'instructions' => 'Squeeze oranges and mix with sugar and water.'],
    ['fruit_id' => 5, 'title' => 'Pineapple Salsa', 'description' => 'A tangy pineapple salsa.', 'ingredients' => 'Pineapple, lime, cilantro, onion', 'instructions' => 'Dice all ingredients and mix.'],
    ['fruit_id' => 6, 'title' => 'Mango Smoothie', 'description' => 'A creamy mango smoothie.', 'ingredients' => 'Mango, yogurt, milk, sugar', 'instructions' => 'Blend all ingredients until smooth.'],
    ['fruit_id' => 7, 'title' => 'Grape Jelly', 'description' => 'Homemade grape jelly.', 'ingredients' => 'Grapes, sugar, pectin', 'instructions' => 'Boil grapes with sugar and pectin, then cool.'],
    ['fruit_id' => 8, 'title' => 'Blueberry Muffins', 'description' => 'Soft and fluffy blueberry muffins.', 'ingredients' => 'Blueberries, flour, sugar, eggs', 'instructions' => 'Mix and bake at 375°F.'],
    ['fruit_id' => 9, 'title' => 'Watermelon Salad', 'description' => 'A refreshing watermelon salad.', 'ingredients' => 'Watermelon, mint, feta cheese', 'instructions' => 'Dice watermelon and mix with mint and feta.'],
    ['fruit_id' => 10, 'title' => 'Peach Cobbler', 'description' => 'A classic peach cobbler.', 'ingredients' => 'Peaches, flour, sugar, butter', 'instructions' => 'Layer peaches with batter and bake at 375°F.'],
    ['fruit_id' => 11, 'title' => 'Cherry Tart', 'description' => 'A sweet and tangy cherry tart.', 'ingredients' => 'Cherries, tart dough, sugar', 'instructions' => 'Fill tart shell with cherries and bake at 350°F.'],
    ['fruit_id' => 12, 'title' => 'Pear Crumble', 'description' => 'A spiced pear crumble.', 'ingredients' => 'Pears, oats, cinnamon, sugar', 'instructions' => 'Layer pears with crumble topping and bake at 350°F.'],
    ['fruit_id' => 13, 'title' => 'Kiwi Sorbet', 'description' => 'A refreshing kiwi sorbet.', 'ingredients' => 'Kiwi, sugar, lemon juice', 'instructions' => 'Blend and freeze until solid.'],
    ['fruit_id' => 14, 'title' => 'Lemon Bars', 'description' => 'Tangy and sweet lemon bars.', 'ingredients' => 'Lemon juice, sugar, flour, eggs', 'instructions' => 'Mix filling and bake with crust at 350°F.'],
    ['fruit_id' => 15, 'title' => 'Limeade', 'description' => 'A refreshing limeade.', 'ingredients' => 'Lime juice, sugar, water', 'instructions' => 'Mix lime juice with sugar and water.'],
    ['fruit_id' => 16, 'title' => 'Coconut Macaroons', 'description' => 'Chewy coconut macaroons.', 'ingredients' => 'Coconut, sugar, egg whites', 'instructions' => 'Mix and bake at 325°F.'],
    ['fruit_id' => 17, 'title' => 'Pomegranate Salad', 'description' => 'A colorful pomegranate salad.', 'ingredients' => 'Pomegranate seeds, spinach, walnuts', 'instructions' => 'Mix ingredients and serve fresh.'],
    ['fruit_id' => 18, 'title' => 'Fig Jam', 'description' => 'Homemade fig jam.', 'ingredients' => 'Figs, sugar, lemon juice', 'instructions' => 'Cook figs with sugar and lemon juice until thick.'],
    ['fruit_id' => 19, 'title' => 'Plum Cake', 'description' => 'A moist plum cake.', 'ingredients' => 'Plums, flour, sugar, eggs', 'instructions' => 'Layer plums in batter and bake at 350°F.'],
    ['fruit_id' => 20, 'title' => 'Apricot Tart', 'description' => 'A delicate apricot tart.', 'ingredients' => 'Apricots, tart shell, sugar', 'instructions' => 'Layer apricots in tart shell and bake at 350°F.']
];

foreach ($recipes as $recipe) {
    $query = "INSERT INTO recipes (fruit_id, title, description, ingredients, instructions) 
              VALUES (:fruit_id, :title, :description, :ingredients, :instructions)";
    $stmt = $db->prepare($query);

    $stmt->bindParam(':fruit_id', $recipe['fruit_id']);
    $stmt->bindParam(':title', $recipe['title']);
    $stmt->bindParam(':description', $recipe['description']);
    $stmt->bindParam(':ingredients', $recipe['ingredients']);
    $stmt->bindParam(':instructions', $recipe['instructions']);

    $stmt->execute();
}

echo "Recipes added successfully!";
?>

