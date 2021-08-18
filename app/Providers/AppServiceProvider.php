<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use TCG\Voyager\Facades\Voyager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Override Voyager Post, Page Model
        Voyager::useModel('Post', \App\Models\Post::class);
        Voyager::useModel('Page', \App\Models\Page::class);
    }
}
