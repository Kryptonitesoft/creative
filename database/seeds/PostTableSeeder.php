<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Teacher;
use App\Models\Archive;

class PostTableSeeder extends Seeder {

    public function run()
    {
        $teacher = new Teacher;
        $teacher->email = 'joynal3483@gmail.com';
        $teacher->name = 'Joynal Abedin';
        $teacher->save();

        $archive = new Archive;
        $archive->year = 2014;
        $archive->month = 'April';
        $archive->save();

        $faker = Faker::create();

        for ($i = 1; $i <= 10; $i ++)
        {
            $content = $faker->realText(1000, 4);
            $post = new Post;
            $post->title = "Post no $i";
            $post->body = $content;
            $post->slug = str_slug($post->title);
            $post->author_id = 1;
            $post->archive_id = 1;
            $post->save();

            $max = mt_rand(2, 7);
            for ($j = 1; $j <= $max; $j ++)
            {
                $comment = new Comment;
                $comment->body = $faker->sentence(10);
                $comment->name = $faker->name;
                $comment->email = $faker->email;
                $post->comments()->save($comment);
                $post->increment('comment_count');
            }
        }
    }
}