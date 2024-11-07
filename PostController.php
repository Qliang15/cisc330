class PostController
{
    public function index()
    {
        $posts = Post::all();
        include 'index.php';
    }

    public function create()
    {
        include 'create.php';
    }

    public function store($title, $content)
    {
        if (strlen($title) < 5 || strlen($content) < 15) {
            echo "Title must be at least 5  characters, and content at least 10 characters.";
            return;
        }

        $post = new Post($title, $content);
        $post->save();
        header('Location: /posts');
    }
}

