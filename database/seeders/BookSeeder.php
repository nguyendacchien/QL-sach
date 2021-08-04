<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = new Book();
        $books->name = 'book';
        $books->category_id = 1;
        $books->image = 'image.jpg';
        $books->price = 1000;
        $books->description = '@@@@@@';
        $books->save();
    }
}
