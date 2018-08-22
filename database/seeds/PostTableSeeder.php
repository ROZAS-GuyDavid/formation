<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Storage::disk('local')->delete(Storage::allFiles());

        App\Category::create(
            ['title' => 'html']
        );

        App\Category::create(
            ['title' => 'css']
        );

        App\Category::create(
            ['title' => 'laravel']
        );
        factory(App\Post::class, 30)->create()->each(function($post){
            $category = App\Category::find(rand(1,3));

            $post->category()->associate($category);
            $post->save();

            $link = str_random(12) . '.jpg';
            $file = file_get_contents('http://via.placeholder.com/250x250/' . rand(1,9));
            Storage::disk('local')->put($link, $file);

            $post->picture()->create([
                'title' => 'Default',
                'link' => $link
            ]);


        });
    }
}
