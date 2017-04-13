<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = factory(App\Client::class, 100)->create()->each(function ($client) {
            $client->meter_readings()->save(factory(App\MeterReading::class, 100)->create());
        });
    }
}
