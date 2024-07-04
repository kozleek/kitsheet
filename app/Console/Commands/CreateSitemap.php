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
        ->add(Url::create(route('cs.kit.create')))
        ->add(Url::create(route('en.kit.create')))
        ->add(Url::create(route('de.kit.create')))
        ->add(Url::create(route('pl.kit.create')))
        ->add(Url::create(route('es.kit.create')))
        ->add(Url::create(route('cs.report.create')))
        ->add(Url::create(route('en.report.create')))
        ->add(Url::create(route('de.report.create')))
        ->add(Url::create(route('pl.report.create')))
        ->add(Url::create(route('es.report.create')))
        ->writeToFile($path);

    }
}
