<?php


namespace App\Http\Controllers\Book\Creates;


use App\Book;
use Illuminate\Http\Request;

class CreateBook
{
    /** @var Book */
    private $blog;

    /**
     * CreateBlog constructor.
     * @param Book $book
     */
    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function create(Request $request)
    {
        $model  = $this->book->create([
            'book_category_id' => $request->input('book_category_id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
        ]);
    }
}
