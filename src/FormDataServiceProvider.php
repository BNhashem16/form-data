<?php

namespace Bnhashem\FormData;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Bnhashem\FormData\Commands\FormDataCommand;

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
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_form-data_table')
            ->hasCommand(FormDataCommand::class);
    }
}
