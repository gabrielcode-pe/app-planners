<?php

use Illuminate\Database\Seeder;
use App\Testimony;
use App\Category;
use App\Post;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        factory(Testimony::class, 20)->create();
        //factory(Category::class, 2)->create();
        factory(Post::class, 20)->create();
    }
}
