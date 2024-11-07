<h1>All Posts</h1>
<form method="GET" action="/posts/search">
    <input type="text" name="title" placeholder="Search by title">
    <button type="submit">Search</button>
</form>

<?php foreach ($posts as $post): ?>
    <h2><?php echo htmlspecialchars($post->getTitle()); ?></h2>
    <p><?php echo htmlspecialchars($post->getContent()); ?></p>
<?php endforeach; ?>







