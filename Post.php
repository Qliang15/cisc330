class Post
{
    public $title;
    public $content;

    public function __construct($title, $content)
    {
        $this->title = $title;
        $this->content = $content;
    }

    public static function all()
    {
    }

    public static function find($id)
    {
    }
    
    public function save()
    {
    }
}

