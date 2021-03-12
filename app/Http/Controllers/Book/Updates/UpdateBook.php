<?php


namespace App\Http\Controllers\Book\Updates;


use App\Book;
use Illuminate\Http\Request;

class UpdateBook
{
    /** @var Book */
    private $book;

    /**
     * CreateBlog constructor.
     * @param Book $book
     */
    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function update($book_id, Request $request)
    {
        $data = $this->book->findOrFail($book_id);

        $data->book_category_id = $request->input('book_category_id');
        $data->name = $request->input('name');
        $data->description = $request->input('description');
        $data->status = $request->input('status');

        $data->save();

        return $data;
    }
}
