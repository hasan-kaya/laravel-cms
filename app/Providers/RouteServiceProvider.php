<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Request;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapAdminRoutes();

        //
    }

    /**
     * Define the "admin" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapAdminRoutes()
    {
        Route::group([
            'middleware' => ['web', 'admin', 'auth:admin', 'doNotCacheResponse'],
            'prefix' => config('auth.admin_panel'),
            'as' => 'admin.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/admin.php');
        });
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        $locale = Request::segment(1);
        $default_language = config('app.locale');
        $available_languages = config('translatable.locales');
        if( !in_array($locale,$available_languages) ){
            $prefix = '';
        }else{
            $prefix = $locale;
        }

        Route::middleware('web')
             ->namespace($this->namespace)
             ->prefix($prefix)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        $locale = Request::segment(1);
        $default_language = config('app.locale');
        $available_languages = config('translatable.locales');
        if( !in_array($locale,$available_languages) ){
            $prefix = 'api';
        }else{
            $prefix = $locale.'/api';
        }

        Route::prefix($prefix)
             ->middleware('api')
             ->as('api.')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
