<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;


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
        Validator::extend('jfif', function ($attribute, $value, $parameters, $validator) {
            $filename = $value->getClientOriginalName();
            return preg_match('~\b(jpg|png|jpeg)\b~i',$filename);
            });
        Schema::defaultStringLength(191);
    }
}
