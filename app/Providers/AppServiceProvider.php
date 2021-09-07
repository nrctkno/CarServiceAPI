<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $portsAndAdapters = [
            'Car\Port\CarReader' => 'Car\AppCarReader',
            'Car\Port\CarRepository' => 'Car\AppCarRepository',
            'CarService\Port\CarServiceReader' => 'CarService\AppCarServiceReader',
            'CarService\Port\CarServiceRepository' => 'CarService\AppCarServiceRepository',
            'Owner\Port\OwnerReader' => 'Owner\AppOwnerReader',
            'Owner\Port\OwnerRepository' => 'Owner\AppOwnerRepository',
            'ServiceType\Port\ServiceTypeRepository' => 'ServiceType\AppServiceTypeRepository',
        ];

        foreach ($portsAndAdapters as $port => $adapter) {
            $this->app->singleton('Domain\\' . $port, 'App\\Adapter\\' . $adapter);
        }
    }
}
