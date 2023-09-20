<?php

namespace App\Providers;

use App\Models\Institution;
use Illuminate\Support\ServiceProvider;

class SystemConfigProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $institution = Institution::find(1);
        if($institution){
            config()->set(['institution' => $institution->toArray()]);
        }

    }
}
