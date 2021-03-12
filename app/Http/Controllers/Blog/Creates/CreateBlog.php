<?php


namespace App\Http\Controllers\Blog\Creates;


use App\Blog;
use Illuminate\Http\Request;

class CreateBlog
{
    /** @var Blog */
    private $blog;

    /**
     * CreateBlog constructor. [command + n]
     * @param Blog $blog
     */
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    public function create(Request $request)
    {
        $model = $this->blog->create([
            'blog_category_id' => $request->input('blog_category_id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
        ]);

        return $model;
    }

}
