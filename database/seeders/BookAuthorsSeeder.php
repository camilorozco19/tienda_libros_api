<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Author;

class BookAuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        Book::withoutEvents(function () {
          
            $books = Book::all();

            
            $authors = Author::all();

            
            $books->each(function ($book) use ($authors) {
                
                $author = $authors->random();

                
                $book->authors()->attach($author->id);
            });
        });
    }
}
