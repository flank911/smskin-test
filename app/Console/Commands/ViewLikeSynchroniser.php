<?php

namespace App\Console\Commands;

use App\Article;
use Illuminate\Console\Command;

class ViewLikeSynchroniser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'viewlike:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $articles = Article::all();

        foreach ($articles as $article) {
            $likes_from_cache = cache()->has('article_' . $article->id . '_likes');
            $views_from_cache = cache()->has('article_' . $article->id . '_views');

            $update_array = [];

            if ($likes_from_cache && $article->likes < $likes_from_cache) {
                $update_array['likes']= $likes_from_cache;
            }

            if ($views_from_cache && $article->views < $views_from_cache) {
                $update_array['views']= $views_from_cache;
            }

            if (!empty($update_array)) {
                $article->update($update_array);
            }
        }
    }
}
