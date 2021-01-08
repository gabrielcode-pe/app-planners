<?php

use Illuminate\Database\Seeder;
use App\Testimony;
use App\Category;
use App\Post;
use App\Institution;
use App\Instructor;
use App\Course;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        // factory(Testimony::class, 20)->create();
        // factory(Post::class, 20)->create();
        // factory(Instructor::class, 1)->create();
        //factory(Course::class, 20)->create();
        factory(Institution::class, 20)->create();
        
    }
}
