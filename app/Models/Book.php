<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'book';

    protected $fillable = [
        'title',
        'author',
        'published_year',
        'created_at',
        'updated_at',
    ];
}
