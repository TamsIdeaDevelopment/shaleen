<?php


namespace App\Http\Controllers\Blog\Lists;
use App\Http\Resources\Blog as BlogResources;

use App\Blog;

class ListsBlog
{
    public function list()
    {
        $data = Blog::where('status','ON')->latest()->get();

        return BlogResources::collection($data);
    }
}
