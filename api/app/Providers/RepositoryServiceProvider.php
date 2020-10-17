<?php

namespace App\Providers;
use App\Repository\BaseRepository;
use App\Repository\BaseRepositoryInterface;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
