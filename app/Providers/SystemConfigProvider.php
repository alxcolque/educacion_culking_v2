<?php

namespace App\Providers;

use App\Models\Institution;
use Illuminate\Support\Facades\DB;
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
        try {
            DB::connection()->getPDO();
            DB::connection()->getDatabaseName();
            $institution = Institution::find(1);
            if($institution){
                config()->set(['institution' => $institution->toArray()]);
            }
        } catch (\Exception $e) {
            // No está conectado
            return;
        }


    }
}
