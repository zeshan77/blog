<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;

class ExpirePosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command ensures posts are expired on given date';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Expire posts command has started.');
        // fetch all posts which needs to be expired today
        $posts = Post::whereDate('expired_at', date('Y-m-d'))->get();

        // loop through all fetched posts
        foreach($posts as $post)
        {
            // mark posts as expired (has_published = null)
            $post->has_published = null;
            $post->save();
        }

        $this->info('Expire posts command has finished.');

        return true;
    }
}
