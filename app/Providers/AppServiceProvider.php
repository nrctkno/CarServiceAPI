<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $portsAndAdapters = [
            'Car\Port\CarRepository' => 'Car\AppCarRepository',
            'Car\Port\CarReader' => 'Car\AppCarReader',
            'CarService\Port\CarServiceRepository' => 'CarService\AppCarServiceRepository',
            'Owner\Port\OwnerRepository' => 'Owner\AppOwnerRepository',
            'Owner\Port\OwnerReader' => 'Owner\AppOwnerReader',
            'ServiceType\Port\ServiceTypeRepository' => 'ServiceType\AppServiceTypeRepository',
        ];

        foreach ($portsAndAdapters as $port => $adapter) {
            $this->app->singleton('Domain\\' . $port, 'App\\Adapter\\' . $adapter);
        }
    }
}
