<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
/*use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;*/
use Spatie\ResponseCache\Facades\ResponseCache;

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
        /*DB::listen(function($query) {
            Log::channel('sql')->info('app.request', [
                'sql' => $query->sql . ' [' . implode(', ', $query->bindings) . ']' . PHP_EOL,
            ]);
        });*/
        if(env('APP_DEBUG')) {
            ResponseCache::clear();
        }
    }
}
