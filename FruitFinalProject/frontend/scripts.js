async function loadFruits() {
    try {
        const response = await fetch('./api/get_fruits.php');
        const fruits = await response.json();

        const fruitsContainer = document.getElementById('fruits');
        fruitsContainer.innerHTML = '';

        fruits.forEach(fruit => {
            const card = document.createElement('div');
            card.className = 'card';
            card.textContent = fruit.name;
            card.onclick = () => {
                loadRecipes(fruit.id, fruit.name);
                clearForm();
            };
            fruitsContainer.appendChild(card);
        });
    } catch (error) {
        console.error('Error fetching fruits:', error);
    }
}

async function loadRecipes(fruitId, fruitName) {
    document.getElementById('recipes').style.display = 'block';
    document.getElementById('selected-fruit-name').textContent = fruitName;
    document.getElementById('selected-fruit-id').value = fruitId;

    try {
        const response = await fetch(`./api/get_recipes.php?fruit_id=${fruitId}`);
        const recipes = await response.json();

        const recipeList = document.getElementById('recipe-list');
        recipeList.innerHTML = '';

        recipes.forEach(recipe => {
            const div = document.createElement('div');
            div.innerHTML = `
                <h4>${recipe.title}</h4>
                <p>${recipe.description}</p>
                <p><strong>Ingredients:</strong> ${recipe.ingredients}</p>
                <p><strong>Instructions:</strong> ${recipe.instructions}</p>
                <button onclick="deleteRecipe(${recipe.id}, ${fruitId})">Delete</button>
            `;
            recipeList.appendChild(div);
        });
    } catch (error) {
        console.error('Error fetching recipes:', error);
    }
}

document.getElementById('add-recipe-form').addEventListener('submit', async (e) => {
    e.preventDefault();

    const fruitId = document.getElementById('selected-fruit-id').value;
    const title = document.getElementById('recipe-title').value;
    const description = document.getElementById('recipe-description').value;
    const ingredients = document.getElementById('recipe-ingredients').value;
    const instructions = document.getElementById('recipe-instructions').value;

    try {
        const response = await fetch('./api/add_recipe.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ fruit_id: fruitId, title, description, ingredients, instructions })
        });

        const result = await response.json();
        alert(result.message || result.error);

        if (result.message) {
            document.getElementById('add-recipe-form').reset();
            loadRecipes(fruitId, document.getElementById('selected-fruit-name').textContent);
        }
    } catch (error) {
        console.error('Error adding recipe:', error);
    }
});

async function deleteRecipe(recipeId, fruitId) {
    if (!confirm('Are you sure you want to delete this recipe?')) return;

    try {
        const response = await fetch('./api/delete_recipe.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ id: recipeId })
        });

        const result = await response.json();
        alert(result.message || result.error);

        loadRecipes(fruitId, document.getElementById('selected-fruit-name').textContent);
    } catch (error) {
        console.error('Error deleting recipe:', error);
    }
}

function clearForm() {
    document.getElementById('add-recipe-form').reset();
}

loadFruits();

