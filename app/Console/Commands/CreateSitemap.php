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
        // set the path where the sitemap will be saved
        $path = public_path('sitemap.xml');

        // create a new sitemap object
        $sitemap = Sitemap::create();

        // loop through all locales and add URLs to the sitemap
        $locales = config('localized-routes.supported_locales');
        foreach ($locales as $locale) {
            $sitemap->add(Url::create(route($locale . '.kit.create')));
            $sitemap->add(Url::create(route($locale . '.report.create')));
            $this->info('Added URLs for ' . $locale . ' locale.');
        }
        $sitemap->writeToFile($path);
        $this->info('👍 Sitemap created successfully.');
    }
}
