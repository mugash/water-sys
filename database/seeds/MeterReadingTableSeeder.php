<?php

use Illuminate\Database\Seeder;

class MeterReadingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meter_readings = factory(App\MeterReading::class, 100)->create();
    }
}
