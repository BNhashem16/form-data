<?php

namespace Bnhashem\FormData;

use Bnhashem\FormData\Commands\FormDataCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FormDataServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('form-data')
            ->hasConfigFile('form-data')
            ->hasViews('forms.session')
            ->hasMigration('create_form-data_table')
            ->hasCommand(FormDataCommand::class);
    }
}
