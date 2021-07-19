<?php

use Illuminate\Database\Seeder;
use App\Post;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $posts = config('posts');

      foreach ($posts as $post) {
        $post_obj = new Post();
        $post_obj->user_id = $post['user_id'];
        $post_obj->title = $post['title'];
        $post_obj->content = $post['content'];
        $post_obj->slug = $post['slug'];
        $post_obj->cover = $post['cover'];
        $post_obj->visibility = $post['visibility'];
        $post_obj->save();

      }
    }
}
