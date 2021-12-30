<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;

class PublishPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Posts publish command has started.');

        // fetch all posts which should be published today
        $posts = Post::whereDate('scheduled_at', date('Y-m-d'))->get();

        // loop through all posts
        foreach($posts as $post) {
            // mark post as published (has_published != null)
            $post->has_published = now();
            $post->save();
        }

        $this->info('Posts publish command has successfully finished.');

        return true;
    }
}
