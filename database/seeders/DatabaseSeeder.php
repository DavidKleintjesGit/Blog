<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'PHP',
            'slug' => 'php'
        ]);
        Category::create([
            'name' => 'Javascript',
            'slug' => 'javascript'
        ]);
        Category::create([
            'name' => 'Python',
            'slug' => 'python'
        ]);
        Category::create([
            'name' => 'Java',
            'slug' => 'java'
        ]);
        Category::create([
            'name' => 'HTML',
            'slug' => 'html'
        ]);
        Category::create([
            'name' => 'CSS',
            'slug' => 'css'
        ]);
        Category::create([
            'name' => 'Laravel',
            'slug' => 'laravel'
        ]);
        Category::create([
            'name' => 'Symfony',
            'slug' => 'symfony'
        ]);
        Category::create([
            'name' => 'Angular',
            'slug' => 'angular'
        ]);

        Post::factory(50)->create();
        Comment::factory(10)->create(['post_id' => 1]);
    }
}
