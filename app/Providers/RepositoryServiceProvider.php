<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\PostRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\ContactMeRepositoryInterface;
use App\Interfaces\AboutMeRepositoryInterface;

use App\Repositories\PostRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ContactMeRepository;
use App\Repositories\AboutMeRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(ContactMeRepositoryInterface::class, ContactMeRepository::class);
        $this->app->bind(AboutMeRepositoryInterface::class, AboutMeRepository::class);
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
