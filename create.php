<h1>Create a New Post</h1>
<form method="POST" action="/posts/store">
    <label for="title">Title:</label>
    <input type="text" name="title" required>
    
    <label for="content">Content:</label>
    <textarea name="content" required></textarea>
    
    <button type="submit">Submit</button>
</form>

