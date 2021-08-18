<?php

namespace App\Providers;

use App\Repositories\Contracts\PageRepositoryInterface;
use App\Repositories\PageRepository;
use Illuminate\Support\ServiceProvider;

class DIServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PageRepositoryInterface::class, PageRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
