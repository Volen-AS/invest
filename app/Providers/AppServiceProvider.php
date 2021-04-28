<?php

namespace App\Providers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;

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
    public function boot(Request $request)
    {
        //compose all the views....
        view()->composer('*', function ($view) use ($request)
        {
            //...with this variable
            $view->with('user', $request->user()  );
        });
    }
}
