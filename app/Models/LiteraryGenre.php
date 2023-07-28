<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LiteraryGenre extends Model
{
    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_literary_genre', 'literary_genre_id', 'book_id');
    }
}