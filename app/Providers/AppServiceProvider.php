<?php

namespace App\Providers;

use Laravel\Passport\Passport;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use DB;
use App\MenuType;

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
        Schema::defaultStringLength(191);
        $menu_type = MenuType::all();
        View::share('menu_type', $menu_type);
        Validator::extend('uniqueMenu', function ($attribute, $value, $parameters, $validator) 
        {
            $count = DB::table('menu')->where('menu_name', $value)
                                        ->where('catering_service_id', $parameters[0])
                                        ->count();

            return $count === 0;
        });

        Passport::routes();

    }
}
