<?php

namespace App\Providers;

use App\Services\Inventory\InventoryImporter;
use App\Services\Inventory\InventoryImporterInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(InventoryImporterInterface::class, InventoryImporter::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
