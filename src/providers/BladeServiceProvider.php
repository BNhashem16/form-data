<?php

namespace Bnhashem\Providers\BladeServiceProvider;

class FormDataServiceProvider extends PackageServiceProvider
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
        Blade::directive('toastrcss', function ($expression) {
            return '<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" type="text/css" />';
        });


        Blade::directive('toastrjs', function ($expression) {
            return '<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"></script>';
        });

        Blade::component('session', 'toastr');
    }
}
