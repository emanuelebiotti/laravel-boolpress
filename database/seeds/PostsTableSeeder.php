<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Post;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=0; $i < 20 ; $i++) {
          $post = new Post();

          // $post->title = $faker->sentence();
          // $post->content = $faker->text(2000);
          // $post->author = $faker->firstName . ' ' . $faker->lastName;
          // $post->slug = $slug = Str::slug($post->title);
          // $post->save();

          $titolo = $faker->sentence();
          $dati_post = [
            'title' => $titolo,
            'content' => $faker->text(2000),
            'author' => $faker->firstName . ' ' . $faker->lastName,
            'slug' => $slug = Str::slug($post->title)
          ];
          $post->fill($dati_post);
          $post->save();

        }


    }
}
