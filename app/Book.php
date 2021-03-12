<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table='book';
    protected $fillable = ['book_category_id','name', 'description', 'status'];
}
