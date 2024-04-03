<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // create 50 users, each having 10 posts and each post belongs to a category, and each post has 5 comments
        \App\Models\User::factory(50)->create()->each(function ($user) {
            $user->posts()->saveMany(\App\Models\Post::factory(10)->make())->each(function ($post) {
                $post->category()->associate(\App\Models\Category::inRandomOrder()->first())->save();
                $post->comments()->saveMany(\App\Models\Comment::factory(5)->make());
            });
        });
    }
}
