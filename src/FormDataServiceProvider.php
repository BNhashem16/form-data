<?php

namespace Bnhashem\FormData;

use Illuminate\Support\ServiceProvider;

class FormDataServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('FormData', function () {
            return new FormData;
        });
    }
}
