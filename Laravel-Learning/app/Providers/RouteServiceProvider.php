<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')->prefix('api')->group(base_path('routes/api.php'));

            Route::middleware('web')->group(base_path('routes/web.php'));

            // Thêm các file route con (chia tách code)
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group([
                    base_path('routes/learning/part-1-route.php'),
                    base_path('routes/learning/part-2-template.php'),
                    base_path('routes/learning/part-3-controller.php'),
                    base_path('routes/learning/part-4-query-builder.php'),
                    base_path('routes/learning/part-5-models.php'),
                    base_path('routes/learning/part-6-eloquent.php'),
                    base_path('routes/learning/part-7-collection.php'),
                    base_path('routes/learning/part-8-database.php'),
                    base_path('routes/learning/part-9-form-request.php'),
                ]);
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
