<?php


namespace App\Http\Controllers\Blog\Deletes;


use App\Blog;

class DeleteBlog
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

    public function delete($blog_id)
    {
        $data = $this->blog->findOrFail($blog_id);

        $data->delete();

        return $data;
    }
}
