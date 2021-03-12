<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table='blog';
	protected $fillable = ['blog_category_id','name', 'description', 'status'];

}
