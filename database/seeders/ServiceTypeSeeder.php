<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServiceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = app('db')->table('service_type');

        $table->insert(['title' => 'Cambio de Aceite', 'cost' => 9500]);
        $table->insert(['title' => 'Cambio de Filtro', 'cost' => 4200]);
        $table->insert(['title' => 'Cambio de Correa', 'cost' => 6100]);
        $table->insert(['title' => 'Revisión General', 'cost' => 3900]);
        $table->insert(['title' => 'Otro', 'cost' => 1000]);
    }
}
