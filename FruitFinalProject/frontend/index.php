<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruit Recipes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Fruit Recipes</h1>
        <p>Discover and manage your favorite fruit recipes!</p>
    </header>

    <div class="container">
        <section id="fruits-section">
            <h2>Select a Fruit</h2>
            <div id="fruits"></div>
        </section>

        <section id="recipes">
            <h2>Recipes for <span id="selected-fruit-name"></span></h2>
            <div id="recipe-list"></div>

            <h3>Add a New Recipe</h3>
            <form id="add-recipe-form">
                <input type="hidden" id="selected-fruit-id">
                <label for="recipe-title">Title</label>
                <input type="text" id="recipe-title" placeholder="Recipe Title" required>
                <label for="recipe-description">Description</label>
                <textarea id="recipe-description" placeholder="Short description of the recipe" required></textarea>
                <label for="recipe-ingredients">Ingredients</label>
                <textarea id="recipe-ingredients" placeholder="List the ingredients" required></textarea>
                <label for="recipe-instructions">Instructions</label>
                <textarea id="recipe-instructions" placeholder="Step-by-step instructions" required></textarea>
                <button type="submit">Add Recipe</button>
            </form>
        </section>

        <div style="text-align: center; margin-top: 20px;">
            <a href="https://chat.openai.com/" target="_blank" class="chatgpt-button">
                Search Recipes on ChatGPT
            </a>
        </div>
    </div>

    <footer style="text-align: center; margin-top: 20px; padding: 10px; background-color: #f7f7f7;">
        <p>&copy; 2024 Fruit Recipes</p>
    </footer>

    <script src="scripts.js"></script>
</body>
</html>

