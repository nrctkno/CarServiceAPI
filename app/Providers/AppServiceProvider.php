<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $portsAndAdapters = [
            'Owner\Port\OwnerRepository' => 'Owner\AppOwnerRepository',
        ];

        foreach ($portsAndAdapters as $port => $adapter) {
            $this->app->singleton('Domain\\' . $port, 'App\\Adapter\\' . $adapter);
        }
    }
}
