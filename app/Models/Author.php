<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_author', 'author_id', 'book_id');
    }
}