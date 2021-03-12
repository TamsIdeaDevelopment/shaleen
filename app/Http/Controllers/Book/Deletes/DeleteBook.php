<?php


namespace App\Http\Controllers\Book\Deletes;


use App\Book;

class DeleteBook
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

    public function delete($book_id)
    {
        $data = $this->book->findOrFail($book_id);

        $data->delete();

        return $data;
    }
}
