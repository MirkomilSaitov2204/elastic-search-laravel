<?php

use App\Tag;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(\App\Tag::class, 20)->create();
        factory(\App\User::class,   100)->create();
        factory(\App\Category::class, 20)->create()
        ->each(function ($category){
            $category->posts()
                ->createMany(factory(\App\Post::class, 1000)->make()->map->getAttributes());
        });


        $posts = \App\Post::query()->get();
        $tag_ids = \App\Tag::query()->pluck('id')->toArray();

        foreach ($posts as $post)
        {
            $post->tags()->sync($tag_ids);
        }

    }
}
