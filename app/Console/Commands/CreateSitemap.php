<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class CreateSitemap extends Command
{
    /**
    * The name and signature of the console command.
    *
    * @var string
    */
    protected $signature = 'sitemap:create';

    /**
    * The console command description.
    *
    * @var string
    */
    protected $description = 'Create sitemap.xml file';

    /**
    * Execute the console command.
    */
    public function handle()
    {
        $path = public_path('sitemap.xml');

        Sitemap::create()
        ->add(Url::create(route('kit.create')))
        ->add(Url::create(route('feedback.create')))
        ->writeToFile($path);

    }
}
