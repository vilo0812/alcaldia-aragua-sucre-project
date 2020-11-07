<?php

namespace App\Providers;
use App\Repository\BaseRepository;
use App\Repository\BaseRepositoryInterface;
use App\Repository\Departament\DepartamentRepository;
use App\Repository\Departament\DepartamentRepositoryInterface;
use App\Repository\Gadget\GadgetRepository;
use App\Repository\Gadget\GadgetRepositoryInterface;
use App\Repository\Mayor\MayorRepository;
use App\Repository\Mayor\MayorRepositoryInterface;
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
        $this->app->bind(MayorRepositoryInterface::class, MayorRepository::class);
        $this->app->bind(DepartamentRepositoryInterface::class, DepartamentRepository::class);
        $this->app->bind(GadgetRepositoryInterface::class, GadgetRepository::class);
    }
}
