<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LiteraryGenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $literaryGenres = [
            ['name' => 'Ficción'],
            ['name' => 'Novela'],
            ['name' => 'Ciencia ficción'],
            ['name' => 'Misterio'],
            ['name' => 'Terror'],
            ['name' => 'Fantasía'],
            ['name' => 'Aventura'],
            ['name' => 'Romance'],
            ['name' => 'Drama'],
            ['name' => 'Poesía'],
            
        ];

        
        DB::table('literary_genres')->insert($literaryGenres);
    }
}

