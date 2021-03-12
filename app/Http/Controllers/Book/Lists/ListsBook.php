<?php


namespace App\Http\Controllers\Book\Lists;
use App\Http\Resources\Book as BookResources;

use App\Book;


class ListsBook
{

    public function list()
    {
        $data = Book::where('status','ON')->latest()->get();
        return BookResources::collection($data);
    }
}
