<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;
use App\Models\lecture13\ModelLecture13Users;
use App\Observers\Observer;


use App\Repositories\UsersRepositoryInterface;
use App\Repositories\UsersRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            UsersRepositoryInterface::class,
            UsersRepository::class,
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('key', 'value');
        /**
         *  - Khai báo Observer:
         *      [Model]::observe([Observer]::class) 
         */
        ModelLecture13Users::observe(Observer::class);
    }
}
