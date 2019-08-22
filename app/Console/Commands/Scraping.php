<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte;

class Scraping extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:scraping';

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
     * @return mixed
     */
    public function handle()
    {
        $goutte = Goutte::request('GET', 'https://www.jrhakatacity.com/gourmet/');
        // dd($goutte->filter('line-content'));
        // $goutte->filter('ul#s-results-list-atf')->each(function ($ul) {
        //     $ul->filter('li')->each(function ($li) {
        //         dd($li);
        //     });
        // });
        $goutte->filter('.articleList')->each(function ($ul) {
            // $ul->filter('.articleList')->each(function ($li) {
                // dd($li->filter('li'));
                echo $ul->filter('li')->text();
            // });
        });
    }
}
