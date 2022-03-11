<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\PostRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\ContactMeRepositoryInterface;
use App\Interfaces\AboutMeRepositoryInterface;
use App\Interfaces\CommentRepositoryInterface;

use App\Repositories\PostRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ContactMeRepository;
use App\Repositories\AboutMeRepository;
use App\Repositories\CommentRepository;

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
        $this->app->bind(CommentRepositoryInterface::class, CommentRepository::class);
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
