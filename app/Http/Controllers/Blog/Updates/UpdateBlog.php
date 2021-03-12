<?php


namespace App\Http\Controllers\Blog\Updates;


use App\Blog;
use Illuminate\Http\Request;

class UpdateBlog
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

    public function update($blog_id, Request $request)
    {
        $data = $this->blog->findOrFail($blog_id);

        $data->name = $request->input('name');
        $data->blog_category_id = $request->input('blog_category_id');
        $data->description = $request->input('description');
        $data->status = $request->input('status');

        $data->save();

        return $data;
    }
}
